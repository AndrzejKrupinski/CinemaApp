<?php declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class ReservationController extends Controller
{
    public function index(): View
    {
        return view('reservation.reservation');
    }

    public function create()
    {
        
    }

    public function store()
    {
        
    }
}
