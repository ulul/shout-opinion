<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Post extends Model
{

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	protected $fillable = [
        'user_id', 'title', 'body', 'slug', 'thumbnail', 
    ];

    public function user()
    {
    	return $this->belongsTo('App\Models\User');
    }
}
