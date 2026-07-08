<?php

namespace App\Models;
use App\Models\Post;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    //
    protected $fillable = [ 'Post_id', 'Discription',];
    public function Post(){
        return $this->belongsTo(Post::class);
    }
}
