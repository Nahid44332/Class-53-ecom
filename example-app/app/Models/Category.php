<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];

     public function Product()
    {
        return $this->hasmany(Product::class, 'cat_id', 'id');
    }
}
