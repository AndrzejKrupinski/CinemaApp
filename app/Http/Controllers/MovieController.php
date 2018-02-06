<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\MovieService;
use App\Http\Controllers\FilmShowController;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;

class MovieController extends Controller
{
    /** @var MovieService */
    private $service;

    public function __construct(
        MovieService $service,
        FilmShowController $filmShowController
    ) {
        $this->service = $service;
        $this->filmShowController = $filmShowController;
    }

    public function index(): View
    {
        $movies = $this->getAll();
        $currentWeek = $this->filmShowController->parseWeekDates();

        $filmShowsPerWeekdays = $this->combineFilmShowsWithWeekDays(
            $movies,
            $this->getCurrentFilmShowsForMovies($movies),
            $currentWeek
        );

        return view('reservation.movielist', [
            'movies' => $movies,
            'currentWeek' => $currentWeek,
            'filmShowsPerWeekdays' => $filmShowsPerWeekdays,
        ]);
    }

    private function getAll(): Collection
    {
        return $this->service->getAll();
    }

    private function getCurrentFilmShowsForMovies(Collection $movies): array
    {
        return $this->service->getCurrentFilmShowsForMovies(
            $this->filmShowController->getCurrentShows(array_column($movies->toArray(), 'id')),
            $movies
        );
    }

    private function combineFilmShowsWithWeekDays(
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
