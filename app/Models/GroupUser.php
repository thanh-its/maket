<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GroupUser extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'name'
    ];
    public function user()
    {
        return $this->hasMany(User::class,'group_user');
    }
    public function scopeFilter($query, array $filters)
    { 
        $query->when($filters['search'] ?? false, function ($query, $search) {
           $query->Where('name', 'LIKE', '%' . $search . '%');
        });
    }
}
