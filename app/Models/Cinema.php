<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cinema extends Model
{
    /**
     * const representing one row of seats in cinema hall
     */
    const CINEMA_ROW = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0,];

    /**
     * const for seat reservation in cinema hall
     */
    const CINEMA_HALL = [
        self::CINEMA_ROW,
        self::CINEMA_ROW,
        self::CINEMA_ROW,
        self::CINEMA_ROW,
        self::CINEMA_ROW,
    ];
}