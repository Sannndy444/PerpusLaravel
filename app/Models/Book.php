<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['title', 'author_id', 'category_id', 'publisher_id', 'image', 'publishedYear'];

    public function authors ()
    {
        return $this->belongsTo(Author::class, 'author_id');
    }

    public function category ()
    {
        return $this->belongsTo(category::class, 'category_id');
    }

    public function publisher ()
    {
        return $this->belongsTo(Publisher::class, 'publisher_id');
    }
}