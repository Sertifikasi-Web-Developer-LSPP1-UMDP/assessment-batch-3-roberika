<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserStatus extends Model
{
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
