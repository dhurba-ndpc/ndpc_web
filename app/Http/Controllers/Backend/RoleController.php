<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use App\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::latest()
            ->with('permissions:id,name')
            ->withCount('users')
            ->get();

        return view('backend.roles.roleForm', compact('roles'));
    }


    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => [
                'required',
                'string',
                'max:255',
                'regex:/^[A-Za-z\s]+$/'
            ],
        ], [
            'name.regex' => 'Name must contain only letters and spaces (no numbers or special characters).'
        ]);


        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator, 'roleBag')
                ->withInput()
                ->with('active_tab', 'role-tab');
        }
        $guardName = 'web';

        $originalName = trim($request->name);
        $name = $originalName;
        $count = 1;

        while (
            Role::withTrashed()
            ->where('name', $name)
            ->where('guard_name', $guardName)
            ->exists()
        ) {
            $name = $originalName . '-' . $count;
            $count++;
        }

        Role::create([
            'name' => $name,
            'guard_name' => $guardName,
        ]);

        return redirect()->back()->with([
            'success' => 'Role created successfully!' . $name,
            'active_tab' => 'role-tab'
        ]);
    }

    public function edit(string $id)
    {

        $getRoleId = Role::findOrFail($id);

        $entities = $this->getModels();
        $actions = ['View', 'Create', 'Edit', 'Delete'];

        $existingPermissions = Permission::pluck('name')->toArray();
        $rolePermissions = $getRoleId->permissions->pluck('name')->toArray();

        return view('backend.roles.permissionForm', compact('getRoleId', 'entities',  'actions', 'existingPermissions', 'rolePermissions'));
    }


    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,' . $id,
            'permissions' => 'array'
        ]);

        $role = Role::findOrFail($id);
        $role->name = $request->name;
        $role->save();

        if ($request->has('permissions')) {
            $role->syncPermissions($request->input('permissions'));
        } else {
            $role->syncPermissions([]);
        }

        return redirect()->route('roles.index')->with('success', 'Role updated successfully');
    }

    public function trash()
    {

        $trashedRoles = Role::onlyTrashed()->get();
        return view('backend.roles.roleTrash', compact('trashedRoles'));
    }

    public function destroy(Role $role)
    {
        try {
            $role->delete();
            app(PermissionRegistrar::class)->forgetCachedPermissions();

            return redirect()->back()->with('success', 'Role moved to trash successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete role: ' . $e->getMessage());
        }
    }

    public function restore($id)
    {
        $role = Role::withTrashed()->findOrFail($id);
        $role->restore();

        // Refresh Spatie cache so the role is active again
        app(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();

        return redirect()->route('roles.index')->with('success', 'Role restored successfully.');
    }

    public function forceDelete($id)
    {
        $role = Role::withTrashed()->findOrFail($id);

        // For permanent delete, we MUST clean pivot tables
        $role->permissions()->detach();
        $role->users()->detach();
        $role->forceDelete();

        return redirect()->back()->with('success', 'Role permanently purged from database.');
    }

    public function getModels()
    {
        $models = [];
        $path = app_path('Models');

        foreach (scandir($path) as $file) {
            if ($file !== '.' && $file !== '..') {
                $models[] = str_replace('.php', '', $file);
            }
        }

        return $models;
    }
}
