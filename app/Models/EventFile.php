<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventFile extends Model
{
    use HasFactory;

    public function files() {
        return $this->belongsTo(File::class, 'file_id', 'id');
    }
}
