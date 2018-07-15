<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CinemaHalls extends Model
{
    /** @var string */
    protected $table = 'cinema_halls';

    /** @var array */
    protected $fillable = [
        'name',
        'street',
        'street_no',
        'zipcode',
        'city',
        'country',
    ];

    public function cinemaHalls(): BelongsTo
    {
        return $this->BelongsTo(Cinema::class, 'cinema_id');
    }
}
