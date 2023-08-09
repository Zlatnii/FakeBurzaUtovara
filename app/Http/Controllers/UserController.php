<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
        ->leftJoin('package', 'package.id', '=', 'users.package_id')
        ->select('users.*', 'roles.name AS role_name', 'package.name AS user_package')
        ->get();

        return view('users.index', compact('users', 'usersRoles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        $usersRoles = DB::table('users')
        ->leftJoin('roles', 'roles.id', '=', 'users.role_id')
        ->select('users.*', 'roles.name AS role_name')
        ->get();

        return view('users.create', compact('usersRoles', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
                //'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'name' => 'required',
                'surname' => 'required',
                'oib' => 'required','integer',
                'role_id' =>  'required|exists:roles,id',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:8|confirmed'
            ],
            [
                'password.confirmed' => 'The password confirmation does not match.'
            ]);

        //   // Upload image file if present
        //   if ($request->hasFile('image')) {
        //     $imagePath = $request->file('image')->store('public/images');
        // } else {
        //     $imagePath = null;
        // }

        // Create a new user
            $user = new User();
        //  $user->img_path = $imagePath;
            $user->name = $request->input('name');
            $user->surname = $request->input('surname');
            $user->oib = $request->input('oib');
            $user->email = $request->input('email');
            $user->role_id = $request->input('role_id');
            $user->password = Hash::make($request->input('password_confirmation'));
            // Save user to database
            $user->save();
            // Redirect to the users page
            return redirect()->route('users.index')->with('status', 'User created successfully!');
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
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        //Validate input data
        $validatingData = $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role_id' => 'required'
        ]);
        //Update users data
        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->email = $request->input('email');
        $user->role_id = $request->input('role_id');
        $user->save();

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::destroy($id);
        return redirect('users')->with('deleted', 'User deleted succesfully!');
    }

    public function users()
    {
        $userCount = User::count();
        return view('dashboard', compact('userCount'));
    }
}
