<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category_visit extends Model
{
    use HasFactory;

    protected $fillable=['id','category'];
    public $timestamps=true;
}
