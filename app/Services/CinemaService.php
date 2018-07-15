<?php

namespace App\Services;

use App\Models\Cinema;
use Illuminate\Database\Eloquent\Collection;

class CinemaService
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
            $moviesFilmShows = $movie->filmShows->sortBy('time')->toArray();

            $currentFilmShowsForMovies[$movie->id] = array_uintersect($moviesFilmShows,
                $currentFilmShows,
                function ($moviesFilmShows, $currentFilmShows) {
                    return strcmp((string)$moviesFilmShows['id'], (string)$currentFilmShows['id']);
                });
        }

        return $currentFilmShowsForMovies;
    }

    public function combineFilmShowsWithWeekDays(
        Collection $movies,
        array $filmShows,
        array $currentWeek
    ): array
    {
        $filmShowsPerWeekdays = [];

        foreach ($movies as $movie) {
            $filmShowsPerWeekdays[$movie->id] = [];
        }

        foreach ($filmShows as $singleMovieFilmShows) {
            foreach ($singleMovieFilmShows as $filmShow) {
                switch (true) {
                    case ($filmShow['time'] < $currentWeek['tuesday']):
                        $filmShowsPerWeekdays[$filmShow['movie_id']]['monday'][] = $filmShow;
                        break;
                    case ($filmShow['time'] > $currentWeek['tuesday'] && $filmShow['time'] < $currentWeek['wednesday']):
                        $filmShowsPerWeekdays[$filmShow['movie_id']]['tuesday'][] = $filmShow;
                        break;
                    case ($filmShow['time'] > $currentWeek['wednesday'] && $filmShow['time'] < $currentWeek['thursday']):
                        $filmShowsPerWeekdays[$filmShow['movie_id']]['wednesday'][] = $filmShow;
                        break;
                    case ($filmShow['time'] > $currentWeek['thursday'] && $filmShow['time'] < $currentWeek['friday']):
                        $filmShowsPerWeekdays[$filmShow['movie_id']]['thursday'][] = $filmShow;
                        break;
                    case ($filmShow['time'] > $currentWeek['friday'] && $filmShow['time'] < $currentWeek['saturday']):
                        $filmShowsPerWeekdays[$filmShow['movie_id']]['friday'][] = $filmShow;
                        break;
                    case ($filmShow['time'] > $currentWeek['saturday'] && $filmShow['time'] < $currentWeek['sunday']):
                        $filmShowsPerWeekdays[$filmShow['movie_id']]['saturday'][] = $filmShow;
                        break;
                    case ($filmShow['time'] > $currentWeek['sunday']):
                        $filmShowsPerWeekdays[$filmShow['movie_id']]['sunday'][] = $filmShow;
                        break;
                }
            }
        }

        return $filmShowsPerWeekdays;
    }
}
