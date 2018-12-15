<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class ProductImage extends Model
{
	use Searchable;
   //private static $collection = [];
   protected $touches = ['Product'];
    protected $table='products_images';
    protected $fillable=['image'];
    public $timestamps=false;

    public function product()
    {
    	return $this->belongsTo('App\Models\Product','products_id','products_id');
    }
}
