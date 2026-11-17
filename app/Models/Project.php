<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'image', 'demo_link', 'github_link', 'technologies', 'features'];

    protected $casts = [
        'technologies' => 'array',
        'features' => 'array',
    ];
}
