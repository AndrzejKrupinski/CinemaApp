<?php declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Models\Cinema;
use App\Services\CinemaService;
use App\Services\Admin\CinemaService as AdminCinemaService;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

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

    public function index(array $messages = null, array $errors = null): View
    {
        return view('admin.cinema.index', [
            'cinemas' => $this->service->getAll(),
            'messages' => $messages ?? null,
            'errors' => $errors ?? null,
        ]);
    }

    public function create(): View
    {
        return view('admin.cinema.create', [
            'cinema' => Cinema::make(),
        ]);
    }

    /**
     * @return View|RedirectResponse
     */
    public function edit(int $cinemaId)
    {
        if ($cinema = Cinema::find($cinemaId)) {
            return view('admin.cinema.create', [
                'cinema' => $cinema,
            ]);
        }

        return redirect()->route('cinema.index', ['errors' => ["Wront cinema id given!"]]);
    }

    public function store(Request $request): RedirectResponse
    {
        if ($this->adminService->store($request)) {
            return redirect()->route('cinema.index', ['messages' => ["Cinema saved successfully!"]]);
        }

        return redirect()->route('cinema.index', ['errors' => ["Couldn't save cinema!"]]);
    }

    public function update(Request $request): RedirectResponse
    {
        if ($this->adminService->update($request)) {
            return redirect()->route('cinema.index', ['messages' => ["Cinema updated successfully!"]]);
        }

        return redirect()->route('cinema.index', ['errors' => ["Couldn't update cinema!"]]);
    }

    public function destroy(int $cinemaId): RedirectResponse
    {
        if ($this->adminService->destroy($cinemaId)) {
            return redirect()->route('cinema.index', ['messages' => ["Cinema deleted successfully!"]]);
        }

        return redirect()->route('cinema.index', ['errors' => ["Couldn't delete cinema!"]]);
    }
}
