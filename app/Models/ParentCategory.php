<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sub_category;


class ParentCategory extends Model
{
    use HasFactory;

    public function sub_category(){
        return $this->hasMany(Sub_category::class);
    }
}
