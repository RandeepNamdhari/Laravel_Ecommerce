<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductDescription extends Model
{
   protected $table='products_description';

   protected $fillable=['products_name','products_description'];

   public $timestamps=false;
}
