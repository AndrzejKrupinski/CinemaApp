<?php

namespace App\Services;

use App\Models\FilmShow;
use Illuminate\Support\Carbon;

class FilmShowService
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

    /**
     * Get current dates whithin current week
     */
    private function getCurrentWeekDates(): array
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

    /**
     * Parse dates into proper format
     */
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

    /**
     * Reserve seats for current FilmShow
     */
    public function reserveSeats(array $seats): FilmShowService
    {
        $cinemaHall = json_decode($this->model->cinema_hall);

        foreach ($seats as $rowNumber => $row) {
            foreach ($row as $seatNumber => $seat) {
                $cinemaHall[$rowNumber][$seatNumber] = 1;
            }
        }

        $this->model->cinema_hall = json_encode($cinemaHall);

        return $this;
    }

    public function getModel(): FilmShow
    {
        return $this->model;
    }

    public function setModel(FilmShow $filmShow): FilmShowService
    {
        $this->model = $filmShow;

        return $this;
    }
}