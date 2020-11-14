<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable=['Title','Text','Pictures','Type'];
    public $timestamps=true;

    public function comments(){
        return $this->hasMany('App\Models\Comment') ;
    }

}
