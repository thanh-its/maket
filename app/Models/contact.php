<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
    use HasFactory;
    protected $table = 'contacts';
    protected $fillable = [
        'name',
        'email',
        'status',
        'description'
    ];
    public function scopeFilter($query, array $filters)
    { 
        $query->when($filters['search'] ?? false, function ($query, $search) {
           $query->Where('name', 'LIKE', '%' . $search . '%');
        });
        $query->when($filters['email'] ?? false, function ($query, $email) {
            $query->where('email', $email);
        });
    }
}
