<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cinema extends Model
{
    public function __construct()
    {
        $this->table = 'cinemas';
        $this->timestamps = true;
        $this->incrementing = true;
        $this->fillable = [
            'name',
            'website',
            'email',
            'street',
            'street_no',
            'zipcode',
            'city',
            'country',
        ];
        parent::__construct();
    }

    public function cinemaHalls(): HasMany
    {
        return $this->hasMany(CinemaHall::class, 'cinema_hall_id');
    }
}
