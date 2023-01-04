<?php

namespace App\Adverts;

use Illuminate\Database\Eloquent\Model;

class Adverts extends Model
{
    protected $table = 'adverts';
    protected $fillable =['image','content'];
}
