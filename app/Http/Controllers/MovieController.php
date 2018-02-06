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
        $movies = $this->service->getAll();
        $currentWeek = $this->filmShowController->parseWeekDates();

        $filmShowsPerWeekdays = $this->service->combineFilmShowsWithWeekDays(
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

    private function getCurrentFilmShowsForMovies(Collection $movies): array
    {
        return $this->service->getCurrentFilmShowsForMovies(
            $this->filmShowController->getCurrentShows(array_column($movies->toArray(), 'id')),
            $movies
        );
    }
}
