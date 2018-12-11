<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{
    protected $primaryKey ='filter_id';
    protected $fillable=['filter_name','filter_code','display','sort'];


    public function filterOption()
    {
        return $this->hasMany('App\Models\FilterOption','filter_id', 'filter_id');
    }

    public function GroupFilter()
    {
    	return $this->hasMany('App\Models\GroupFilter','filter_id','filter_id');
    }
}
