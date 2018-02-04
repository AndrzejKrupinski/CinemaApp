<?php

namespace App\Services;

use App\Models\Reservation;
use App\Models\FilmShow;
use App\Services\FilmShowService;
use App\Mail\ReservationConfirmation;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ReservationService
{
    /** @var Reservation */
    private $model;

    public function __construct(Reservation $reservation)
    {
        $this->model = $reservation;
    }

    public function store(array $inputs): View
    {
        $reservation = $this->getReservation($inputs);
        $filmShow = $this->getFilmShow($inputs);

        try {
            DB::transaction(function () use ($reservation, $filmShow) {
                
                $reservation->save();
                $filmShow->save();
            });
        } catch (Exception $e) {
            return $e->getMessage();
        }

        Mail::to($reservation->email)->send(new ReservationConfirmation($reservation));

        if (Mail::failures()) {
            //return SOMETHING BAD;
        }

        return view('reservation.confirmation', [
            'reservation' => $reservation,
        ]);
    }

    private function getReservation(array $inputs): Reservation
    {
        return new Reservation([
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
    }

    private function getFilmShow(array $inputs): FilmShow
    {
        $filmShowService = resolve(FilmShowService::class);
        $filmShowService->setModel(FilmShow::find($inputs['filmShow']));
        $filmShowService->reserveSeats($inputs['seats']);

        return $filmShowService->getModel();
    }
}