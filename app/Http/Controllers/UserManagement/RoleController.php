<?php

namespace App\Http\Controllers\UserManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

    public function index()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('menu.user_management.roles.view', compact('roles', 'permissions'));
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('menu.user_management.roles.add', compact('permissions'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'role'=>'required|max:255',
        ]);

        $role = Role::create(['name' => $request->role, 'guard_name' => 'web']);
        $role->syncPermissions($request->permissions);

        return redirect()->route('view-roles')->with('success', 'Role created successfully');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $role = Role::find($id);
        $permissions = Permission::all();
        return view('menu.user_management.roles.edit', compact('role', 'permissions'));
    }


    public function update(Request $request, $id)
    {
        $role = Role::find($id);
        $role->name = $request->role;
        $role->save();
        $role->syncPermissions($request->permissions);
        return redirect()->route('view-roles')->with('success', 'Role updated successfully');
    }

    public function destroy($id)
    {
        $roles = Role::find($id);
        //if role has users, do not delete
        $roles = Role::find($id);
        
        //if role is assigned to any user then it cannot be deleted
        if($roles->users->count() > 0){
            return redirect()->back()->with('warning', 'Role cannot be deleted as it is assigned to some users');
        }

        //delete role
        $roles->delete();
        return redirect()->back()->with('success', 'Role deleted successfully');
    }
}
