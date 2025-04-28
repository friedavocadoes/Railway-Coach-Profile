<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Handle the login logic
    public function login(Request $request)
    {
        // Validate login data
        $validated = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Check if user exists
        $user = User::where('username', $validated['username'])->first();

        if ($user && Hash::check($validated['password'], $user->password)) {
            // Authentication successful, store session or cookie
            Auth::login($user);
            session(['user_role' => $user->role, 'user_id' => $user->id]);

            // Redirect to dashboard
            return redirect()->route('dashboard');
        } else {
            return back()->withErrors(['username' => 'Invalid credentials']);
        }
    }

    // Logout logic
    public function logout()
    {
        Auth::logout();
        session()->flush(); // Clear the session
        return redirect()->route('login');
    }
}
