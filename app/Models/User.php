<?php
// The trait wasn't imported for use. If you are 
// using PhpStorm, like me, click on HasRoles, then 
// hold alt key and tap enter , choose import hit enter 
// key and the trait will be imported. You can use 
// these shortcuts to do other imports, for instance, importing models.2 Oct 
namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;    
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    
    // public function product(){
    //     return $this->belongsToMany(Product::Class,'carts','product_id','user_id');
    // }
    public function products(){
        return $this->belongsToMany(Product::class,'carts')->withPivot('product_id');
     }

     public function orders(){
        return $this->belongsToMany(Order::class,'orders')->withPivot('user_id ');
    }


}
