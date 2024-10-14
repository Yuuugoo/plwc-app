<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewFriend extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','introduction_content','friend_avatar','grade_level',
    ];

}
