<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_name',
        'event_description',
        'event_images',
        'event_type',
    ];

    protected $casts = [
        'event_images' => 'array',
    ];
}   