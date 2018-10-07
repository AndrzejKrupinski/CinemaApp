@extends('admin.layouts.app')

@section('content')
    <div class="cinema-container">
        <div class="container-title">
            <h2>List of all cinemas</h2>
        </div>
        <div class="container-panel">
            @foreach ($cinemas as $cinema)
                <div id="cinema-{{ $cinema->id }}">
                    <h3 id="{{ $cinema->id }}-name" style="font-family: bold;">
                        {{ $cinema->name }}
                    </h3>
                    <p><a href="{{ route(cinema.create), ['cinemaId' => $cinema->id] }}"></a></p>
                    <p id="{{ $cinema->id }}-address">
                        Address:<br>{{ $cinema->street }} {{ $cinema->street_no }}<br>
                        {{ $cinema->zipcode }} {{ $cinema->city }}, {{ $cinema->country }}
                    </p>
                    <p id="{{ $cinema->id }}-year">
                        Year opened: {{ $cinema->created_at->year }}
                    </p>
                    <p id="{{ $cinema->id }}-website">
                        <a href={{ $cinema->website }}>Website</a>
                    </p>
                    <p id="{{ $cinema->id }}-email">
                        <a href="mailto:{{ $cinema->email }}">Email</a>
                    </p>
                </div>
            @endforeach
        </div>
    </div>
@endsection
