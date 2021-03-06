<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'body'
    ];

    public function userReverse(){
        return $this->belongsTo('App\User');
    }

}
