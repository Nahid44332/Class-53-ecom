<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function Category()
    {
        return $this->belongsTo(Category::class, 'cat_id', 'id');
    }

    public function SubCategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_cat_id', 'id');
    }

   public function color()
    {
        return $this->hasMany(Color::class, 'product_id', 'id');
    }

    public function size()
    {
        return $this->hasMany(Size::class, 'product_id', 'id');
    }

    public function galleryImage()
    {
        return $this->hasMany(GalleryImage::class, 'product_id', 'id');
    }

     public function cart()
    {
        return $this->hasMany(Cart::class, 'product_id', 'id');
    }
}


// Product => Category

// belongto/hasmany