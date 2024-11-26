<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductFiles extends Model
{
    protected $fillable = [
        'product_id',
        'path'
    ];
    public function product(){
        return $this->hasMany(Product::class, 'product_id', 'id');
    }
}
