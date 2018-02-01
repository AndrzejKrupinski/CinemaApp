<div id="movie-{{ $movie->id }}">
    <p id="{{ $movie->id }}-name" style="font-family: bold;">
        {{ $movie->name }}
        <!--CHANGE IT TO TITLE!!!!!--></p>
    <p id="{{ $movie->id }}-desc">{{ $movie->description }}</p>
    <p id="{{ $movie->id }}-year">{{ $movie->year }}</p>
    <p id="{{ $movie->id }}-country">{{ $movie->country }}</p>
    <p id="{{ $movie->id }}-genre">{{ $movie->genre }}</p>
    <p id="{{ $movie->id }}-director">{{ $movie->director }}</p>
    <p id="{{ $movie->id }}-rating">{{ $movie->rating }}</p>
    <p id="{{ $movie->id }}-duration">{{ $movie->duration }}</p>

    <div class="shows-table" id="{{ $movie->id }}-table">
        <div class="row">
        <!--TO TEŻ WRZUCIĆ DO IKLUDOWANEGO VIEWA-->
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
                                    <li>{{ $filmShow['time'] }}</li>
                                @endif
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <ul>
                            @foreach ($filmShows[$movie->id] as $filmShow)
                                @if ($filmShow['time'] > $currentWeek['tuesday'] && $filmShow['time'] < $currentWeek['wednesday'])
                                    <li>{{ $filmShow['time'] }}</li>
                                @endif
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <ul>
                            @foreach ($filmShows[$movie->id] as $filmShow)
                                @if ($filmShow['time'] > $currentWeek['wednesday'] && $filmShow['time'] < $currentWeek['thursday'])
                                    <li>{{ $filmShow['time'] }}</li>
                                @endif
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <ul>
                            @foreach ($filmShows[$movie->id] as $filmShow)
                                @if ($filmShow['time'] > $currentWeek['thursday'] && $filmShow['time'] < $currentWeek['friday'])
                                    <li>{{ $filmShow['time'] }}</li>
                                @endif
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <ul>
                            @foreach ($filmShows[$movie->id] as $filmShow)
                                @if ($filmShow['time'] > $currentWeek['friday'] && $filmShow['time'] < $currentWeek['saturday'])
                                    <li>{{ $filmShow['time'] }}</li>
                                @endif
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <ul>
                            @foreach ($filmShows[$movie->id] as $filmShow)
                                @if ($filmShow['time'] > $currentWeek['saturday'] && $filmShow['time'] < $currentWeek['sunday'])
                                    <li>{{ $filmShow['time'] }}</li>
                                @endif
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <ul>
                            @foreach ($filmShows[$movie->id] as $filmShow)
                                @if ($filmShow['time'] > $currentWeek['sunday'])
                                    <li>{{ $filmShow['time'] }}</li>
                                @endif
                            @endforeach
                        </ul>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
