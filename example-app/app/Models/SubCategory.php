<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class,'cat_id', 'id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class,'sub_cat_id', 'id');
    }
}

//SubCategory belongsTo Category
//belongsTo() | hasMany()