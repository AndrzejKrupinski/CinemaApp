<?php declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Models\Movie;
use App\Services\MovieService;
use App\Services\Admin\MovieService as AdminMovieService;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class MovieController extends Controller
{
	/** @var MovieService */
    private $service;

    /** @var AdminMovieService */
    private $adminService;

    public function __construct(
        MovieService $service,
        AdminMovieService $adminService
    ) {
        $this->service = $service;
        $this->adminService = $adminService;
    }

	public function index(array $messages = null, array $errors = null): View
    {
        return view('admin.movie.index', [
            'movies' => $this->service->getAll(),
            'messages' => $messages ?? null,
            'errors' => $errors ?? null,
        ]);
    }

    public function create(): View
    {
        return view('admin.movie.create', [
            'cinema' => Movie::make(),
        ]);
    }

	/**
     * @return View|RedirectResponse
     */
    public function edit(int $movieId)
    {
        if ($movie = Movie::find($movieId)) {
            return view('admin.movie.create', [
                'movie' => $movie,
            ]);
        }

        return redirect()
            ->route('movie.index', ['errors' => ["Wrong movie id given!"]]);
    }

	public function store(Request $request): RedirectResponse
    {
        if ($this->adminService->store($request)) {
            return redirect()
                ->route('movie.index', [
                    'messages' => ["Movie saved successfully!"]
                ]);
        }

        return redirect()->route('movie.index', [
            'errors' => ["Couldn't save the movie!"]
        ]);
    }

	public function update(Request $request): RedirectResponse
    {
        if ($this->adminService->update($request)) {
            return redirect()
                ->route('movie.index', [
                    'messages' => ["Movie updated successfully!"]
                ]);
        }

        return redirect()
            ->route('movie.index', [
                'errors' => ["Couldn't update the movie!"]
            ]);
    }

	public function destroy(int $siteId): RedirectResponse
    {
        if ($this->adminService->destroy($siteId)) {
            return redirect()
                ->route('movie.index', [
                    'messages' => ["Movie deleted successfully!"]
                ]);
        }

        return redirect()
            ->route('movie.index', [
                'errors' => ["Couldn't delete the movie!"]
            ]);
    }
}
