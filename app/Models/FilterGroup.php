<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FilterGroup extends Model
{
    protected $primaryKey='group_id';
    protected $fillable=['group_name','group_code','status','filter_id'];


    public function Filter()
    {
    	return $this->hasMany('App\Models\Filter','filter_id', 'filter_id');
    }

    public function GroupFilter()
    {
    	return $this->hasMany('App\Models\GroupFilter','group_id','group_id');
    }

}
