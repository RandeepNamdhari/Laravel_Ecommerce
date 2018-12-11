<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductWithFilter extends Model
{
    protected $primaryKey='product_filter_id';
    protected $fillable=['filter_option_id','products_id'];


    public function filterOption()
    {
    	return $this->belongsTo('App\Models\FilterOption','filter_option_id','filter_option_id');
    }
}
