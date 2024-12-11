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
    */

    protected $fillable = [
        'status' => 'string',
    ];
}
