<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\FilmShow;
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
        $reservation = app()->make(Reservation::class);
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

        $filmShow = FilmShow::find($inputs['filmShow']);
        $filmShow->fill(
            'cinemaHall' => METODA_ZAPISUJĄCA_WŁAŚNIE_ZAJMOWANE_MIEJSCA
        );

        dd($reservation);

        try {
            DB::transaction(function () {
//            DB::table('users')->update(['votes' => 1]);
//
//            DB::table('posts')->delete();

                //stworzyć rezerwację i zapisać
                //nadpisać cinema_hall w FilmShow

            });
        } catch (Exception $e) {
            return $e->getMessage();
        }

        //send e-mail!!!

        //ZAPISANIE JUŻ W SERWISIE NA MODELU $this->model (Reservation), A TUTAJ SPRAWDZENIE CZY SIĘ UDAŁO
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
