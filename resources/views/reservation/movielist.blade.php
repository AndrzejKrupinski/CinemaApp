@extends('layout')

@section('content')
    <div class="movie-container">
        <div class="container-title">
            <h2>Please select the movie you'd like to watch!</h2>
        </div>

        <div class="container-panel">
            @foreach ($movies as $movie)
                @include('reservation.movie', [
                    'movie' => $movie,
                    'currentWeek' => $currentWeek,
                    'filmShows' => $filmShowsPerWeekdays[$movie->id],
                ])
            @endforeach
        </div>
    </div>
@endsection
