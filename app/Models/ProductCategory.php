<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
   protected $table='products_to_categories';

   protected $fillable=['categories_id','products_id'];

   public $timestamps = false;
}
