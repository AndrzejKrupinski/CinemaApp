<div id="movie-{{ $movie->id }}">
    <div class="photo">
        <p>
            Place for an image.
        </p>
    </div>
    <h3 id="{{ $movie->id }}-title" style="font-family: bold;">
        {{ $movie->title }}</h3>
    <p id="{{ $movie->id }}-desc">Description: {{ $movie->description }}</p>
    <p id="{{ $movie->id }}-year">Year: {{ $movie->year }}</p>
    <p id="{{ $movie->id }}-country">Produced in: {{ $movie->country }}</p>
    <p id="{{ $movie->id }}-genre">Genre: {{ $movie->genre }}</p>
    <p id="{{ $movie->id }}-director">Directed by: {{ $movie->director }}</p>
    <p id="{{ $movie->id }}-rating">Rating: {{ $movie->rating }}/10</p>
    <p id="{{ $movie->id }}-duration">Duration: {{ $movie->duration }} minutes</p>

    <div class="shows-table" id="{{ $movie->id }}-table">
        <div class="row">
            <table style="width:50%">
                <tr>
                    <th class="Monday col-md-2">Monday<br>{{ $currentWeek['monday'] }}</th>
                    <th class="Tuesday col-md-1">Tuesday<br>{{ $currentWeek['tuesday'] }}</th>
                    <th class="Wednesday col-md-1">Wednesday<br>{{ $currentWeek['wednesday'] }}</th>
                    <th class="Thursday col-md-1">Thursday<br>{{ $currentWeek['thursday'] }}</th>
                    <th class="Friday col-md-1">Friday<br>{{ $currentWeek['friday'] }}</th>
                    <th class="Saturday col-md-1">Saturday<br>{{ $currentWeek['saturday'] }}</th>
                    <th class="Sunday col-md-1">Sunday<br>{{ $currentWeek['sunday'] }}</th>
                </tr>
                <tr>
                    <td>
                        <ul>
                            @if (isset($filmShows['monday']))
                                @foreach ($filmShows['monday'] as $filmShow)
                                    @include('reservation.filmshow', ['filmShow' => $filmShow])
                                @endforeach
                            @endif
                        </ul>
                    </td>
                    <td>
                        <ul>
                            @if (isset($filmShows['tuesday']))
                                @foreach ($filmShows['tuesday'] as $filmShow)
                                    @include('reservation.filmshow', ['filmShow' => $filmShow])
                                @endforeach
                            @endif
                        </ul>
                    </td>
                    <td>
                        <ul>
                            @if (isset($filmShows['wednesday']))
                                @foreach ($filmShows['wednesday'] as $filmShow)
                                    @include('reservation.filmshow', ['filmShow' => $filmShow])
                                @endforeach
                            @endif
                        </ul>
                    </td>
                    <td>
                        <ul>
                            @if (isset($filmShows['thursday']))
                                @foreach ($filmShows['thursday'] as $filmShow)
                                    @include('reservation.filmshow', ['filmShow' => $filmShow])
                                @endforeach
                            @endif
                        </ul>
                    </td>
                    <td>
                        <ul>
                            @if (isset($filmShows['friday']))
                                @foreach ($filmShows['friday'] as $filmShow)
                                    @include('reservation.filmshow', ['filmShow' => $filmShow])
                                @endforeach
                            @endif
                        </ul>
                    </td>
                    <td>
                        <ul>
                            @if (isset($filmShows['saturday']))
                                @foreach ($filmShows['saturday'] as $filmShow)
                                    @include('reservation.filmshow', ['filmShow' => $filmShow])
                                @endforeach
                            @endif
                        </ul>
                    </td>
                    <td>
                        <ul>
                            @if (isset($filmShows['sunday']))
                                @foreach ($filmShows['sunday'] as $filmShow)
                                    @include('reservation.filmshow', ['filmShow' => $filmShow])
                                @endforeach
                            @endif
                        </ul>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
