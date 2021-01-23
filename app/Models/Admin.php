<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admins';
    protected $fillable = ['email','username','password','role'];
    protected $hidden = ['created_at','updated_at'];

    //accessors
    public function getRoleAttribute($value){
        return $value  == 1 ? 'Super Admin' : 'Admin';
    }
}
