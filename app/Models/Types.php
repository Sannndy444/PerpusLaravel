<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Types extends Model
{
    protected $fillable = ['type_name'];

    public function books ()
    {
        return $this->hasMany(Book::class);
    }
}
