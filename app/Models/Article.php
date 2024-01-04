<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'article_category_id',
        'file_id',
        'title',
        'content',
        'slug',
        'source',
        'show_flag',
        'created_by',
        'updated_by',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function file() {
        return $this->belongsTo(File::class, 'file_id', 'id');
    }

    public function articleCategory() {
        return $this->belongsTo(ArticleCategory::class, 'article_category_id', 'id');
    }
}
