<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class config extends Model
{
    use HasFactory;
    // thông tin của website
    protected $table = 'configs';
    protected $fillable = [
        'logo',
        'link_facebook',
        'link_twitter',
        'link_linkedin',
        'phone',
        'address',
        'email'
    ];
}
