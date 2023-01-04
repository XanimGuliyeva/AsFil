<?php

namespace App\News;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    protected $fillable =['header','image','content'];
}
