<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Movie extends Model
{
    public function __construct()
    {
        $this->table = 'movies';
        $this->timestamps = true;
        $this->incrementing = true;
        $this->fillable = [
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
        parent::__construct();
    }

    public function filmShows(): HasMany
    {
        return $this->hasMany(FilmShow::class, 'movie_id', 'id');
    }
}
