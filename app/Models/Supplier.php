<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'suppliers';
    protected $fillable = ['nameSupplier','address','phone','status'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function scopeFilter($query, array $filters)
    { 
        $query->when($filters['search'] ?? false, function ($query, $search) {
           $query->Where('nameSupplier', 'LIKE', '%' . $search . '%');
        });
    }
}
