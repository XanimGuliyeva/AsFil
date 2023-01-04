<?php

namespace App\Address;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'address';
    protected $fillable =['user_id' , 'address' , 'city' , 'country' ,'post_code' ,'reciever'];
}
