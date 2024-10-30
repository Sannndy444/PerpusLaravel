<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['title', 'author_id', 'category_id', 'publisher_id', 'image', 'publishedYear', 'type_id'];

    public function author ()
    {
        return $this->belongsTo(Author::class);
    }

    public function category ()
    {
        return $this->belongsTo(Category::class);
    }

    public function publisher ()
    {
        return $this->belongsTo(Publisher::class);
    }

    public function type ()
    {
        return $this->belongsTo(Types::class);
    }
}