<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        "user_id",
        "name",
        "path",
        "price",
        "brand_id",
        "description",
        "category",
        "engine_hours",
        "yop",
        "qty",
        "shipping",
        "implement",
        "isAvailable",
        "isApproved"
    ];
    public function seller(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function reviews(){
        return $this->hasMany(Review::class, 'product_id', 'id');
    }
    public function files(){
        return $this->hasMany(ProductFiles::class, 'product_id', 'id');
    }
    public function brand(){
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }
    public function wishes(){
        return $this->hasMany(Wish::class, 'product_id', 'id');
    }
}
