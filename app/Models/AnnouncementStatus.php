<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnnouncementStatus extends Model
{
    public function announcement() 
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
