<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'image', 'demo_link', 'github_link', 'technologies', 'features'];

    protected $casts = [
        'title' => 'array',
        'description' => 'array',
        'technologies' => 'array',
        'features' => 'array',
    ];

    public function getTitleAttribute($value)
    {
        $translations = is_array($value) ? $value : json_decode($value, true);
        if (!is_array($translations)) {
            return $value;
        }
        $locale = app()->getLocale();
        return $translations[$locale] ?? $translations['en'] ?? '';
    }

    public function getDescriptionAttribute($value)
    {
        $translations = is_array($value) ? $value : json_decode($value, true);
        if (!is_array($translations)) {
            return $value;
        }
        $locale = app()->getLocale();
        return $translations[$locale] ?? $translations['en'] ?? '';
    }

    public function getTechnologiesAttribute($value)
    {
        $technologies = is_array($value) ? $value : json_decode($value, true);
        if (!is_array($technologies)) {
            return [];
        }
        return $technologies;
    }

    public function getFeaturesAttribute($value)
    {
        $features = is_array($value) ? $value : json_decode($value, true);
        if (!is_array($features)) {
            return [];
        }
        return $features;
    }

    public function setTitleAttribute($value)
    {
        if (is_array($value)) {
            $this->attributes['title'] = json_encode($value);
        } else {
            $existing = $this->getRawOriginal('title');
            $translations = is_array($existing) ? $existing : json_decode($existing, true);
            if (!is_array($translations)) {
                $translations = ['en' => ''];
            }
            $translations[app()->getLocale() ?? 'en'] = $value;
            $this->attributes['title'] = json_encode($translations);
        }
    }

    public function setDescriptionAttribute($value)
    {
        if (is_array($value)) {
            $this->attributes['description'] = json_encode($value);
        } else {
            $existing = $this->getRawOriginal('description');
            $translations = is_array($existing) ? $existing : json_decode($existing, true);
            if (!is_array($translations)) {
                $translations = ['en' => ''];
            }
            $translations[app()->getLocale() ?? 'en'] = $value;
            $this->attributes['description'] = json_encode($translations);
        }
    }

    public function getTitleTranslations(): array
    {
        $value = $this->getRawOriginal('title');
        return is_array($value) ? $value : json_decode($value, true) ?? ['en' => ''];
    }

    public function getDescriptionTranslations(): array
    {
        $value = $this->getRawOriginal('description');
        return is_array($value) ? $value : json_decode($value, true) ?? ['en' => ''];
    }
}