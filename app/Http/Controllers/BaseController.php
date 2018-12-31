<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\BaseService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;

class BaseController extends Controller
{
    /** @var string */
    private $model;

    /** @var BaseService */
    private $service;

    public function __construct(BaseService $service)
    {
        $this->service = $service;
    }

    public function index(): View
    {
        return view("$this->model.index", [
            $this->model . 's' => $this->service->getAll(),
        ]);
    }
}
