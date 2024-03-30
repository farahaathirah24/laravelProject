<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\TmdbService;

class MovieController extends Controller
{
    protected $tmdbService;

    public function __construct(TmdbService $tmdbService)
    {
        $this->tmdbService = $tmdbService;
    }

    public function index()
    {
        return view('movie.search');
    }
    
    public function search(Request $request)
    {
        try {
            $query = $request->input('query');

            $movies = $this->tmdbService->searchMovies($query);

            if (isset($movies['results'])) {
                $movies = $movies['results'];
            } else {
                $movies = [];
                return redirect()->back()->with('error', 'sorry! no movies found');
            }

            return view('movie.search', ['movies' => $movies]);
        } catch (\Exception $e) {
        
            return redirect()->back()->with('error', 'Error occurred while searching movies');
        }
    }
}
