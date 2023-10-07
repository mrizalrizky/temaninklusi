<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    public function eventDetails() {
        return $this->belongsTo(EventDetail::class, 'event_detail_id', 'event_detail_id');
    }

    public function users() {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function status() {
        return $this->belongsTo(MasterStatus::class, 'status_id', 'status_id');
    }
}
