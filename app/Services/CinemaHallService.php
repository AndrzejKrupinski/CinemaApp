<?php

namespace App\Services;

use App\Models\CinemaHall;
use Illuminate\Database\Eloquent\Collection;

class CinemaHallService
{
    /** @var CinemaHall */
    private $model;

    public function __construct(CinemaHall $cinemaHall)
    {
        $this->model = $cinemaHall;
    }

    public function getAll(): Collection
    {
        return $this->model::all();
    }
}
