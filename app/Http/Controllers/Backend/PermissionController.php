<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;


class PermissionController extends Controller
{

    public function store(Request $request)
    {

        $selected = $request->input('matrix', []);


        Permission::whereNotIn('name', $selected)
            ->where('guard_name', 'web')
            ->delete();


        $currentInDb = Permission::where('guard_name', 'web')->pluck('name')->toArray();
        $toCreate = array_diff($selected, $currentInDb);


        if (!empty($toCreate)) {
            $insertData = array_map(function ($name) {
                return [
                    'name' => $name,
                    'guard_name' => 'web',
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }, $toCreate);

            Permission::insert($insertData);
        }

        return redirect()->back()->with('success', 'Permission list synchronized successfully.');
    }
}
