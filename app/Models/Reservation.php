<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    /** @var array */
    protected $fillable = ['film_show_id', 'name', 'email',];

    public function filmShow(): BelongsTo
    {
        return $this->belongsTo('App\Models\FilmShow', 'id', 'film_show_id');
    }
}