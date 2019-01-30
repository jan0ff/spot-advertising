<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title','description','is_headline','user_id'];

    public function user(){
            return $this->belongsTo( User::class, 'user_id');
    }

    public function tags(){
        return $this->belongsToMany('App\Tag','post_tags','post_id','tag_id')->withTimestamps();
    }

}
