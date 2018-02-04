<?php

namespace App\Services;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Collection;

class MovieService
{
    /** @var Movie */
    private $model;

    /** @var array */
    public $currentWeek;

    public function __construct(Movie $movie)
    {
        $this->model = $movie;
    }

    public function getAll(): Collection
    {
        return $this->model::all();
    }

    /**
     * Get set of filmshows playing this week for given movies
     */
    public function getCurrentFilmShowsForMovies(array $currentFilmShows, Collection $movies): array
    {
        $currentFilmShowsForMovies = [];

        foreach ($movies as $movie) {
            $moviesFilmShows = $movie->filmShows->toArray();

            $currentFilmShowsForMovies[$movie->id] = array_uintersect($moviesFilmShows,
                $currentFilmShows,
                function ($moviesFilmShows, $currentFilmShows) {
                    return strcmp((string)$moviesFilmShows['id'], (string)$currentFilmShows['id']);
                });
        }

        return $currentFilmShowsForMovies;
    }
}