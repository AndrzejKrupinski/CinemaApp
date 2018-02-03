@extends('layout')

@section('content')
    <div>
        <form method="POST" action="{{ route('reservation.store', [
            'filmShow' => $reservation->filmShow,
        ]) }}">
            <p>{{ $reservation->filmShow->movie->name }}</p> <!--TITLE-->
            <p>{{ $reservation->filmShow->time }}</p>

            <div>
                <label for="name">Name</label>
                <input id="name"type="text" name="name"/>
            </div>
            <div>
                <label for="email">E-mail</label>
                <input id="email" type="text" name="email"/>
            </div>
            <div>
                <button type="button">Back - JS??!!!</button><br>
                <button type="submit">Submit!</button>
            </div>
        </form>
    </div>
@endsection