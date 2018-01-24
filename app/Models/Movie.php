<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class Movie extends Model
{
    /** @var array */
    protected $fillable = ['name', 'description', 'year', 'rating', 'duration',];

    public function filmShows(): Collection
    {
        return $this->hasMany('App\Models\FilmShow', 'movie_id', 'id');
    }
}