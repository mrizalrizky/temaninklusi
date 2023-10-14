<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    public function eventDetails() {
        return $this->belongsTo(EventDetail::class, 'event_detail_id', 'id');
    }

    public function users() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function status() {
        return $this->belongsTo(MasterStatus::class, 'status_id', 'id');
    }
}
