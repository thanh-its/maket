<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryBlog extends Model
{
    use HasFactory;
    protected $table = 'category_blogs';
    protected $fillable = [
        'name',
        'slug',
        'users_id',
    ];
    public function blogs()
    {
        return $this->hasMany(Blogs::class,'cate_blog_id');
    }
    public function User()
    {
        return $this->belongsTo(User::class,'users_id');
    }
    public function scopeFilter($query, array $filters)
    { 
        $query->when($filters['search'] ?? false, function ($query, $search) {
           $query->Where('name', 'LIKE', '%' . $search . '%');
        });
    }
}
