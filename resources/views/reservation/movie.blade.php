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
        <!--TO TEŻ WRZUCIĆ DO IKLUDOWANEGO VIEWA-->
        <table style="width:100%">
            <tr>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Age</th>
            </tr>
            <tr>
                <td>Jill</td>
                <td>Smith</td>
                <td>50</td>
            </tr>
            <tr>
                <td>Eve</td>
                <td>Jackson</td>
                <td>94</td>
            </tr>
        </table>
    </div>
</div>
