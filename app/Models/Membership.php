<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    protected $fillable = [
        'name',
        'price',
        'duration_days',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_memberships')
            ->withPivot('start_at', 'end_at')
            ->withTimestamps();
    }
}
