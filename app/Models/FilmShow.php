<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FilmShow extends Model
{
    /** @var string */
    protected $table = 'film_shows';

    /** @var array */
    protected $fillable = ['movie_id', 'time',];

    public function movie(): Movie
    {
        return $this->belongsTo('App\Models\Movie', 'id', 'movie_id');
    }

    public function reservations(): HasMany
    {
        return $this->hasMany('App\Models\Reservation', 'film_show_id', 'id');
    }
}