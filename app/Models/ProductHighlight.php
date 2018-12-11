<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductHighlight extends Model
{
    protected $primaryKey='highlight_id';

    protected $fillable=['highlight_text'];

    public function product()
    {
    	return $this->belongsTo('App\Models\Product','products_id','products_id');
    }
}
