<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssembleProduct extends Model
{
	protected $primaryKey='assemble_product_id';
    protected $fillable=['categories_id','products_id','status','has_support'];
    public function supportedproduct()
    {
    	return $this->hasMany('App\Models\SupportedProduct','assemble_product_id','assemble_product_id');
    }

    public function product()
    {
    	return $this->belongsTo('App\Models\Product','products_id','products_id');
    }

    public function productdescription()
    {
    	return $this->belongsTo('App\Models\ProductDescription','products_id','products_id');
    }

    public function categorydescription()
    {
    	return $this->belongsTo('App\Models\CategoryDescription','categories_id','categories_id');
    }
}
