<?php

namespace App\Aboutus;

use Illuminate\Database\Eloquent\Model;

class Aboutus extends Model
{
    protected $table = 'about';
    protected $fillable =['content'];
}
