<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['name','price','details','photo','category_id','created_at','updated_at'];
    protected $hidden = ['created_at','updated_at','pivot']; // pivot is the  3ed table with vendor

    public function categories(){
                       //category_id in products table refer to category id
        return $this->belongsTo('App\Models\Category','category_id','id');
    }

    // $vendor->products    --> i want products that belongs to this vendor
    public function vendors(){
        return $this->belongsToMany('App\Models\Vendor','vendors_products',
                    'vendor_id','product_id','id','id');
    }
}
