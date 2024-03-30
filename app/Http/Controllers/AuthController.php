<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Import Auth class
use Illuminate\Support\Facades\Validator; // Import Validator class
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    /**
     * Handle user registration.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function loginForm()
    {
        return view('auth.login');
    }
    public function loginVerify(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            $user = Auth::user(); // Mendapatkan data pengguna yang sedang masuk
            return redirect()->intended('/dashboard')->with('user', $user);
        }
        return redirect()->back()->with('error', 'Invalid credentials');
    }
    public function logout()
    {
        Auth::logout(); // Proses logout pengguna
        return redirect('/'); // Redirect pengguna ke halaman utama atau halaman login setelah logout
    }
    public function registerForm()
    {
        return view('auth.register');
    }
    public function registerProc(Request $request)
    {
        // Validate registration data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
    
        // Create a new user in the database
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    
        // Redirect to the login page after successful registration
        return redirect()->route('loginForm')->with('success', 'Registration successful! Please log in.');
    }
    
  
}
