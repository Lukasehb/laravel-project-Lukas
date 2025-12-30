<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function news(){
        return $this->belongsToMany(NewsItem::class);
    }
    public function newsItems()
    {
        return $this->belongsToMany(NewsItem::class);
    }
}
