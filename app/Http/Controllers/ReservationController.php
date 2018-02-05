<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Services\ReservationService;
use App\Http\Requests\ReservationRequest;
use Illuminate\View\View;
use Illuminate\Support\Carbon;

class ReservationController extends Controller
{
    /** @var ReservationService */
    private $service;

    public function __construct(ReservationService $reservationService)
    {
        $this->service = $reservationService;
    }

    public function create(int $filmShowId): View
    {
        $reservation = app()->make(Reservation::class);
        $reservation->film_show_id = $filmShowId;
        $active = $reservation->filmShow->time > Carbon::now('Europe/Warsaw')->toDateTimeString();

        return view('reservation.create', [
            'reservation' => $reservation,
            'active' => $active,
            'cinemaHall' => $active ? json_decode($reservation->filmShow->cinema_hall) : null,
        ]);
    }

    public function store(ReservationRequest $request): View
    {
        return $this->service->store($request->all());
    }
}
