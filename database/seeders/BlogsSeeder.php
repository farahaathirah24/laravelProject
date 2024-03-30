<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Blogs; 

class BlogsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create sample blog posts
        Blogs::factory()->count(13)->create();
    }
}
