<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    protected $fillable = [
        'name',
        'email',
        'password',
        'first_name',  // Add these to the fillable array
        'last_name',
    ];

    // Accessor for full name
    public function getFullNameAttribute(): string
    {
        $firstName = $this->first_name ?? '';
        $lastName = $this->last_name ?? '';
        return ucfirst($firstName) . ' ' . ucfirst($lastName);
    }

    // Mutators for first_name and last_name
    public function setFirstNameAttribute($value): void
    {
        $this->attributes['first_name'] = ucfirst(strtolower($value));
    }

    public function setLastNameAttribute($value): void
    {
        $this->attributes['last_name'] = ucfirst(strtolower($value));
    }
}
