<?php

namespace App\Order_products;

use Illuminate\Database\Eloquent\Model;

class Order_products extends Model
{
    protected $table = 'order_products';
    protected $fillable = ['user_id','product_id','quantity' , 'price'];
}
