@extends('layout')

@section('content')
<div class="movie-container">
    <div class="container-title">
        <h2>Please select the movie you'd like to watch!</h2>
        <h3>
            Zrobić listę filmów z podziałem na dni i według godzin jeszcze przed widokiem!
            Przerzucić logikę z kontrolerów do serwisów!
            W serwisach już nie requesty!
            FILMSZOŁY DLA NOWYCH TYGODNI W BAZIE!
            WYJĄTKI!
            Dokumentacja!
            MOŻE JESZCZE UNIKALNE MAILE W REZERWACJACH DLA DANEGO FILMSZOŁA!
        </h3>
    </div>

    <div class="container-panel">
        @foreach ($movies as $movie)
            @include('reservation.movie', [
                'movie' => $movie,
                'currentWeek' => $currentWeek,
                'filmShows' => $filmShows,
            ])
        @endforeach
    </div>
</div>
@endsection
