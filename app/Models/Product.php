<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        "category_id",
        "brand_id",
        "name",
        "price1",
        "price2",
        "note",
    ];

    public function category(){
        return $this->belongsTo(Category::class)->withTrashed();
    }

    public function brand(){
        return $this->belongsTo(Brand::class)->withTrashed();
    }
}
