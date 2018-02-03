<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\FilmShow;
use App\Models\Cinema;
use App\Http\Requests\ReservationRequest;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ReservationController extends Controller
{
    public function index(): View
    {
        return view('reservation.reservation');
    }

    public function create(int $filmShowId): View
    {
        $reservation = app()->make(Reservation::class);
        $reservation->film_show_id = $filmShowId;

        return view('reservation.create', [
            'reservation' => $reservation,
            'cinemaHall' => json_decode($reservation->filmShow->cinema_hall),
        ]);
    }

    public function store(ReservationRequest $request, FilmShow $filmShow): View
    {
        dd($request->all(), $filmShow);

        //ZAPISANIE JUŻ W SERWISIE NA MODELU $this->model (Reservation), A TUTAJ SPRAWDZENIE CZY SIĘ UDAŁO
    }
}
