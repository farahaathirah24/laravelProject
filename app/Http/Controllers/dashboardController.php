<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blogs;
use App\Models\User;

class dashboardController extends Controller
{   
    public function index()
    {
        $user = session('user');
        // $users = User::all();
        $users = User::paginate(10);
        $recentPosts = Blogs::latest()->take(4)->get();

        return view('dashboard', compact('user', 'recentPosts','users'));
    }
}
