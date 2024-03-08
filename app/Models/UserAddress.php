<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    use HasFactory;

    // public function order(){
    //     return $this->hasMany(order::class);
    // }

    public function order(){
        return $this->belongsToMany(order::class,'orders')->withPivot('address_id');
    }
}
