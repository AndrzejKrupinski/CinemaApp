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

    public function __construct(Movie $movie)
    {
        $this->model = $movie;
    }

        public function index(): View
    {
        $movies = $this->getAll();
        $moviesIds = array_column($movies->toArray(), 'id');

        return view('reservation.movielist', [
            'movies' => $movies,
            'filmShows' => $this->getCurrentShows($moviesIds),
        ]);
    }

    private function getAll(): Collection
    {
        return $this->model::all();
    }

    /**
     * MA ZWRACAĆ PAKIET DANYCH, ALE TYLKO DLA FILMÓW Z LISTY! DLA KAŻDEGO POJEDYNCZO!
     */
    private function getCurrentShows(array $moviesIds)
    {
        $filmShowController = resolve(FilmShowController::class);

        return $filmShowController->getCurrentShows($moviesIds);
    }
}
