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

            <div id="cinemaHall">
                @foreach ($cinemaHall as $row)
                    <ul name="">
                        @foreach ($row as $seat)
                            <input name="" type="checkbox">
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
                <input id="email" type="text" name="email"/>
            </div>
            <div>
                <p>SEATS</p>
            </div>
            <div>
                <button type="button">Back - JS??!!!</button><br>
                <button type="submit">Submit!</button>
            </div>
        </form>
    </div>
@endsection