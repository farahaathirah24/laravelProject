<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    // Display user profile
    public function profile()
    {
        $user = Auth::user();
        return view('profile.profile', compact('user'));
    }

    // Update user profile
    public function profileProc(Request $request)
    {
        
        $user = Auth::user();
      // Creating a validator with the specified rules
       $validator = Validator::make($request->all(), [
            'name' => 'string',
            'email' => [
                'string',
                'email',
            ],
            // Add additional rules here if needed
     ]);

    // Checking if the validator fails
    if ($validator->fails()) {
        return redirect()->route('profile')->with('error', 'Failed to update profile.');
    }
       
        $user->update($request->all());

        return redirect()->route('profile')->with('success', 'Profile updated successfully!');
    }
}
