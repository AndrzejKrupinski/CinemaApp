<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservation extends Model
{
    public function __construct()
    {
        $this->table = 'reservations';
        $this->timestamps = true;
        $this->incrementing = true;
        $this->fillable = ['film_show_id', 'code', 'seats', 'name', 'email',];
        parent::__construct();
    }

    /** @var array */
    protected $fillable = ['film_show_id', 'code', 'seats', 'name', 'email',];

    public function filmShow(): BelongsTo
    {
        return $this->belongsTo(FilmShow::class, 'film_show_id', 'id');
    }
}
