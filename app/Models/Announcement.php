<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Announcement extends Model
{
    
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;

    public function status() 
    {
        return $this->belongsTo(AnnouncementStatus::class, 'status_id', 'id');
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
