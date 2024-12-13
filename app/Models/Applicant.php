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
    
    public function getStatusLabel()
    {
        return match ($this->status_id) {
            ApplicantStatus::VERIFYING => 'Verifikasi',
            ApplicantStatus::ADMINISTRATION => 'Administrasi',
            ApplicantStatus::ASSESSMENT => 'Asesi',
            ApplicantStatus::EVALUATION => 'Evaluasi',
            ApplicantStatus::REJECTED => 'Ditolak',
            ApplicantStatus::ACCEPTED => 'Diterima',
            ApplicantStatus::INACTIVE => 'Inaktif',
        };
    }
    
    public function getStatusMessage()
    {
        return match ($this->status_id) {
            ApplicantStatus::VERIFYING => 'Aplikasi sedang menunggu verifikasi dari admin.',
            ApplicantStatus::ADMINISTRATION => 'Pendaftaran sedang diproses oleh administrasi.',
            ApplicantStatus::ASSESSMENT => 'Pendaftaran sedang diproses oleh tim asesor.',
            ApplicantStatus::EVALUATION => 'Pendaftaran sedang dievaluasi.',
            ApplicantStatus::REJECTED => 'Mohon maaf, pendaftaran calon mahasiswa anda telah ditolak.',
            ApplicantStatus::ACCEPTED => 'Selamat, anda telah diterima sebagai calon mahasiswa.',
            ApplicantStatus::INACTIVE => 'Pendaftaran telah diinvalidasi',
            default => null,
        };
    }

    public function getStatusColor()
    {
        return match ($this->status_id) {
            ApplicantStatus::VERIFYING => 'text-yellow-400',
            ApplicantStatus::ADMINISTRATION => 'text-blue-300',
            ApplicantStatus::ASSESSMENT => 'text-blue-500',
            ApplicantStatus::EVALUATION => 'text-blue-700',
            ApplicantStatus::REJECTED => 'text-red-700',
            ApplicantStatus::ACCEPTED => 'text-green-400',
            ApplicantStatus::INACTIVE => 'text-gray-400',
        };
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
