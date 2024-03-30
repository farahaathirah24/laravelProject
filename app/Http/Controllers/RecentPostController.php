<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blogs;

class RecentPostController extends Controller
{
    public function index()
        {
            $recentPosts = Blogs::latest()->take(5)->get();
            return view('blogs.index', compact('recentPosts'));
        }
}
