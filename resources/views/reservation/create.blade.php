@extends('layout')

@section('content')
    <div>
        <form method="POST" action="{{ route('reservation.store', [
            'filmShow' => $reservation->filmShow,
        ]) }}">
            {{ csrf_field() }}
            <p>{{ $reservation->filmShow->movie->title }}</p>
            <p>{{ $reservation->filmShow->movie->duration }} min</p>
            <p>{{ $reservation->filmShow->time }}</p>

            @if ($active)
                <div id="cinemaHall">
                    @foreach ($cinemaHall as $rowNumber => $row)
                        <ul name="">
                            @foreach ($row as $seatNumber => $seat)
                                <input name="seats[{{ $rowNumber }}][{{ $seatNumber }}]" type="checkbox"
                                    @if ($seat != 0) disabled @endif>
                            @endforeach
                        </ul>
                    @endforeach
                </div>
                <div>
                    <label for="name">Name</label>
                    <input id="name"type="text" name="name"/>
                </div>
                <div>
                    <label for="email">E-mail</label>
                    <input id="email" type="email" name="email"/>
                </div>
                <div>
                    <button type="submit">Submit!</button>
                </div>
            @else
                <p>
                    Sorry, this show is over!
                </p>
            @endif
        </form>
    </div>
@endsection
