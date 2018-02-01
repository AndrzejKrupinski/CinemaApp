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
        $today = Carbon::today('Europe/Warsaw');
        $monday = Carbon::today('Europe/Warsaw')->setISODate($today->year, $today->weekOfYear);
        $tuesday = Carbon::today('Europe/Warsaw')->setISODate($today->year, $today->weekOfYear, 2);
        $wednesday = Carbon::today('Europe/Warsaw')->setISODate($today->year, $today->weekOfYear, 3);
        $thursday = Carbon::today('Europe/Warsaw')->setISODate($today->year, $today->weekOfYear, 4);
        $friday = Carbon::today('Europe/Warsaw')->setISODate($today->year, $today->weekOfYear, 5);
        $saturday = Carbon::today('Europe/Warsaw')->setISODate($today->year, $today->weekOfYear, 6);
        $sunday = Carbon::today('Europe/Warsaw')->setISODate($today->year, $today->weekOfYear, 7);
        $nextMonday = Carbon::today('Europe/Warsaw')->setISODate($today->year, $today->weekOfYear, 8);

        return [
            'monday' => $monday,
            'tuesday' => $tuesday,
            'wednesday' => $wednesday,
            'thursday' => $thursday,
            'friday' => $friday,
            'saturday' => $saturday,
            'sunday' => $sunday,
            'nextMonday' => $nextMonday,
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
            ->where('time', '<', $this->currentWeek['nextMonday'])
            ->orderBy('time', 'asc')
            ->get()
            ->toArray();
    }

    public function parseWeekDates(): array
    {
        return [
            'monday'=> $this->currentWeek['monday']->format('Y-m-d'),
            'tuesday'=> $this->currentWeek['tuesday']->format('Y-m-d'),
            'wednesday'=> $this->currentWeek['wednesday']->format('Y-m-d'),
            'thursday'=> $this->currentWeek['thursday']->format('Y-m-d'),
            'friday'=> $this->currentWeek['friday']->format('Y-m-d'),
            'saturday'=> $this->currentWeek['saturday']->format('Y-m-d'),
            'sunday'=> $this->currentWeek['sunday']->format('Y-m-d'),
        ];
    }
}
