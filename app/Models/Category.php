<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = [
        'nameCate',
        'slug',
        'users_id',
        'banner'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function User()
    {
        return $this->belongsTo(User::class,'users_id');
    }
    public function scopeFilter($query, array $filters)
    { 
        $query->when($filters['search'] ?? false, function ($query, $search) {
           $query->Where('nameCate', 'LIKE', '%' . $search . '%');
        });
    }
}
