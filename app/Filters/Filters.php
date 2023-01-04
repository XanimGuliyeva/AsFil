<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Model;

class Filters extends Model
{
    protected $table = 'filters';
    protected $fillable =['filter'];
}
