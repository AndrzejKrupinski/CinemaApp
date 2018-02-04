<p>
    Hi {{ $reservation->name }}, you've just made a reservation!
</p>
<p>
    Here are the details:<br>
    Reservation ID: {{ $reservation->id }}<br>
    Ticket: {{ $ticketsAmount }}x {{ $reservation->filmShow->movie->title }}, {{ $weekDay }} {{ $reservation->filmShow->time }}<br>
    Name: {{ $reservation->name }}<br>
    E-mail: {{ $reservation->email }}<br>
</p>
<p>
    Have a nice show!<br>
    CinemaApp Team ;)
</p>
