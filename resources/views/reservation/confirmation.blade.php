@extends('layout')

@section('content')
    <div>
        <p>Thanks for making a reservation at our cinema!</p>
        <p>
            Here are the details:<br>
            Reservation ID: {{ $reservation->id }}<br>
            Ticket: {{ $ticketsAmount }}x {{ $reservation->filmShow->movie->title }}, {{ $weekDay }} {{ $reservation->filmShow->time }}<br>
            Name: {{ $reservation->name }}<br>
            E-mail: {{ $reservation->email }}<br>
        </p>
    </div>
@endsection