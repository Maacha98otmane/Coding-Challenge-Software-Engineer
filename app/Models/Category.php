<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $guarded = [];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function sub_categories()
    {
        return $this->hasMany(Category::class, 'parent_category');
    }
}
