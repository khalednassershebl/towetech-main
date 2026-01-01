<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $fillable = [
        'subtitle_ar',
        'subtitle_en',
        'title_ar',
        'title_en',
        'experience_years',
        'experience_image',
        'experience_description_ar',
        'experience_description_en',
        'content_ar',
        'content_en',
        'features_ar',
        'features_en',
        'image',
    ];

    protected $casts = [
        'features_ar' => 'array',
        'features_en' => 'array',
    ];

    /**
     * Get the experience image URL
     */
    public function getExperienceImageUrlAttribute()
    {
        if (!$this->experience_image) {
            return null;
        }

        if (filter_var($this->experience_image, FILTER_VALIDATE_URL)) {
            return $this->experience_image;
        }

        if (\Illuminate\Support\Facades\Storage::disk('public')->exists($this->experience_image)) {
            return asset('storage/' . ltrim($this->experience_image, '/'));
        }

        return null;
    }

    /**
     * Get the main image URL
     */
    public function getImageUrlAttribute()
    {
        if (!$this->image) {
            return null;
        }

        if (filter_var($this->image, FILTER_VALIDATE_URL)) {
            return $this->image;
        }

        if (\Illuminate\Support\Facades\Storage::disk('public')->exists($this->image)) {
            return asset('storage/' . ltrim($this->image, '/'));
        }

        return null;
    }
}

