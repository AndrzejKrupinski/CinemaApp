<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FilmShow extends Model
{
    /** @var string */
    protected $table = 'film_shows';

    /** @var array */
    protected $fillable = ['movie_id', 'time', 'cinema_hall'];

    public function movie(): BelongsTo
    {
        return $this->belongsTo('App\Models\Movie', 'movie_id', 'id');
    }

    public function reservations(): HasMany
    {
        return $this->hasMany('App\Models\Reservation', 'film_show_id', 'id');
    }
}