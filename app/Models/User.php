<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Mass assignable attributes
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
        'role',
        'is_member',
        'member_until',
    ];

    /**
     * Hidden attributes for serialization
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Casts
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_member' => 'boolean',
        'member_until' => 'datetime',
    ];

    /**
     * Relasi ke memberships
     */
    public function memberships()
    {
        return $this->belongsToMany(Membership::class, 'user_memberships')
                    ->withPivot('start_at', 'end_at')
                    ->withTimestamps();
    }

    /**
     * Relasi ke cart
     */
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    /**
     * Relasi ke orders
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
