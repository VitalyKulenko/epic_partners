<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['title'];

    public function objects()
    {
        return $this->belongsToMany(Object::class);
    }
}
