<?php declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Models\Reservation;
use App\Services\ReservationService;
use App\Services\Admin\ReservationService as AdminReservationService;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class ReservationController extends Controller
{
	/** @var ReservationService */
	private $service;

	/** @var AdminReservationService */
	private $adminService;

	public function __construct(
		ReservationService $service,
		AdminReservationService $adminService
	) {
		$this->service = $service;
		$this->adminService = $adminService;
	}

	public function index(array $messages = null, array $errors = null): View
    {
        return view('admin.cinema-hall.index', [
            'reservations' => $this->service->getAll(),
            'messages' => $messages ?? null,
            'errors' => $errors ?? null,
        ]);
    }

	public function create(): View
    {
        return view('admin.reservation.create', [
            'reservation' => Reservation::make(),
        ]);
    }

	/**
     * @return View|RedirectResponse
     */
    public function edit(int $cinemaId)
    {
        if ($reservation = Reservation::find($reservationId)) {
            return view('admin.reservation.create', [
                'reservation' => $reservation,
            ]);
        }

        return redirect()
            ->route('reservation.index', [
				'errors' => ["Wrong reservation id given!"]
			]);
    }

	public function store(Request $request): RedirectResponse
    {
        if ($this->adminService->store($request)) {
            return redirect()
                ->route('reservation.index', [
                    'messages' => ["Reservation saved successfully!"]
                ]);
        }

        return redirect()->route('reservation.index', [
            'errors' => ["Couldn't save the reservation!"]
        ]);
    }

	public function update(Request $request): RedirectResponse
    {
        if ($this->adminService->update($request)) {
            return redirect()
                ->route('reservation.index', [
                    'messages' => ["Reservation updated successfully!"]
                ]);
        }

        return redirect()
            ->route('reservation.index', [
                'errors' => ["Couldn't update the reservation!"]
            ]);
    }

	public function destroy(int $siteId): RedirectResponse
    {
        if ($this->adminService->destroy($siteId)) {
            return redirect()
                ->route('reservation.index', [
                    'messages' => ["Reservation deleted successfully!"]
                ]);
        }

        return redirect()
            ->route('reservation.index', [
                'errors' => ["Couldn't delete the reservation!"]
            ]);
    }
}
