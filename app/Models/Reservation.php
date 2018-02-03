<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservation extends Model
{
    /** @var array */
    protected $fillable = ['film_show_id', 'seats', 'name', 'email',];

    public function filmShow(): BelongsTo
    {
        return $this->belongsTo('App\Models\FilmShow', 'film_show_id', 'id');
    }
}