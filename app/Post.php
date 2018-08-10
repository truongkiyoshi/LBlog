<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $table = 'posts';
    protected $fillable = ['title', 'content', 'date_post','user_id'];
    protected $guarded =[];

    public function user()
    {
    	return $this->belongsTo('App\User','id');
    }
}
