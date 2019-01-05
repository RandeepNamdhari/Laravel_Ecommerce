<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupportedProduct extends Model
{
	protected $fillable=['supported_products_id','assemble_product_id'];
    public function assembleproduct()
    {
    	return $this->belongsTo('App\Models\AssembleProduct','assemble_product_id','assemble_product_id');
    }

    public function product()
    {
    	return $this->belongsTo('App\Models\Product','supported_products_id','products_id');
    }

    public function productdescription()
    {
    	return $this->belongsTo('App\Models\ProductDescription','supported_products_id','products_id');
    }
}
