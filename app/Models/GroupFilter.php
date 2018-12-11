<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupFilter extends Model
{
   protected $fillable=['filter_id','group_id','filter_name'];

    public function FilterGroup()
    {
    	return $this->belongsTo('App\Models\FilterGroup','group_id','group_id');
    }

    public function Filter()
    {
    	return $this->belongsTo('App\Models\Filter','filter_id','filter_id');
    }
}
