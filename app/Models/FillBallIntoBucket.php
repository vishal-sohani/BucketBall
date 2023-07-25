<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FillBallIntoBucket extends Model
{
    use HasFactory;

	protected $fillable = [
        'bucket_id',
        'ball_id',
    ];
    public function bucket()
	{
		return $this->hasOne(Bucket::class, 'id','bucket_id');
	}


	public function ball()
	{
		return $this->hasOne(Ball::class, 'id','ball_id');
	}

}
