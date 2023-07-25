<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bucket extends Model
{
    
    
    protected $fillable = [
        'name',
        'volume',
    ];
    use HasFactory;
    
    public function balls()
	{
		return $this->hasMany(FillBallIntoBucket::class, 'bucket_id','id');
	}
    public function ball()
	{
		return $this->hasOne(ball::class, 'id','ball_id');
	}

    
}
