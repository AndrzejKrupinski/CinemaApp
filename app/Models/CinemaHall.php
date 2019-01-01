<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class CinemaHall extends Model
{
    public function __construct()
    {
        $this->table = 'cinema_halls';
        $this->timestamps = true;
        $this->incrementing = true;
        $this->fillable = [
            'name',
            'cinema_id',
            'seats_plan',
            'description',
        ];
        parent::__construct();
    }

    public function cinema(): BelongsTo
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
