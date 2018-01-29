<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class Movie extends Model
{
    /** @var string */
    protected $table = 'movies';

    /** @var array */
    protected $fillable = [
        'name', //ZMIENIĆ NA TITLE
        'description',
        'year',
        'country',
        'genre',
        'director',
        'rating',
        'duration',
        'photo',
    ];

    public function filmShows(): Collection
    {
        return $this->hasMany('App\Models\FilmShow', 'movie_id', 'id');
    }
}