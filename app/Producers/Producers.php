<?php

namespace App\Producers;

use Illuminate\Database\Eloquent\Model;

class Producers extends Model
{
    protected $table = 'producers';
    protected $fillable = ['istehsalci','sekil'];
}
