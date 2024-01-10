<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    use HasFactory;
    protected $table = 'blogs';
    protected $fillable = [
        'name_blog',
        'slug_blog',
        'users_id',
        'image',
        'short_description',
        'description',
        'status',
        'cate_blog_id'
    ];
    public function CategoryBlog()
    {
        return $this->belongsTo(CategoryBlog::class, 'cate_blog_id');
    }
    public function User()
    {
        return $this->belongsTo(User::class,'users_id');
    }
    public function scopeFilter($query, array $filters)
    { 
        $query->when($filters['categories_slug'] ?? false, function ($query, $categories_slug) {
            $query->where('cate_blog_id', $categories_slug->id);
        });
        $query->when($filters['cate_blog_id'] ?? false, function ($query, $cate_blog_id) {
            $query->where('cate_blog_id', $cate_blog_id);
        });
        $query->when($filters['status'] ?? false, function ($query, $status) {
            if($status==2|| $status==1 ){
                $status = $status==2 ? 0 : 1;
               $query->where('status', $status);  
            }
        });
        $query->when($filters['search'] ?? false, function ($query, $search) {
           $query->Where('name_blog', 'LIKE', '%' . $search . '%');
        });
    }
}
