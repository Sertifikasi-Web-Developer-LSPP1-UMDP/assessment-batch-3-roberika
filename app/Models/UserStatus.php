<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserStatus extends Model
{
    use HasFactory;
    const UPDATED_AT = NULL;
    const CREATED_AT = NULL;

    public function users() 
    {
        return $this->hasMany(User::class, 'status_id', 'id');
    }

    /*
        Pending: waiting for email verification
        Verifying: waiting for activation by admin
        Inactive: account is suspended or deactivated
        Active: account is active
        Admin: account has admin role
    */
    const PENDING = 1;
    const VERIFYING = 2;
    const INACTIVE = 3;
    const ACTIVE = 4;
    const ADMIN = 5;

    protected $fillable = [
        'status' => 'string',
    ];
}
