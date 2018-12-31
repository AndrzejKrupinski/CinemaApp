<?php declare(strict_types=1);

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class BaseService
{
    /** @var Model */
    private $model;

    public function __construct(Model $cinema)
    {
        $this->model = $cinema;
    }

    public function getAll(): Collection
    {
        return $this->model::all();
    }
}
