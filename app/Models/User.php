<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    public function __construct()
    {
        $this->table = 'users';
        $this->timestamps = true;
        $this->incrementing = true;
        $this->fillable = ['name', 'email', 'password', 'is_admin',];
        $this->hidden = ['password', 'remember_token',];
        parent::__construct();
    }

    public function isAdmin(): bool
    {
        return !!$this->is_admin;
    }
}
