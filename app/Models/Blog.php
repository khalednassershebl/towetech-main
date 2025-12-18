<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_ar',
        'title_en',
        'category_ar',
        'category_en',
        'image',
        'published_at',
        'link',
        'order',
        'is_active',
    ];

    protected $casts = [
        'published_at' => 'date',
        'order' => 'integer',
        'is_active' => 'boolean',
    ];
}

