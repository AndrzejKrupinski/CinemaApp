@extends('admin.layouts.app')

@section('content')
    <!--DO OSOBNEGO BLADE'A-->
    <nav id="sidebar">
        <div class="sidebar-header">
            <ul class="list-unstyled components">
                <li class="active">
                    <a href="#cinemaSubmenu" data-toggle="collapse"
                        aria-example="false" class="dropdown-toggle">
                        <i class="fas fa-industry"></i> Manage cinemas
                    </a>
                    <ul class="collapse list-unstyled" id="cinemaSubmenu">
                        <li>
                            <a href="#">
                                <i class="fas fa-place-of-worship"></i>
                                 Cinemas
                            </a>
                        <li>
                            <a href="#">
                                <i class="fas fa-tv"></i> CinemaHalls
                            </a>
                        <li>
                            <a href="#">
                                <i class="fas fa-play"></i> FilmShows
                            </a>
                        <li>
                            <a href="#">
                                <i class="far fa-calendar-alt"></i> Reservations
                            </a>
                    </ul>
                    <ul class="list-unstyled" id="movies">
                        <a href="#"><i class="fas fa-film"></i> Manage movies</a>
                    </ul>
                    <ul class="list-unstyled" id="users">
                        <a href="#"><i class="fas fa-users"></i> Manage users</a>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <button type="button" id="sidebarCollapse" class="btn btn-info">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </nav>
    </div>
@endsection
