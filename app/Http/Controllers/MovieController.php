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

        return view('reservation.movielist', [
            'movies' => $movies,
            'currentWeek' => $this->filmShowController->parseWeekDates(),
            'filmShows' => $this->getCurrentFilmShowsForMovies($movies),
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
}
