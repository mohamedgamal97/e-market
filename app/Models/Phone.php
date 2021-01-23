<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $table = 'phones';
    protected $filable = ['code','phone','vendor_id'];



    public function vendors(){
        return $this->belongsTo('App\Models\Vendor','vendor_id');
    }
}
