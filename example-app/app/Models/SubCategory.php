<?php

// app/Models/SubCategory.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id');
    }
}

