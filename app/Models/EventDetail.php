<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\AsCollection;
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
        'end_date',
        'max_register_date',
        'social_media_link',
        'event_facilities',
        'event_benefits',
    ];

    protected $casts = [
        'event_facilities' => AsCollection::class,
        'event_benefits' => AsCollection::class,
    ];

    protected $dates = [
        'start_date',
        'end_date',
        'max_register_date'
    ];

    public function events() {
        return $this->belongsTo(Event::class);
    }

}
