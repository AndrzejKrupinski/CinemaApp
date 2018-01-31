<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\FilmShow;
use App\Http\Controllers\FilmShowController;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Database\Eloquent\Collection;

class MovieController extends Controller
{
    /** @var Movie */
    private $model;

    public function __construct(
        Movie $movie,
        FilmShowController $filmShowController
    ) {
        $this->model = $movie;
        $this->filmShowController = $filmShowController;
    }

        public function index(): View
    {
        $movies = $this->getAll();

        return view('reservation.movielist', [
            'movies' => $movies,
            'currentWeek' => $this->filmShowController->parseWeekDates(),
            'filmShows' => $this->getCurrentFilmShowsForMovies($movies),
        ]);
    }

    private function getAll(): Collection
    {
        return $this->model::all();
    }

    private function getCurrentFilmShowsForMovies(Collection $movies): array
    {
        $currentFilmShowsForMovies = [];
        $currentFilmShows = $this->filmShowController->getCurrentShows(array_column($movies->toArray(), 'id'));

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
