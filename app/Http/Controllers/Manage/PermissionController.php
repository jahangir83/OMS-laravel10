<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permission = Permission::get();
        return view('Manage.permission.index', ['permissions' => $permission]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Manage.permission.create');
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
                'unique:permissions,name'
            ]
        ]);

        Permission::create(['name' => $request->name]);

        return redirect('dashboard/permissions')->with('status', 'Permission Crate Successfully.');
        // return redirect('permissions')->with('status','Permission Created Successfully');
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
    public function edit(Permission $permission)
    {
        return view('Manage.permission.edit', ['permission' => $permission]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permission $permission)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:permissions,name,.$permission->id'
            ]
        ]);

        $permission->update([
            'name' => $request->name
        ]);
        return redirect('dashboard/permissions')->with('status', 'Permission Update Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $permissionId)
    {
        $permission = Permission::find($permissionId);
        $permission->delete();
        return redirect('dashboard/permissions')->with('status', 'Permission Delete Successfully.');
    }
}
