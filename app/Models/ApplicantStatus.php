<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ApplicantStatus extends Model
{
    use HasFactory;
    const UPDATED_AT = NULL;
    const CREATED_AT = NULL;

    public function applicants() 
    {
        return $this->hasMany(Applicant::class, 'status_id', 'id');
    }

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
