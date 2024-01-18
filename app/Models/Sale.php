<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sale extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'sales';
    protected $fillable = [
        'number_sale',
        'code',
        'discount_percent',
        'products_id',
        'users_id',
        'active',
        'time_start',
        'time_end'
    ];
}
