<li>
    <a href="{{ route('reservation.create', [
        'filmShowId' => $filmShow['id'],
    ]) }}">
        {{ substr($filmShow['time'], 11, 5) }}
    </a>
</li>