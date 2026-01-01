<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = [
        'background',
        'title_ar',
        'title_en',
        'description_ar',
        'description_en',
        'link',
    ];

    /**
     * Get the background image URL
     */
    public function getBackgroundUrlAttribute()
    {
        if (!$this->background) {
            return null;
        }

        // If it's already a full URL, return it
        if (filter_var($this->background, FILTER_VALIDATE_URL)) {
            return $this->background;
        }

        // Check if file exists in storage
        if (Storage::disk('public')->exists($this->background)) {
            return asset('storage/' . ltrim($this->background, '/'));
        }

        return null;
    }
}
