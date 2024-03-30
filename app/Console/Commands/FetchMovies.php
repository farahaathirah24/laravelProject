<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Services\TmdbService;


class FetchMovies extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:movies {query}';
    protected $description = 'Fetch movies from TMDb API based on the provided query';

    protected $tmdbService;

    /**
     * The console command description.
     *
     * @var string
     */

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(TmdbService $tmdbService)
        {
            parent::__construct();
            $this->tmdbService = $tmdbService;
        }


    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $query = $this->argument('query');
        $movies = $this->tmdbService->searchMovies($query);

        // Display the fetched data
        $this->info('Movies found: ' . count($movies));
        $this->table(['Title', 'Release Date'], $movies);
    }
}
