@extends('admin.layouts.app')

@section('content')
    <div class="container py-5">
        <form action="{{ $cinema->id ? route('cinema.update') : route('cinema.store') }}" method='POST'>
            @csrf
            @method('PUT')
            <input type='text' name='id' value="{{ $cinema->id ?: null }}" hidden/>
            <div class="container-title text-center">
                <h2>{{ $cinema->id ? "$cinema->name - Edit" : 'New cinema - Create' }}</h2>
            </div><hr>
            <div class="form-group row">
                <div class="form-group col-md-6">
                    <label for="name" class="col-md-3">Name</label>
                    <input id="name" class="col-md-8" type="text" name="name" value="{{ $cinema->name ?: null }}"/><br>
                    <label for="website" class="col-md-3">Website</label>
                    <input id="website" class="col-md-8" type="text" name="website" value="{{ $cinema->website ?: null }}"/><br>
                    <label for="email" class="col-md-3">Email</label>
                    <input id="email" class="col-md-8" type="email" name="email" value="{{ $cinema->email ?: null }}"/><br>
                    <label for="street" class="col-md-3">Street</label>
                    <input id="street" class="col-md-8" type="text" name="street" value="{{ $cinema->street ?: null }}"/><br>
                </div>
                <div class="form-group col-md-6">
                    <label for="street_no" class="col-md-3">Street No</label>
                    <input id="street_no" class="col-md-8" type="text" name="street_no" value="{{ $cinema->street_no ?: null }}"/><br>
                    <label for="zipcode" class="col-md-3">Zipcode</label>
                    <input id="zipcode" class="col-md-8" type="text" name="zipcode" value="{{ $cinema->zipcode ?: null }}"/><br>
                    <label for="city" class="col-md-3">City</label>
                    <input id="city" class="col-md-8" type="text" name="city" value="{{ $cinema->city ?: null }}"/><br>
                    <label for="country" class="col-md-3">Country (sel2)</label>
                    <input id="country" class="col-md-8" type="text" name="country" value="{{ $cinema->country ?: null }}"/><br>
                </div>
            </div>
            <footer class="position-fixed" style="width: 100%; bottom: 0; z-index: 7;">
                <input type="button" class="btn btn-secondary" value="Back" onclick="window.history.back()"/>
                <a href="{{ route('cinema.destroy', ['cinemaId' => $cinema->id]) }}" class="btn btn-primary" {{ $cinema->id ? null : 'disabled' }}>
                    Manage halls
                </a>
                <a href="{{ route('cinema.destroy', ['cinemaId' => $cinema->id]) }}" class="btn btn-primary" {{ $cinema->id ? null : 'disabled' }}>
                    Manage filmshows
                </a>
                <input type="submit" class="btn btn-success" value="Save"/>
            </footer>
        </form>
    </div>
@endsection
