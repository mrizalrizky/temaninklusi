<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'location',
        'slug',
        'quota',
        'contact_email',
        'contact_phone',
        'start_date',
        'end_date'
    ];

    protected $dates = [
        'start_date',
        'end_date'
    ];

    public function events() {
        return $this->belongsTo(Event::class);
    }

}
