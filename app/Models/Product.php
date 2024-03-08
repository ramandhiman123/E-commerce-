<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product-title',
        'product-price',
        'product-description',
        'stock-quantity',
        'product-brand',
        'product-image-URLs'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'carts')->withPivot('user_id');
    }

    public function carts()
    {
        return $this->belongsTo(Carts::class);
    }

    public function orderitems()
    {
        return $this->belongsTo(OrderItem::class, 'product')->withPivot('product_id');
    }

    public function Sub_category()
    {
        return $this->hasMany(Sub_category::class, 'id', 'sub_category_id');
    }

    // public function OrdersItems()
    // {
    //         return $this->belongsToMany(OrderItem::class);
    // }

}
