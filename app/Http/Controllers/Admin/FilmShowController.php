<?php declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Models\FilmShow;
use App\Services\FilmShowService;
use App\Services\Admin\FilmShowService as AdminFilmShowService;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class FilmShowController extends Controller
{
	/** @var FilmShowService */
    private $service;

    /** @var AdminFilmShowService */
    private $adminService;

	public function __construct(
        FilmShowService $service,
        AdminFilmShowService $adminService
    ) {
        $this->service = $service;
        $this->adminService = $adminService;
    }

	public function index(array $messages = null, array $errors = null): View
    {
        return view('admin.film-show.index', [
            'filmShows' => $this->service->getAll(),
            'messages' => $messages ?? null,
            'errors' => $errors ?? null,
        ]);
    }

    public function create(): View
    {
        return view('admin.film-show.create', [
            'filmShow' => FilmShow::make(),
        ]);
    }

    /**
     * @return View|RedirectResponse
     */
    public function edit(int $filmShowId)
    {
        if ($filmShow = Cinema::find($filmShowId)) {
            return view('admin.film-show.create', [
                'filmShow' => $filmShow,
            ]);
        }

        return redirect()
            ->route('film-show.index', [
                'errors' => ["Wrong film show id given!"]
            ]);
    }

    public function store(Request $request): RedirectResponse
    {
        if ($this->adminService->store($request)) {
            return redirect()
                ->route('film-show.index', [
                    'messages' => ["Film show saved successfully!"]
                ]);
        }

        return redirect()->route('film-show.index', [
            'errors' => ["Couldn't save the film show!"]
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        if ($this->adminService->update($request)) {
            return redirect()
                ->route('film-show.index', [
                    'messages' => ["Film show updated successfully!"]
                ]);
        }

        return redirect()
            ->route('film-show.index', [
                'errors' => ["Couldn't update the film show!"]
            ]);
    }

    public function destroy(int $siteId): RedirectResponse
    {
        if ($this->adminService->destroy($siteId)) {
            return redirect()
                ->route('film-show.index', [
                    'messages' => ["Film show deleted successfully!"]
                ]);
        }

        return redirect()
            ->route('film-show.index', [
                'errors' => ["Couldn't delete the film show!"]
            ]);
    }
}
