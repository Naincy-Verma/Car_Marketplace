<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class LoginController extends Controller
{
    // Show login form
    public function showLoginForm()
    {
        return view('adminpages.login'); // create this Blade view
    }
    
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|min:6',
        ]);

         if (Auth::guard('admin')->attempt($credentials, $request->remember)) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard')->with('success', 'Welcome Admin!');
        }

        return back()->withErrors([
            'email'=> 'Invalid credentials',
        ])->onlyInput();
    }

    public function logout(Request $request)
    {
        // Auth::logout();
         Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('adminpages.login')->with('success', 'Logged out successfully.');
    }
}
