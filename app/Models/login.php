<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class login extends Model
{
    //
    use HasFactory , SoftDeletes;
      protected $table = "login";
    public $timestamps = false;

    public function user(){
        return $this->belongsTo(User::class);
    }



}
