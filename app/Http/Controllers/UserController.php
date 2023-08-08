<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();

        $usersRoles = DB::table('users')
        ->leftJoin('roles', 'roles.id', '=', 'users.role_id')
        ->select('users.*', 'roles.name AS role_name')
        ->get();
        
        $usersPackages = DB::table('users')
        ->leftJoin('package', 'package.id', '=', 'users.package_id')
        ->select('users.*', 'package.name AS user_package')
        ->get();

        return view('users.index', compact('users', 'usersRoles', 'usersPackages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        $user = User::all();

        return view('users.edit');    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
