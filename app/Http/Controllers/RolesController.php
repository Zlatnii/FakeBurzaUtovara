<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RolesController extends Controller
{
    public function index()
    {
        $roles = Role::all();

        return view('roles.index', compact('roles'));
    }

    public function edit(string $id)
    {
        $role = Role::findOrFail($id);
        return view('roles.edit', compact('role'));
    } 

    public function create()
    {
        $roles = Role::all();
        $usersRoles = DB::table('users')
        ->leftJoin('roles', 'roles.id', '=', 'users.role_id')
        ->select('users.*', 'roles.name AS role_name')
        ->get();

        return view('roles.create', compact('usersRoles', 'roles'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
                'name' => 'required',
            ]);
            $role = new Role();
            $role->name = $request->input('name');
            $role->save();
            return redirect()->route('roles.index')->with('status', 'New role has created successfully!');
    }

    public function update(Request $request, string $id)
    {
        $role = Role::findOrFail($id);
        $validatingData = $request->validate([
            'name' => 'required',
        ]);
        $role->name = $request->input('name');
        $role->save();

        return redirect()->route('roles.index');
    }

    public function destroy(string $id)
    {
        Role::destroy($id);
        return redirect('roles')->with('deleted', 'Role deleted succesfully!');
    }
}
