<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Movie extends Model
{
    /** @var string */
    protected $table = 'movies';

    /** @var array */
    protected $fillable = [
        'title',
        'description',
        'year',
        'country',
        'genre',
        'director',
        'rating',
        'duration',
        'photo',
    ];

    public function filmShows(): HasMany
    {
        return $this->hasMany(FilmShow::class, 'movie_id', 'id');
    }
}
