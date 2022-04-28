<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use HasFactory;
    protected $casts = [
        'origin' => 'array',
        'location' => 'array',
        'episode' => 'array'
    ];
    protected $fillable = [
        'name','status','species','type','gender','origin','location','image','episode','url'
    ];
}

