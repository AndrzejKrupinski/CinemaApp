<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class CinemaHalls extends Model
{
    /** @var string */
    protected $table = 'cinema_halls';

    /** @var array */
    protected $fillable = [
        'name',
        'cinema_id',
        'seats_plan',
        'description',
    ];

    public function cinemaHalls(): BelongsTo
    {
        return $this->BelongsTo(Cinema::class, 'cinema_id');
    }

    public function filmShows(): BelongsToMany
    {
        return $this->BelongsToMany(
            FilmShow::class,
            'filmshows_cinema_halls',
            'cinema_hall_id',
            'filmshow_id'
        );
    }
}
