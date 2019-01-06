@extends('admin.layouts.app')

@section('content')
    <div class="container py-5">
        <div class="container-title text-center">
            <h2>List of all cinema halls</h2>
        </div>
        <div class="container-panel">
            @if ($cinemaHalls && !$cinemaHalls->isEmpty())
                @foreach ($cinemaHalls as $cinemaHall)
                    <div id="cinema-hall-{{ $cinemaHall->id }}" class="card" style="background-color: #87afd1;">
                        <a href="{{ route('cinema-hall.edit', ['cinemaHallId' => $cinemaHall->id]) }}" class="card-title">
                            <p id="{{ $cinemaHall->id }}-name" style="font-family: bold;">
                                {{ $cinemaHall->name }}
                            </p>
                        </a>
                        <form method="POST" action="{{ route('cinema-hall.destroy', ['cinemaHallId' => $cinemaHall->id]) }}">
                            @csrf
                            @method('DELETE')
                            <div>
                                <input type="submit" class="btn btn-danger" value="Delete">
                            </div>
                        </form>
                    </div>
                @endforeach
            @else
                <p>No cinema halls created yet!</p>
            @endif
        </div>
    </div>
    <footer class="position-fixed" style="width: 100%; bottom: 0; z-index: 7">
        <input type="button" class="btn btn-secondary" value="Back" onclick="window.history.back()"/>
        <a href="{{ route('cinema-hall.create') }}" class="btn btn-success">
            Create new
        </a>
        <a href="#" class="btn btn-success">
            Refresh list
        </a>
    </footer>
@endsection
