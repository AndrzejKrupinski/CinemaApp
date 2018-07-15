<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cinema extends Model
{
    /** @var string */
    protected $table = 'cinemas';

    /** @var array */
    protected $fillable = [
        'name',
        'website',
        'email',
        'street',
        'street_no',
        'zipcode',
        'city',
        'country',
    ];

    public function cinemaHalls(): HasMany
    {
        return $this->hasMany(CinemaHall::class, 'cinema_hall_id');
    }
}