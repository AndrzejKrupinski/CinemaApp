@extends('admin.layouts.app')

@section('content')
    <div class="container py-5">
        <div class="container-title text-center">
            <h2>List of all cinemas</h2>
        </div>
        <div class="container-panel">
            @if ($cinemas && !$cinemas->isEmpty())
                @foreach ($cinemas as $cinema)
                    <div id="cinema-{{ $cinema->id }}" class="card" style="background-color: #87afd1;">
                        <a href="{{ route('cinema.edit', ['cinemaId' => $cinema->id]) }}" class="card-title" >
                            <h4 id="{{ $cinema->id }}-name" style="font-family: bold;">
                                {{ $cinema->name }}
                            </h4>
                        </a>
                        <form method="POST" action="{{ route('cinema.destroy', ['cinemaId' => $cinema->id]) }}">
                            @csrf
                            @method('DELETE')
                            <div>
                                <input type="submit" class="btn btn-danger" value="Delete">
                            </div>
                        </form>
                        <p id="{{ $cinema->id }}-address">
                            Address:<br>{{ $cinema->street }} {{ $cinema->street_no }}, {{ $cinema->zipcode }} {{ $cinema->city }}, {{ $cinema->country }}
                        </p>
                        <p id="{{ $cinema->id }}-year">
                            Year opened: {{ $cinema->created_at->year }}
                        </p>
                        <p id="{{ $cinema->id }}-website">
                            <a href="//{{ ($cinema->website) }}">Website</a>
                        </p>
                        <p id="{{ $cinema->id }}-email">
                            <a href="mailto:{{ $cinema->email }}">Email</a>
                        </p>
                    </div>
                @endforeach
            @else
                <p>No cinemas created yet!</p>
            @endif
        </div>
    </div>
    <footer class="position-fixed" style="width: 100%; bottom: 0; z-index: 7">
        <input type="button" class="btn btn-secondary" value="Back" onclick="window.history.back()"/>
        <a href="{{ route('cinema.create') }}" class="btn btn-success">
            Create new
        </a>
        <a href="#" class="btn btn-success">
            Refresh list
        </a>
    </footer>
@endsection
