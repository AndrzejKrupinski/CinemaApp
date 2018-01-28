@extends('layout')

@section('content')
<div class="movie-container">
    <div class="container-title">
        <h2>Please select the movie you'd like to see!</h2>
    </div>

    <div class="container-panel">
        @foreach ($movies as $movie)
            @include('reservation.movie', ['movie' => $movie])
        @endforeach
    </div>
</div>
@endsection
