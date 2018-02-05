<?php

namespace App\Services;

use App\Models\Reservation;
use App\Models\FilmShow;
use App\Services\FilmShowService;
use App\Mail\ReservationConfirmation;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Support\Carbon;

class ReservationService
{
    /** @var Reservation */
    private $model;

    const WEEKDAYS = [
        0 => 'Sunday',
        1 => 'Monday',
        2 => 'Tuesday',
        3 => 'Wednesday',
        4 => 'Thursday',
        5 => 'Friday',
        6 => 'Saturday',
    ];

    public function __construct(Reservation $reservation)
    {
        $this->model = $reservation;
    }

    public function store(array $inputs): View
    {
        $reservation = $this->getReservation($inputs);
        $filmShow = $this->getFilmShow($inputs);
        $ticketsAmount = $this->getTicketsAmount($reservation->seats);
        $weekDay = $this->getWeekDay($filmShow->time);

        try {
            DB::transaction(function () use ($reservation, $filmShow) {
                $reservation->save();
                $filmShow->save();
            });
        } catch (Exception $e) {
            return $e->getMessage();
        }

        Mail::to($reservation->email)->send(new ReservationConfirmation(
            $reservation,
            $ticketsAmount,
            $weekDay
        ));

        if (Mail::failures()) {
            //return SOMETHING BAD;
        }

        return view('reservation.confirmation', [
            'reservation' => $reservation,
            'ticketsAmount' => $ticketsAmount,
            'weekDay' => $weekDay,
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

    private function getTicketsAmount(string $seats): int
    {
        $ticketsAmount = 0;

        foreach (json_decode($seats) as $rowNumber => $row) {
            foreach ($row as $seat) {
                $ticketsAmount++;
            }
        }

        return $ticketsAmount;
    }

    private function getWeekDay(string $time): string
    {
        return self::WEEKDAYS[Carbon::parse($time)->dayOfWeek];
    }
}