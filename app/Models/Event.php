<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'eventId', 'eventName', 'location', 'startTime', 'endTime', 'donationReceived', 'organizer', 'status', 'eventPhoto',
    ];

    public function sponsors()
    {
        return $this->belongsToMany(Sponsor::class, 'event_sponsor');
    }
}
