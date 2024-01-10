<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'avatar',
        'fullname',
        'address',
        'address_detail',
        'phone',
        'email',
        'password',
        'status',
        'is_admin',
        'group_user',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function order()
    {
        return $this->hasMany(Order::class);
    }
    public function blogs()
    {
        return $this->hasMany(Blogs::class,'users_id');
    }
    public function products()
    {
        return $this->hasMany(Product::class,'users_id');
    }
    public function shipment_detail()
    {
        return $this->hasMany(ShipmentDetail::class);
    }
    public function groupUser()
    {
        return $this->belongsTo(GroupUser::class, 'group_user');
    }
    public function roles()
    {
        return $this->belongsTo(Roles::class,'role_id');
    }
    public function scopeFilter($query, array $filters)
    { 
        $query->when($filters['group_user'] ?? false, function ($query, $group_user) {
            $query->where('group_user', $group_user);
        });
        $query->when($filters['role_id'] ?? false, function ($query, $role_id) {
            $query->where('role_id', $role_id);
        });
        $query->when($filters['status'] ?? false, function ($query, $status) {
            if($status==2|| $status==1 ){
                $status = $status==2 ? 0 : 1;
               $query->where('status', $status);  
            }
        });
        $query->when($filters['search'] ?? false, function ($query, $search) {
           $query->Where('fullname', 'LIKE', '%' . $search . '%');
        });
    }
}
