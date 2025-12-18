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
}

