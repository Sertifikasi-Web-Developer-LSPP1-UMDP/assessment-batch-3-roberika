<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    public function status() 
    {
        return $this->belongsTo(UserStatus::class, 'status_id', 'id');
    }
    
    public function getStatusLabel()
    {
        return match ($this->status_id) {
            UserStatus::PENDING => 'Verifikasi Email',
            UserStatus::VERIFYING => 'Verifikasi Admin',
            UserStatus::INACTIVE => 'Inaktif',
            UserStatus::ACTIVE => 'Aktif',
            UserStatus::ADMIN => 'Admin',
        };
    }

    public function getStatusMessage()
    {
        return match ($this->status_id) {
            UserStatus::PENDING => 'Silahkan verifikasi email anda lewat menu profil.',
            UserStatus::VERIFYING => 'Menunggu verifikasi akun dari admin.',
            UserStatus::INACTIVE => 'Akun ini telah dideaktifasi.',
            default => null,
        };
    }

    public function getStatusColor()
    {
        return match ($this->status_id) {
            UserStatus::PENDING => 'text-yellow-700',
            UserStatus::VERIFYING => 'text-yellow-400',
            UserStatus::INACTIVE => 'text-gray-400',
            UserStatus::ACTIVE => 'text-green-400',
            UserStatus::ADMIN => 'text-blue-700',
        };
    }

    public function getEmailVerificationStatus()
    {
        return $this->email_verified_at ? $this->email_verified_at : 'Belum';
    }

    public function applicant()
    {
        return $this->hasOne(Applicant::class, 'id', 'id');
    }

    public function hasApplied()
    {
        return $this->applicant !== null && $this->applicant->status_id !== ApplicantStatus::INACTIVE;
    }

    public function isInactive(): bool {
        return $this->status_id === UserStatus::INACTIVE ||
            $this->status_id === UserStatus::PENDING ||
            $this->status_id === UserStatus::VERIFYING;
    }

    public function isAdmin(): bool
    {
        return $this->status_id === UserStatus::ADMIN;
    }
    
    public function isNonAdmin(): bool
    {
        return $this->status_id !== UserStatus::ADMIN && $this->status_id !== UserStatus::INACTIVE;
    }

    public function isNotAdminVerified(): bool
    {
        return $this->status_id === UserStatus::VERIFYING;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'status_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
