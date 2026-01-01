<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_ar',
        'name_en',
        'logo',
    ];

    /**
     * Get the logo URL
     */
    public function getLogoUrlAttribute()
    {
        if (!$this->logo) {
            return null;
        }

        if (filter_var($this->logo, FILTER_VALIDATE_URL)) {
            return $this->logo;
        }

        if (\Illuminate\Support\Facades\Storage::disk('public')->exists($this->logo)) {
            return asset('storage/' . ltrim($this->logo, '/'));
        }

        return null;
    }
}
