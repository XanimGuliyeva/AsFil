<?php

namespace App\Products;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';
    protected $fillable = ['ad','sekil1','sekil2','sekil3','ambar_kodu','istehsalci_kodu','haqqinda','filtr','teyinat','qiymet','istehsalci','baxis','reytinq','endirim','movcudluq','status'];
}
