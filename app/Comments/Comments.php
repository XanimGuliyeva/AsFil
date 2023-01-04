<?php

namespace App\Comments;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $table = 'comments';
    protected $fillable =['ad' , 'email' , 'basliq' , 'movzu' ,'reytinq'];
}
