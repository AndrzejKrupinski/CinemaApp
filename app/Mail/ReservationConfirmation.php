<?php

namespace App\Mail;

use App\Models\Reservation;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReservationConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    /** @var Reservation */
    public $reservation;

    /** @var int */
    public $ticketsAmount;

    /** @var string */
    public $weekDay;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(
        Reservation $reservation,
        int $ticketsAmount,
        string $weekDay
    ) {
        $this->reservation = $reservation;
        $this->ticketsAmount = $ticketsAmount;
        $this->weekDay = $weekDay;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.confirmation', [
            'reservation' => $this->reservation,
            'ticketsAmount' => $this->ticketsAmount,
            'weekDay' => $this->weekDay,
        ]);
    }
}
