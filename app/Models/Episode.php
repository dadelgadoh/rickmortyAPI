<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;
    protected $casts = [
        'characters' => 'array'
    ];
    protected $fillable = [
        'name','air_date','episode','characters','url'
    ];
   
}
