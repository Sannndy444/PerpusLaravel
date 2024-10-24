<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function authors ()
    {
        return $this->belongsTo(Author::class);
    }

    public function category ()
    {
        return $this->belongsTo(category::class);
    }

    public function publisher ()
    {
        return $this->belongsTo(Publisher::class);
    }
}