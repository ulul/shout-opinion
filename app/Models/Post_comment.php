<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post_comment extends Model
{
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'comment', 'user_id', 'post_id'
    ];

    public function user()
    {
    	return $this->belongsTo('App\Models\User');
    }
}
