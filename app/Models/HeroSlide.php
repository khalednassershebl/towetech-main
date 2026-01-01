<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroSlide extends Model
{
    use HasFactory;

    protected $fillable = [
        'background_image',
        'title_ar',
        'title_en',
        'subtitle_ar',
        'subtitle_en',
        'link',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    /**
     * Get the background image URL
     */
    public function getBackgroundImageUrlAttribute()
    {
        if (!$this->background_image) {
            return null;
        }

        if (filter_var($this->background_image, FILTER_VALIDATE_URL)) {
            return $this->background_image;
        }

        if (\Illuminate\Support\Facades\Storage::disk('public')->exists($this->background_image)) {
            return asset('storage/' . ltrim($this->background_image, '/'));
        }

        return null;
    }
}

