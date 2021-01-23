<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $table = 'vendors';
    protected $fillable = ['name','phone','email','password','created_at','updated_at'];
    protected $hidden = ['created_at','updated_at','pivot'];


        // $product->vendors  --> i want vendors that belongs to this product
    public function products(){
        return $this->belongsToMany('App\Models\Product','vendors_products',
                    'vendor_id','product_id','id','id');
    }

    public function phones(){
        return $this->hasOne('App\Models\Phone','vendor_id');
    }
}
