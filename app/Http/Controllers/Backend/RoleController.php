<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::latest()->with('permissions')
            ->withCount('users')
            ->get();


        return view('backend.roles.index', compact('roles'));
    }


    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:roles,name'
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator, 'roleBag')
                ->withInput()
                ->with('active_tab', 'role-tab');
        }
        Role::create([
            'name' => $request->name
        ]);

        return redirect()->back()->with([
            'success' => 'Role created successfully!',
            'active_tab' => 'role-tab'
        ]);
    }

    public function edit(string $id)
    {
        $roles = Role::latest()->with('permissions')
            ->withCount('users')
            ->get();
        $getRoleId = Role::findOrFail($id);

        $entities = $this->getModels();
        $actions = ['View', 'Create', 'Edit', 'Delete'];

        $existingPermissions = Permission::pluck('name')->toArray();

        return view('backend.roles.form', compact('getRoleId', 'entities', 'roles', 'actions', 'existingPermissions'));
    }


    public function update(Request $request, $id)
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
