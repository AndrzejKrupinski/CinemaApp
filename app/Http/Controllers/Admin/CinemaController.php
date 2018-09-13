<?php declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\CinemaService;
use App\Services\Admin\CinemaService as AdminCinemaService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;

class CinemaController extends Controller
{
    /** @var CinemaService */
    private $service;

    /** @var AdminCinemaService */
    private $adminService;

    public function __construct(
        CinemaService $service,
        AdminCinemaService $adminService
    ) {
        $this->service = $service;
        $this->adminService = $adminService;
    }

    public function index(): View
    {
        return view('admin.cinema.index', [
            'cinemas' => $this->service->getAll(),
        ]);
    }
}
