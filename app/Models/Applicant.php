<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Applicant extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;

    public function status() 
    {
        return $this->hasOne(ApplicantStatus::class, 'id', 'status_id');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'student_number',
        'name',
        'phone_number',
        'gender',
        'birthday',
        'religion',
        'address',
        'guardian_phone_number',
        'status_id',
    ];
}