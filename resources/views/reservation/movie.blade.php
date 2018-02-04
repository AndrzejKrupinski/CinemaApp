<div id="movie-{{ $movie->id }}">
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
                            @foreach ($filmShows[$movie->id] as $filmShow)
                                @if ($filmShow['time'] < $currentWeek['tuesday'])
                                    <li>
                                        <a href="{{ route('reservation.create', [
                                            'filmShowId' => $filmShow['id'],
                                        ]) }}">
                                            {{ substr($filmShow['time'], 11, 5) }}
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <ul>
                            @foreach ($filmShows[$movie->id] as $filmShow)
                                @if ($filmShow['time'] > $currentWeek['tuesday'] && $filmShow['time'] < $currentWeek['wednesday'])
                                    @include('reservation.filmshow', [
                                        'filmShow' => $filmShow
                                    ])
                                @endif
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <ul>
                            @foreach ($filmShows[$movie->id] as $filmShow)
                                @if ($filmShow['time'] > $currentWeek['wednesday'] && $filmShow['time'] < $currentWeek['thursday'])
                                    @include('reservation.filmshow', [
                                        'filmShow' => $filmShow
                                    ])
                                @endif
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <ul>
                            @foreach ($filmShows[$movie->id] as $filmShow)
                                @if ($filmShow['time'] > $currentWeek['thursday'] && $filmShow['time'] < $currentWeek['friday'])
                                    @include('reservation.filmshow', [
                                        'filmShow' => $filmShow
                                    ])
                                @endif
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <ul>
                            @foreach ($filmShows[$movie->id] as $filmShow)
                                @if ($filmShow['time'] > $currentWeek['friday'] && $filmShow['time'] < $currentWeek['saturday'])
                                    @include('reservation.filmshow', [
                                        'filmShow' => $filmShow
                                    ])
                                @endif
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <ul>
                            @foreach ($filmShows[$movie->id] as $filmShow)
                                @if ($filmShow['time'] > $currentWeek['saturday'] && $filmShow['time'] < $currentWeek['sunday'])
                                    @include('reservation.filmshow', [
                                        'filmShow' => $filmShow
                                    ])
                                @endif
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <ul>
                            @foreach ($filmShows[$movie->id] as $filmShow)
                                @if ($filmShow['time'] > $currentWeek['sunday'])
                                    @include('reservation.filmshow', [
                                        'filmShow' => $filmShow
                                    ])
                                @endif
                            @endforeach
                        </ul>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
