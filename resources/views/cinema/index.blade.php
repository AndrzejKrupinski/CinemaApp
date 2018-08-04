@extends('layout')

@section('content')
    <div class="cinema-container">
        <div class="container-title">
            <h2>Select the cinema you want to go to!</h2>
        </div>

        <div class="container-panel">
            @foreach ($cinemas as $cinema)
                <div id="cinema-{{ $cinema->id }}">
                    <div class="photo">
                        <p>
                            Place for an image.
                        </p>
                    </div>
                    <h3 id="{{ $cinema->id }}-name" style="font-family: bold;">
                        <a href={{ route('') }}>{{ $cinema->name }}</a>
                    </h3>
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
