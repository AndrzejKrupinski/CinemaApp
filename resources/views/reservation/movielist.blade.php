@extends('layout')

@section('content')
<div class="movie-container">
    <div class="container-title">
        <h2>Please select the movie you'd like to see!</h2>
        <h3>
            Tak zrobić $filmShows, żeby struktura była następująca:
            |->film
            |---->dzien
            |------->godziny
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
    {{ var_dump($filmShows) }}
</div>
@endsection
