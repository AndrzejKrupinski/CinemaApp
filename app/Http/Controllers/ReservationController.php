<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ReservationController extends Controller
{
    public function index(): View
    {
        return view('reservation.reservation');
    }

    public function create(int $filmShowId): VIew
    {
        $reservation = app()->make(Reservation::class);
        $reservation->film_show_id = $filmShowId;

        return view('reservation.create', [
            'reservation' => $reservation,
        ]);
    }

    public function store(Request $request): bool
    {
        dd($request->all());
        //WALIDACJA
    }
}
