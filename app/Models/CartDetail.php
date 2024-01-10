<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    use HasFactory;
    protected $table = 'carts';
    protected $fillable = ['cart_id','product_id','quantity','price'];

    public function product()
    {
        return $this->hasMany(Product::class, 'product_id');
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class, 'cart_id');
    }
}
