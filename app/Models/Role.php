<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
           'name',
           'guard_name',
    ];

      public function permissions() {
		return $this->belongsToMany(Permission::class,'role_has_permissions')->withPivot('permission_id');
	}  

//    public function users(){
//        return $this->belongsToMany(User::class,'model_has_roles')->withPivot('model_id');
//    }
}
