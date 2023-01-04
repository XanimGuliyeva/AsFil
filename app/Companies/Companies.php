<?php

namespace App\Companies;

use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    protected $table = 'companies';
    protected $fillable = ['user_id','name','address','voen','leader','leader_ns'];
}
