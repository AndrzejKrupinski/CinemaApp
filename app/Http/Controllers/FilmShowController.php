<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\FilmShow;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class FilmShowController extends Controller
{
    /** @var FilmShow */
    private $model;

    /** @var array */
    public $currentWeek;

    public function __construct(FilmShow $filmShow)
    {
        $this->model = $filmShow;
        $this->currentWeek = $this->getCurrentWeekDates();
    }

    public function index(): View
    {
        return view('reservation.filmshow');
    }

    /**
     * Get current dates whithin current week
     */
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

        return [
            'monday' => $monday,
            'tuesday' => $tuesday,
            'wednesday' => $wednesday,
            'thursday' => $thursday,
            'friday' => $friday,
            'saturday' => $saturday,
            'sunday' => $sunday
        ];
    }

    /**
     * Get a set of shows for given movie in current week
     */
    public function getCurrentShows(array $movieIds): array
    {
        return $this->model
            ->whereIn('movie_id', $movieIds)
            ->where('time', '>=', $this->currentWeek['monday'])
            ->where('time', '<=', $this->currentWeek['friday'])
            ->orderBy('time', 'asc')
            ->get()
            ->toArray();
    }

    public function parseWeekDates(): array
    {
        return [
            'monday'=> $this->currentWeek['monday']->format('d.m'),
            'tuesday'=> $this->currentWeek['tuesday']->format('d.m'),
            'wednesday'=> $this->currentWeek['wednesday']->format('d.m'),
            'thursday'=> $this->currentWeek['thursday']->format('d.m'),
            'friday'=> $this->currentWeek['friday']->format('d.m'),
            'saturday'=> $this->currentWeek['saturday']->format('d.m'),
            'sunday'=> $this->currentWeek['sunday']->format('d.m'),
        ];
    }
}
