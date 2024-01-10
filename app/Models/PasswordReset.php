<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
    use HasFactory;
    // thông tin của website
    protected $table = 'password_resets';
    protected $fillable = [
        'email',
        'token',
    ];
}
