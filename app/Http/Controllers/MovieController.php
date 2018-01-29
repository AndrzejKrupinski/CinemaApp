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
            'filmShows' => $this->filmShowController->getCurrentShows(array_column($movies->toArray(), 'id')),
        ]);
    }

    private function getAll(): Collection
    {
        return $this->model::all();
    }
}
