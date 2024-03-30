<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Blogs;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      // Define the view composer
       View::composer('template.templateNav', function ($view) {
        // Retrieve recent posts data
        $recentPosts = Blogs::orderBy('created_at', 'desc')->take(5)->get();
        
        // Pass the recent posts data to the view
        $view->with('recentPosts', $recentPosts);
    });
    }
}
