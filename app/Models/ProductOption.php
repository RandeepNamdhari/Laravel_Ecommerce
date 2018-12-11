<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductOption extends Model
{
    protected $table='products_options';
    protected $primaryKey='products_options_id';

    public function ProductOptionValueToProductOption()
    {
    	return $this->hasMany('App\Models\ProductOptionValueToProductOption','products_options_id','products_options_id');
    }

     public function productOptionValue()
    {
        return $this->hasManyThrough(
            'App\Models\ProductOptionValue',
            'App\Models\ProductOptionValueToProductOption',
            'products_options_id', // Foreign key on users table...
            'products_options_values_id', // Foreign key on posts table...
            'products_options_id', // Local key on countries table...
            'products_options_values_to_products_options_id' // Local key on users table...
        );
    }
}
