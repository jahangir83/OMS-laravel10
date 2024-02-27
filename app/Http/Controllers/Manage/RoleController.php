<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::get();
        return View('Manage.role.index', ['roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Manage.role.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:roles,name'
            ]
        ]);

        Role::create(['name' => $request->name]);

        return redirect('dashboard/roles')->with('status', 'Role Crate Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        return view('Manage.role.edit', ['role' => $role]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:roles,name,.$role->id'
            ]
        ]);

        $role->update([
            'name' => $request->name
        ]);
        return redirect('dashboard/roles')->with('status', 'Roles Update Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $roleId)
    {
        $role = Role::find($roleId);
        $role->delete();
        return redirect('dashboard/roles')->with('status', 'Roles Delete Successfully.');
    }


    /**
     * Add Role and Permission 
     */
    public function addPermissionToRole(string $roleId)
    {
        $role = Role::findOrFail($roleId);
        $permission = Permission::all();
        $rolePermisssions = DB::table('role_has_permissions')
            ->where('role_has_permissions.role_id', $role->id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();
        return view('Manage.role-permission.add-permission', [
            'role' => $role,
            'permissions' => $permission,
            'rolePermisssions' => $rolePermisssions
        ]);
    }

    public function givePermissionToRole(Request $request, string $roleId)
    {
        $request->validate([
            'permission' => [
                'required'

            ]
        ]);

        $role = Role::findOrFail($roleId);
        $role->syncPermissions($request->permission);

        return redirect()->back()->with('status', 'Permissions added to role');
    }
}
