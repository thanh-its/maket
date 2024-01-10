<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $table = 'reviews';
    protected $fillable = ['product_id', 'customer_id', 'number_star', 'content', 'status'];

    public function customer()
    {
        return  $this->belongsTo(User::class, 'customer_id');
    }

    public function judge()
    {
        return  $this->belongsTo(Product::class, 'product_id');
    }
}
