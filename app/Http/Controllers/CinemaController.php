<?php declare(strict_types=1);

namespace App\Http\Controllers;

//use App\Services\CinemaService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;

class CinemaController extends Controller
{
    /** @var CinemaService */
    private $service;

    public function __construct(
        CinemaService $service,
    ) {
        $this->service = $service;
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
}
