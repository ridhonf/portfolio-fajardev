<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'location',
        'bio',
        'education',
        'experience',
        'skills',
        'tools',
        'title',
        'birth_date',
        'profile_photo',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'birth_date' => 'date',
            'skills' => 'array',
            'tools' => 'array',
        ];
    }

    public function getEducationArrayAttribute()
    {
        return $this->education ? array_map('trim', explode("\n", $this->education)) : [];
    }

    public function getExperienceArrayAttribute()
    {
        return $this->experience ? array_map('trim', explode("\n", $this->experience)) : [];
    }
}