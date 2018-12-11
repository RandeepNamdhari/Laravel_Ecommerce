<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $primaryKey='categories_id';
	
    public function categorydescription()
    {
    	return $this->hasOne('App\Models\CategoryDescription','categories_id','categories_id');
    }

    public function productcategory()
    {
    	return $this->hasMany('App\Models\ProductCategory','categories_id','categories_id');
    }
}
