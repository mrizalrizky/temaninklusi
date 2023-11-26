<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentReplies extends Model
{
    protected $fillable = [
        'content',
        'user_comment_id',
        'user_id'
    ];
}
