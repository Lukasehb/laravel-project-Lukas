<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsItem extends Model
{
    public function newsItem(){
        return $this->belongsToMany(Tag::class);
    }
}
