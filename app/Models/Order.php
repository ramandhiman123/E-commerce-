<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;


    public function orderItem()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function product()
    {
        return $this->belongsToMany(Product::class, 'order_items')->withPivot('product_id');
    }

    public function address()
    {
        return $this->belongsTo(UserAddress::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
