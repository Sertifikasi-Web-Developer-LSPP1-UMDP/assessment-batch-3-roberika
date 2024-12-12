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
    const VERIFYING = 1;
    const ADMINISTRATION = 2;
    const ASSESSMENT = 3;
    const EVALUATION = 4;
    const REJECTED = 5;
    const ACCEPTED = 6;
    const INACTIVE = 7;

    const STATUSES = [
        self::VERIFYING,
        self::ADMINISTRATION,
        self::ASSESSMENT,
        self::EVALUATION,
        self::REJECTED,
        self::ACCEPTED,
        self::INACTIVE,
    ];
    
    protected $fillable = [
        'status' => 'string',
    ];

    public static function default()
    {
        return static::where('status', 'verifying')->first()->id;
    }
}
