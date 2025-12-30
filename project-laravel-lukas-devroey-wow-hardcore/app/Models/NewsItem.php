<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // <--- Import toevoegen
use Illuminate\Database\Eloquent\Model;

class NewsItem extends Model
{
    use HasFactory; // <--- Trait activeren

    protected $fillable = [
        'title',
        'content',
        'published_at',
        'image_path',
    ];

    protected $casts = [
        'published_at' => 'date',
    ];
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
