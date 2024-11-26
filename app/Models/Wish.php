<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wish extends Model
{
    protected $fillable = [
        "user_id",
        "product_id",
    ];
    public function product(){
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
