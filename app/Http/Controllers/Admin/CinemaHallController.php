<?php declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Models\CinemaHall;
use App\Services\CinemaHallService;
use App\Services\Admin\CinemaHallService as AdminCinemaHallService;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class CinemaHallController extends Controller
{
    /** @var CinemaHallService */
    private $service;

    /** @var AdminCinemaHallService */
    private $adminService;

    public function __construct(
        CinemaHallService $service,
        AdminCinemaHallService $adminService
    ) {
        $this->service = $service;
        $this->adminService = $adminService;
    }

    public function index(array $messages = null, array $errors = null): View
    {
        return view('admin.cinema-hall.index', [
            'cinema-halls' => $this->service->getAll(),
            'messages' => $messages ?? null,
            'errors' => $errors ?? null,
        ]);
    }

    public function create(): View
    {
        return view('admin.cinema-hall.create', [
            'cinemaHall' => CinemaHall::make(),
        ]);
    }

    /**
     * @return View|RedirectResponse
     */
    public function edit(int $cinemaHallId)
    {
        if ($cinemaHall = CinemaHall::find($cinemaHallId)) {
            return view('admin.cinema-hall.create', [
                'cinema-hall' => $cinemaHall,
            ]);
        }

        return redirect()->route('cinema-hall.index', [
            'errors' => ["Wront cinema hall id given!"]
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        if ($this->adminService->store($request)) {
            return redirect()->route('cinema-hall.index', [
                'messages' => ["Cinema hall saved successfully!"]
            ]);
        }

        return redirect()->route('cinema-hall.index', [
            'errors' => ["Couldn't save cinema hall!"]
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        if ($this->adminService->update($request)) {
            return redirect()->route('cinema-hall.index', [
                'messages' => ["Cinema hall updated successfully!"]
            ]);
        }

        return redirect()->route('cinema-hall.index', [
            'errors' => ["Couldn't update cinema hall!"]
        ]);
    }

    public function destroy(int $cinemaId): RedirectResponse
    {
        if ($this->adminService->destroy($cinemaId)) {
            return redirect()->route('cinema-hall.index', [
                'messages' => ["Cinema hall deleted successfully!"]
            ]);
        }

        return redirect()->route('cinema-hall.index', [
            'errors' => ["Couldn't delete cinema hall!"]
        ]);
    }
}
