<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplicantStatus extends Model
{
    /*
        Verifying: waiting for activation by admin
        Administration: in process by administration
        Assessment: in process by acceptance team
        Evaluation: in process by evaluation team
        Rejected: application rejected
        Accepted: application accepted
    */
    
    protected $fillable = [
        'status' => 'string',
    ];

    public static function default()
    {
        return static::where('status', 'verifying')->first()->id;
    }
}
