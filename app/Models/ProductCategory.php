<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use Laravel\Scout\Searchable;

class ProductCategory extends Model
{
	//use Searchable;
  
   //protected $touches = ['Product'];

   protected $table='products_to_categories';

   protected $fillable=['categories_id','products_id'];

   public $timestamps = false;

    public function product()
    {
    	return $this->belongsTo('App\Models\Product','products_id','products_id');
    }
    
}
