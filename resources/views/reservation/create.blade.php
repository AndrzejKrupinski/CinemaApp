@extends('layout')

@section('content')
    <div>
        <p>Konfimejszyn</p>
        <p>{{ var_dump($reservation->filmShow) }}</p>
    </div>
@endsection