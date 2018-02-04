<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\FilmShowService;

class FilmShowController extends Controller
{
    /** @var FilmShowService */
    private $service;

    public function __construct(FilmShowService $filmShowService)
    {
        $this->service = $filmShowService;
    }

    /**
     * Get a set of shows for given movie in current week
     */
    public function getCurrentShows(array $movieIds): array
    {
        return $this->service->getCurrentShows($movieIds);
    }

    /**
     * Parse dates into proper format
     */
    public function parseWeekDates(): array
    {
        return $this->service->parseWeekDates();
    }
}
