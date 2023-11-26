<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'event_id',
        'user_id'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function users() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
