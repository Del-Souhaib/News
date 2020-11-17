<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page_visit extends Model
{
    use HasFactory;

    protected $fillable=['id','page'];
    public $timestamps=true;
}
