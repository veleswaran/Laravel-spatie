<?php

namespace App\Http\Controllers;

use App\Models\PermissionGroup;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::with('permissions')->get();        
        return view('admin.roles.show',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissionGroups=PermissionGroup::with('permission')->get();  
        return view('admin.roles.create',compact('permissionGroups'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $role = new Role;
        $role->name = $request->name;
        $role->save();
        $permissions = Permission::whereIn('id', $request->permission_ids)->get();
        $role->syncPermissions($permissions);
        return redirect()->back()->with('message', "Role created with selected permission");
    }
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    
    {
        $permissionGroups=PermissionGroup::with('permission')->get();
        $roles= Role::with('permissions')->find($id);
        return view("admin.roles.edit",compact(['roles','permissionGroups']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $role = Role::find($id);
        $role->name = $request->name;
        $role->save();
        $permissions = Permission::whereIn('id', $request->permission_ids)->get();
        $role->syncPermissions($permissions);
        return redirect()->back()->with('message', "Role updated with selected permission");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = Role::find($id);
        $role->delete();
        return redirect()->back()->with('message', "Role deleted with selected permission");
    }
}
