<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('adminpages.user.index', compact('users'));
    }

    public function create()
    {
        return view('adminpages.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email|unique:customers,email',
            'password'=>'required|min:6|confirmed',
            'user_type'=>'required|in:Individual,Broker,Dealer',
            'phone'=>'required',
        ]);

        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'user_type'=>$request->user_type,
            'phone'=>$request->phone,
            'status'=>'Active',
        ]);

        return redirect()->route('users.index')->with('success','User created successfully.');
    }

    public function edit(User $user)
    {
        return view('adminpages.user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email|unique:customers,email,'.$user->id,
            'user_type'=>'required|in:Individual,Broker,Dealer',
            'phone'=>'required',
        ]);

        $user->update($request->only('name','email','user_type','phone','status'));

        return redirect()->route('users.index')->with('success','User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success','User deleted successfully.');
    }
}

