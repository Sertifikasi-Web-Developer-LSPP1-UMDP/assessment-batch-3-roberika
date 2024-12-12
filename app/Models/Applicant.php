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
        'id',
        'name',
        'gender',
        'birthplace',
        'birthdate',
        'religion',
        'citizenship',
        'address',
        'phone_number',
        'guardian_phone_number',
        'school',
        'school_path',
        'major',
        'reason',
        'status_id',
    ];
}
