<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $table='products_images';
    protected $fillable=['image'];
    public $timestamps=false;
}
