<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AnnouncementStatus extends Model
{
    use HasFactory;
    const UPDATED_AT = NULL;
    const CREATED_AT = NULL;

    public function announcements() 
    {
        return $this->hasMany(Announcement::class, 'status_id', 'id');
    }

    /*
        Draft: waiting for listing by admin
        Inactive: announcement is delisted
        Active: announcement is active
    */
    
    protected $fillable = [
        'status' => 'string',
    ];

    public static function default()
    {
        return static::where('status', 'draft')->first()->id;
    }
}
