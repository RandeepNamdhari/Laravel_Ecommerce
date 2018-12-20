<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class ProductAttribute extends Model
{
    use Searchable;
   
   protected $touches = ['Product'];
    protected $table='products_attributes';

    protected $primaryKey='products_attributes_id';

    protected $fillable=['options_id','options_values_id','is_default','options_values_price','price_prefix','sort','view'];

    public $timestamps=false;

    public function productoption()
    {
    	return $this->belongsTo('App\Models\ProductOption','options_id','products_options_id');
    }

    public function productoptionvalue()
    {
    	return $this->belongsTo('App\Models\ProductOptionValue','options_values_id','products_options_values_id');
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Product','products_id','products_id');
    }
}
