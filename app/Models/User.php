<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /** @var array */
    protected $fillable = [
        'name', 'email', 'password', 'is_admin',
    ];

    /** @var array */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin(): bool
    {
        return $this->is_admin;
    }
}
