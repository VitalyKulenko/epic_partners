<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ObjectDB extends Model
{
    protected $fillable = ['title'];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
