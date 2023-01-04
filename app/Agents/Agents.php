<?php

namespace App\Agents;

use Illuminate\Database\Eloquent\Model;

class Agents extends Model
{
    protected $table = 'agents';
    protected $fillable = ['user_id','category','name','address','voen','leader','leader_ns','bank','h_account','m_account'];
}
