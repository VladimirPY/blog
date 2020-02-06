<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function authors(){
        return $this->belongsTo(Author::class);
    }
}
