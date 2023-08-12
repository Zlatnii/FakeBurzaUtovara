<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

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

    public function destroy(string $id)
    {
        Role::destroy($id);
        return redirect('roles')->with('deleted', 'Role deleted succesfully!');
    }
}
