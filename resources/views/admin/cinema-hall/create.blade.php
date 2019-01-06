@extends('admin.layouts.app')

@section('content')
    <div class="container py-5">
        <form action="{{ $cinemaHall->id ? route('cinema-hall.update') : route('cinema-hall.store') }}" method='POST'>
            @csrf
            @if ($cinemaHall->id)
                @method('PUT')
            @endif
            <input type='text' name='id' value="{{ $cinemaHall->id ?: null }}" hidden/>
            <div class="container-title text-center">
                <h2>{{ $cinemaHall->id ? "$cinemaHall->name - Edit" : 'New cinema - Create' }}</h2>
            </div><hr>
            <div class="form-group row">
                <div class="form-group col-md-8">
                    <label for="name" class="col-md-3">Name</label>
                    <input id="name" class="col-md-8" type="text" name="name" value="{{ $cinemaHall->name ?: null }}"/><br>
                    {{-- <label for="cinema" class="col-md-3">Cinema</label> --}}
                    {{-- <input id="cinema" class="col-md-8" type="text" name="cinema" value="{{ ($cinemaHall->cinema()->first() && $cinemaHall->cinema()->first()->name) ?: null }}"/><br> --}}
                    <label for="cinema" class="col-md-3">Cinema</label>
                    <select id="cinema" class="col-md-8" name="cinema">
                        @foreach ($cinemas as $cinema)
                            <option value="{{ $cinema->id }}">{{ $cinema->name }}</option>
                        @endforeach
                    </select>
                    <label for="email" class="col-md-3">Description</label>
                    <input id="email" class="col-md-8" type="email" name="description" value="{{ $cinemaHall->description ?: null }}"/><br>
                </div>
            </div>
            <footer class="position-fixed" style="width: 100%; bottom: 0; z-index: 7;">
                <input type="submit" class="btn btn-success" value="Save"/>
            </footer>
        </form>
    </div>
@endsection
