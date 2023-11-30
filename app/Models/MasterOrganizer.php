<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterOrganizer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'initial',
        'address',
        'contact_name',
        'contact_phone',
        'user_id',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
