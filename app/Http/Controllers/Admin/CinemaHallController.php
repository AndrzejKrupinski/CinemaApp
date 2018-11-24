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
            'cinemaHalls' => $this->service->getAll(),
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
                'cinemaHall' => $cinemaHall,
            ]);
        }

        return redirect()
            ->route('cinema-hall.index', ['errors' => ["Wrong cinema hall id given!"]]);
    }

    public function store(Request $request): RedirectResponse
    {
        if ($this->adminService->store($request)) {
            return redirect()
                ->route('cinema-hall.index', [
                    'messages' => ["Cinema hall saved successfully!"]
                ]);
        }

        return redirect()->route('movie.index', [
            'errors' => ["Couldn't save the cinema hall!"]
        ]);
    }

	public function update(Request $request): RedirectResponse
    {
        if ($this->adminService->update($request)) {
            return redirect()
                ->route('cinema-hall.index', [
                    'messages' => ["Cinema hall updated successfully!"]
                ]);
        }

        return redirect()
            ->route('cinema-hall.index', [
                'errors' => ["Couldn't update the cinema hall!"]
            ]);
    }

	public function destroy(int $siteId): RedirectResponse
    {
        if ($this->adminService->destroy($siteId)) {
            return redirect()
                ->route('cinema-hall.index', [
                    'messages' => ["Cinema hall deleted successfully!"]
                ]);
        }

        return redirect()
            ->route('cinema-hall.index', [
                'errors' => ["Couldn't delete the cinema hall!"]
            ]);
    }
}
