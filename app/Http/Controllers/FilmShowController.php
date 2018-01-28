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
        $week = $this->getCurrentWeekDates();

        return $this->model->whereIn('movie_id', $movieIds)
            ->where('data większa lub równa poniedziałkowi')
            ->where('data mniejsza lub równa poniedziałkowi')
            ->get();
    }

    public function getCurrentWeekDates(): array
    {
        $now = Carbon::now('Europe/Warsaw');
        $monday = Carbon::now('Europe/Warsaw')->setISODate($now->year, $now->weekOfYear);
        $tuesday = Carbon::now('Europe/Warsaw')->setISODate($now->year, $now->weekOfYear, 2);
        $wednesday = Carbon::now('Europe/Warsaw')->setISODate($now->year, $now->weekOfYear, 3);
        $thursday = Carbon::now('Europe/Warsaw')->setISODate($now->year, $now->weekOfYear, 4);
        $friday = Carbon::now('Europe/Warsaw')->setISODate($now->year, $now->weekOfYear, 5);
        $saturday = Carbon::now('Europe/Warsaw')->setISODate($now->year, $now->weekOfYear, 6);
        $sunday = Carbon::now('Europe/Warsaw')->setISODate($now->year, $now->weekOfYear, 7);

        return [$monday, $tuesday, $wednesday, $thursday, $friday, $saturday, $sunday];
    }
}
