<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class FilmShow extends Model
{
    /** @var array */
    protected $fillable = ['movie_id', 'time',];

    public function movie(): Movie
    {
        return $this->belongsTo('App\Models\Movie', 'id', 'movie_id');
    }

    public function reservations(): Collection
    {
        return $this->hasMany('App\Models\Reservation', 'film_show_id', 'id');
    }
}