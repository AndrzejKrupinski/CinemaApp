@extends('admin.layouts.app')

@section('content')
    <!--DO OSOBNEGO BLADE'A-->
    <nav id="sidebar">
        <div class="sidebar-header">
            <ul class="list-unstyled components">
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse"
                        aria-example="false" class="dropdown-toggle">
                        <i class="fas fa-home"></i>Home
                    </a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li><a href="#">Cinemas</a>
                        <li><a href="#">CinemaHalls</a>
                        <li><a href="#">FilmShows</a>
                        <li><a href="#">Movies</a>
                        <li><a href="#">Reservations</a>
                        <li><a href="#">Users</a>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <button type="button" id="sidebarCollapse" class="btn btn-info">
                    <i class="fas fa-align-left"></i>
                    <span>Toggle Sidebar</span>
                </button>
            </div>
        </nav>
    </div>
@endsection
