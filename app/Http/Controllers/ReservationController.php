<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\FilmShow;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReservationConfirmation;
use App\Http\Requests\ReservationRequest;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    public function index(): View
    {
        return view('reservation.reservation');
    }

    public function create(int $filmShowId): View
    {
        $reservation = app()->make(Reservation::class); //czy to w ogóle potrzebne?
        $reservation->film_show_id = $filmShowId;

        return view('reservation.create', [
            'reservation' => $reservation,
            'cinemaHall' => json_decode($reservation->filmShow->cinema_hall),
        ]);
    }

    public function store(ReservationRequest $request): View
    {
        $inputs = $request->all();
        $reservation = new Reservation([
            'film_show_id' => $inputs['filmShow'],
            'code' => encrypt([
                $inputs['filmShow'],
                $inputs['seats'],
                $inputs['name'],
                $inputs['email']
            ]),
            'seats' => json_encode($inputs['seats']),
            'name' => $inputs['name'],
            'email' => $inputs['email'],
        ]);

        $filmShowController = resolve(FilmShowController::class);
        $filmShowController->setModel(FilmShow::find($inputs['filmShow']));
        $filmShowController->reserveSeats($inputs['seats']);
        $filmShow = $filmShowController->getModel();

        //dd($reservation, $filmShow);

        try {
            //dd($reservation, $filmShow);
            DB::transaction(function () use ($reservation, $filmShow) {
                $reservation->save();
                $filmShow->save();
            });
        } catch (Exception $e) {
            return $e->getMessage();
        }

        Mail::to($reservation->email)->send(new ReservationConfirmation($reservation));

        return view('reservation.confirmation', [
            'reservation' => $reservation,
        ]);
    }

    private function createCode(): string
    {
        
    }

    private function getSeatNumbers()
    {
        
    }
}
