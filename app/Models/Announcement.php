<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Announcement extends Model
{
    use HasFactory;

    public function status() 
    {
        return $this->belongsTo(AnnouncementStatus::class, 'status_id', 'id');
    }

    public function getStatusLabel()
    {   
        return match ($this->status_id) {
            AnnouncementStatus::DRAFT => 'Draft',
            AnnouncementStatus::INACTIVE => 'Inaktif',
            AnnouncementStatus::ACTIVE => 'Aktif',
        };
    }

    public function getStatusColor()
    {   
        return match ($this->status_id) {
            AnnouncementStatus::DRAFT => 'text-blue-400',
            AnnouncementStatus::INACTIVE => 'text-gray-400',
            AnnouncementStatus::ACTIVE => 'text-green-400',
        };
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'title',
        'summary',
        'body',
        'status',
        'released_at',
    ];
}
