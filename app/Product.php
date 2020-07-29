<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        "name",
        "description",
        "photo",
        "category",
        "price",
    ];

    public function scopeName($query, $name)
    {
        if ($name)
            return $query->where('name', 'LIKE', "%$name%");
    }
    public function scopeCategory($query, $category)
    {
        if ($category)
            return $query->where('category', 'LIKE', "$category");
    }
}
