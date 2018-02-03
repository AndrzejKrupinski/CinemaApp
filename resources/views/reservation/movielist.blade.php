@extends('layout')

@section('content')
<div class="movie-container">
    <div class="container-title">
        <h2>Please select the movie you'd like to watch!</h2>
        <h3>
            WYBÓR SIEDZENIA!
            Zrobić listę filmów z podziałem na dni i według godzin jeszcze przed widokiem!
            Przerzucić logikę z kontrolerów do serwisów!
            WYJĄTKI!
            Poza tym rezerwowanie i email!
            Dokumentacja!
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
