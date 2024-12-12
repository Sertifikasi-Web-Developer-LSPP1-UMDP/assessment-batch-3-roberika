<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    public function status() 
    {
        return $this->belongsTo(UserStatus::class, 'status_id', 'id');
    }

    public function applicant()
    {
        return $this->hasOne(Applicant::class, 'id', 'id');
    }

    public function isAdmin(): bool
    {
        return $this->status_id === UserStatus::ADMIN;
    }
    
    public function isNonAdmin(): bool
    {
        return $this->status_id !== UserStatus::ADMIN && $this->status_id !== UserStatus::INACTIVE;
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
