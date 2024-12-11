<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Applicant extends Model
{
    use HasFactory;

    public function status() 
    {
        return $this->belongsTo(ApplicantStatus::class, 'status_id', 'id');
    }

    public function user() 
    {
        return $this->belongsTo(User::class, 'id', 'id');
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
