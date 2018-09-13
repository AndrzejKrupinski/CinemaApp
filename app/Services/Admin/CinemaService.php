<?php

namespace App\Services\Admin;

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
}
