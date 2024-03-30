<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blogs;
use App\Models\User;
use App\Models\Comment; 

class dashboardController extends Controller
{   
    public function index()
    {
        $user = session('user');
        // $users = User::all();
        $users = User::paginate(10);
        $recentPosts = Blogs::latest()->take(4)->get();
        $recentPostsAll = Blogs::latest()->get();
        $totalComments = Comment::count();

        // Calculate user engagement metrics (Example: total views, likes, shares)
        $totalViews = 0; // TODO: Implement logic to retrieve total views 
        $totalLikes = 0; // TODO: Implement logic to retrieve total likes
        $totalShares = 0; // TODO: Implement logic to retrieve total shares
        $totalEngagement = $totalViews + $totalLikes + $totalShares + $totalComments;


        return view('dashboard', compact('user', 'recentPosts','users','recentPostsAll' ,'totalComments', 'totalEngagement'));
    }
}
