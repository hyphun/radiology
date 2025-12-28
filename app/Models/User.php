<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements FilamentUser
{
    use HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'name', 'email', 'phone', 'email_verified_at', 'password',
    ];

    protected $hidden = ['password', 'remember_token'];
    protected $casts = ['email_verified_at' => 'datetime', 'password' => 'hashed'];

    public function canAccessPanel(Panel $panel): bool
    {
        return $this->hasAnyRole(['admin', 'manager', 'staff', 'super-admin']);
    }

    // Spatie HasRoles trait provides roles() automatically - NO NEED TO DEFINE
    // Just use $user->roles, $user->hasRole('admin'), $user->assignRole('manager')

    protected static function boot()
    {
        parent::boot();
        static::created(function ($user) {
            if (User::count() === 1) {
                $user->assignRole('admin');
            }
        });
    }
}
