<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UsersRequest;
use App\Mail\UserWelcomeMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password as PasswordBroker;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Spatie\Permission\Models\Role;


class UserController extends Controller
{
    public function index()
    {
        $users = User::with(['roles.permissions'])->latest()->get();
        return view('backend.roles.userIndex', compact('users'));
    }

    public function create()
    {
        $roles = Role::withoutGlobalScopes()
            ->whereNull('deleted_at')
            ->latest()
            ->with('permissions')
            ->withCount('users')
            ->get();

        return view('backend.roles.userForm', compact('roles'));
    }

    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        $roles = Role::query()->whereNull('deleted_at')->get();
        $userRoles = $user->roles->pluck('id')->toArray();

        return view('backend.roles.userForm', compact('user', 'roles', 'userRoles'));
    }


    public function store(UsersRequest $request)
    {
        DB::beginTransaction();

        try {

            $validatedData = $request->validated();

            $imagePath = $request->hasFile('image')
                ? $request->file('image')->store('users', 'public')
                : null;

            // Create User
            $user = User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'image' => $imagePath,
                'phone' => $validatedData['phone'] ?? null,
                'address' => $validatedData['address'] ?? null,
                'password' => Hash::make($validatedData['password']),
            ]);
            // Assign Role
            $user->assignRole($request->role);

            // Generate Reset Password Link
            $token = PasswordBroker::createToken($user);

            $resetLink = url(route('password.reset', [
                'token' => $token,
                'email' => $user->email,
            ], false));

            // Send Email
            Mail::to($user->email)->send(
                new UserWelcomeMail($user, $validatedData, $resetLink)
            );

            DB::commit();

            return redirect()
                ->route('users.index')
                ->with('success', 'User created successfully.');
        } catch (\Exception $e) {

            DB::rollBack();

            if (!empty($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }

            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

    public function update(UsersRequest $request, string $id)
    {
        $user = User::findOrFail($id);
        $validatedData = $request->validated();

        $data = [
            'name'  => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'] ?? null,
            'address' => $validatedData['address'] ?? null,
        ];

        if ($request->hasFile('image')) {
            if ($user->image) {
                Storage::disk('public')->delete($user->image);
            }

            $data['image'] = $request->file('image')->store('users', 'public');
        }

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }
        try {
            DB::transaction(function () use ($user, $data, $request) {

                $user->update($data);
                $user->syncRoles($request->role);
            });
            if (auth()->user()->hasRole('super admin')) {
                return redirect()
                    ->route('users.index')
                    ->with('success', 'User updated successfully.');
            }

            return redirect()
                ->route('users.show', auth()->id())
                ->with('success', 'Profile updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Update failed: ' . $e->getMessage());
        }
    }
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        if (Auth::id() == $user->id) {
            return redirect()->back()->with('error', 'You cannot delete your own account.');
        }

        $user->delete();

        return redirect()->route('users.index')
            ->with('success', 'User moved to trash. Roles are preserved for restoration.');
    }

    public function trash()
    {
        $users = User::onlyTrashed()->get();
        return view('backend.roles.userTrash', compact('users'));
    }

    public function restore($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        $user->restore();
        return redirect()->route('users.index')->with('success', 'User restored successfully.');
    }

    public function forceDelete($id)
    {
        $user = User::withTrashed()->findOrFail($id);

        DB::transaction(function () use ($user) {
            $user->roles()->detach();
            $user->forceDelete();
        });

        return redirect()->back()->with('success', 'User permanently deleted.');
    }


    public function viewProfile()
    {
        $user = Auth::user();
        $isEdit = Auth::user() || "Sory contact customer service";
        return view('backend.user.form', compact('user', 'isEdit'));
    }
}
