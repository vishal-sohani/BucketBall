<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ball extends Model
{
    protected $fillable = [
        'name',
        'volume',
    ];
    use HasFactory;

}
