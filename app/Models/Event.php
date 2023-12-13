<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'event_detail_id',
        'status_id',
    ];

    public function eventDetail() {
        // 'nama fk di table event', 'nama key yg direfer di table eventDetail'
        return $this->belongsTo(EventDetail::class, 'event_detail_id', 'id');
    }

    public function users() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function status() {
        return $this->belongsTo(MasterStatus::class, 'status_id', 'id');
    }

    public function eventFiles() {
        return $this->hasMany(EventFile::class, 'event_id', 'id');
    }
}
