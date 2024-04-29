<?php

namespace App\Http\Controllers\UserManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Hash;
use Auth;

class UserController extends Controller
{public function index()
    {
        $users = User::all();
        $roles = Role::all();
        return view('menu.user_management.view', compact('users', 'roles'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        if (User::where('email', $request->email)->exists()) {
            return redirect()->back()->with('warning', 'Email already exists.');
        }
        $this->validate($request, [
            'name' => 'required | max:255',
            'email' => 'required | max:255',
            'password' => 'required | max:255',
            'role' => 'required',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        $user->assignRole($request->role);
        $user->save();
        return redirect()->back()->with('success', 'User added successfully');
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->syncRoles($request->role);
        $user->save();
        return redirect()->back()->with('success', 'User updated successfully');
    }
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->with('success', 'User deleted successfully');
    }
}
