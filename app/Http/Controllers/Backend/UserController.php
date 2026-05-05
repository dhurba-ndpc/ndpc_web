<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
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

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => [
                    'required',
                    'string',
                    'min:5',
                    'max:255',
                    'regex:/^[A-Za-z\s]+$/'
                ],

                'email' => [
                    'required',
                    'string',
                    'email',
                    'max:255',
                    'unique:users,email'
                ],

                'password' => [
                    'required',
                    'string',
                    'min:5',
                    'max:15',
                    'confirmed',
                    Password::min(5)
                        ->mixedCase()
                        ->symbols()     
                ],

                'role' => ['required']
            ],
            [
                'name.regex' => 'Name must contain only letters and spaces.',
                'password.mixed' => 'Password must include at least one uppercase letter.',
                'password.symbols' => 'Password must include at least one special character.',
            ]
        );

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $validatedData = $validator->validated();

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        $user->assignRole($request->role);
        return redirect()->route('users.index')->with('success', 'User created and role assigned successfully.');
    }

    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $validatedData = $request->validate([
            'name' => [
                'required',
                'string',
                'min:5',
                'max:255',
                'regex:/^[A-Za-z\s]+$/',
            ],

            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($user->id),
            ],

            'password' => [
                'nullable',
                'string',
                'confirmed',
                'max:15',
                Password::min(5)
                    ->mixedCase()
                    ->symbols(),
            ],

            'role' => [
                'required',
                'exists:roles,name',
            ],
        ], [
            'name.regex' => 'Name must contain only letters and spaces.',
            'password.mixed' => 'Password must include at least one uppercase letter.',
            'password.symbols' => 'Password must include at least one special character.',
        ]);
        $data = [
            'name'  => $validatedData['name'],
            'email' => $validatedData['email'],
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }
        try {
            DB::transaction(function () use ($user, $data, $request) {

                $user->update($data);


                $user->syncRoles($request->role);
            });

            return redirect()->route('users.index')
                ->with('success', 'User updated successfully.');
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
}
