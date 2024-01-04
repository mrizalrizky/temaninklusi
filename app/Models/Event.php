<?php

namespace App\Models;

use App\Constants\EventStatusConstant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'organizer_id',
        'event_detail_id',
        'status_id',
        'event_category_id',
        'banner_file_id',
        'license_file_id',
        'license_flag',
        'show_flag',
        'created_by',
        'updated_by',
    ];

    public function eventDetail() {
        // 'nama fk di table event', 'nama key yg direfer di table eventDetail'
        return $this->belongsTo(EventDetail::class, 'event_detail_id', 'id');
    }

    public function organizer() {
        return $this->belongsTo(MasterOrganizer::class, 'organizer_id', 'id');
    }

    public function status() {
        return $this->belongsTo(MasterStatus::class, 'status_id', 'id');
    }

    public function eventCategory() {
        return $this->belongsTo(EventCategory::class, 'event_category_id', 'id');
    }

    public function eventBanner() {
        return $this->belongsTo(File::class, 'banner_file_id', 'id');
    }

    public function eventLicense() {
        return $this->belongsTo(File::class, 'license_file_id', 'id');
    }



    public function registeredByUsers() {
        return $this->belongsToMany(User::class, 'registered_events', 'event_id', 'user_id');
    }

    public function comments() {
        return $this->hasMany(UserComment::class, 'event_id', 'id');
    }


    public function isWaitingApproval() {
        return $this->status_id == EventStatusConstant::WAITING_APPROVAL;
    }
}
