<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post_visit extends Model
{
    use HasFactory;
    protected $fillable=['id','post_id','post_type'];
    public $timestamps=true;
}
