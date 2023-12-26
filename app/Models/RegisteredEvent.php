<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisteredEvent extends Model
{
    protected $fillable = [
        'user_id',
        'event_id'
    ];

    // public function events() {
    //     return $this->belongsTo(Event::class, 'event_id', 'id');
    // }
}
