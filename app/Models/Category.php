<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	protected $fillable = [
        'category' 
    ];

    public function post()
    {
    	return $this->hasMany('App\Models\Post');
    }
}
