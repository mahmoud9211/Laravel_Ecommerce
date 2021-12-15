<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category()

    {
        return $this->hasOne(category::class,'id','category_id');
    }

    public function subcategory()

    {
        return $this->hasOne(subcategory::class,'id','subcategory_id');
    }

    public function brand()

    {
        return $this->hasOne(brand::class,'id','brand_id');
    }
}
