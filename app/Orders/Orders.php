<?php

namespace App\Orders;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'orders';
    protected $fillable = ['user_id','name','surname','email','phone_number','address','city','country','post_code','reciever','payment'];
}
