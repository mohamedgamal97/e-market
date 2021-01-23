<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['name','created_at','updated_at'];
    protected $hidden = ['created_at','updated_at'];

        // to connect the  model product (this) refers to category current object
    public function products (){
        return $this->hasMany('App\Models\Product');
    }
}
