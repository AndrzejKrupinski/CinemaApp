<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\FilmShow;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Collection;

class FilmShowController extends Controller
{
    private $model;

    public function __construct(FilmShow $filmShow)
    {
        $this->model = $filmShow;
    }

    public function index(): View
    {
        return view('reservation.filmshow');
    }

    /**
     * Return a set of shows for given movie in current week
     */
    public function getCurrentShows(array $movieIds): Collection
    {
        dd($this->model->whereIn('movie_id', $movieIds)->get());
    }
}
