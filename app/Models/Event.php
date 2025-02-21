<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'adresse',
        'date_time',
        'category',
        'max_participation',
        'image_path',
        'user_id'
    ];
}
