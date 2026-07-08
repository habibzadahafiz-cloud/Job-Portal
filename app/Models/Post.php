<?php

namespace App\Models;
use App\Models\Comment;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    //
    protected $fillable = ['name','email','address'];
    public function Comment(){
        return $this->hasMany(Comment::class);

    }
}
