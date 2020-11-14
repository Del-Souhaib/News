<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public $fillable = ['user_id', 'post_id', 'comment', 'created_at'];
    public $timestamps = true;

    public function Post()
    {
        return $this->belongsTo('App\Models\Post');
    }
    public function User()
    {
        return $this->belongsTo('App\Models\User');
    }
}
