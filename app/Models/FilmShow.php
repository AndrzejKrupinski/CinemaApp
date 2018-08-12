<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class FilmShow extends Model
{
    /** @var string */
    protected $table = 'film_shows';

    /** @var array */
    protected $fillable = ['movie_id', 'time', 'cinema_hall_reservations'];

    public function movie(): BelongsTo
    {
        return $this->belongsTo(Movie::class, 'movie_id', 'id');
    }

    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class, 'film_show_id', 'id');
    }

    public function cinemaHalls(): BelongsToMany
    {
        return $this->belongsToMany(
            CinemaHall::class,
            'filmshows_cinema_halls',
            'filmshow_id',
            'cinema_hall_id'
        );
    }
}
