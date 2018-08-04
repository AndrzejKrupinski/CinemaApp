<?php

namespace App\Services;

use App\Models\Cinema;
use Illuminate\Database\Eloquent\Collection;

class CinemaService
{
    /** @var Cinema */
    private $model;

    public function __construct(Cinema $cinema)
    {
        $this->model = $cinema;
    }

    public function getAll(): Collection
    {
        return $this->model::all();
    }
}
