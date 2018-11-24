<?php

namespace App\Services\Admin;

use App\Models\Reservation;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class ReservationService
{
    /** @var Reservation */
    private $model;

    public function __construct(Reservation $reservation)
    {
        $this->model = $reservation;
    }

    public function store(Request $request)
    {
        $this->model->fill($request->all());

        return $this->model->save();
    }

    public function update(Request $request)
    {
        $cinema = $this->model->find($request->get('id'));

        return $cinema->update($request->all());
    }

    public function destroy(int $id)
    {
        return $this->model->destroy($id);
    }
}
