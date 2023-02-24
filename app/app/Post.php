<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title','user_id','client','start_date','end_date','content','factor','image',
    ];
    public function product(){
        return $this->belongsToMany('App\Product','post_product');
    }

    
}
