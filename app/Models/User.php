<?php

namespace App\Models;

use App\Constants\RoleConstant;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'role_id',
        'is_banned',
        'is_active',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role() {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }

    public function organizer() {
        return $this->hasOne(MasterOrganizer::class, 'user_id');
    }

    public function registeredEvents() {
        return $this->belongsToMany(Event::class, 'registered_events', 'user_id', 'event_id');
    }

    public function isAdmin() {
        return $this->role_id == RoleConstant::ADMIN;
    }

    public function isEO() {
        return $this->role_id == RoleConstant::EVENT_ORGANIZER;
    }

    public function isMember() {
        return $this->role_id == RoleConstant::MEMBER;
    }
}
