<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FilterOption extends Model
{
    protected $primaryKey='filter_option_id';
    protected $fillable=['slug','sort','option_name','filter_id'];
    public function filter()
    {
        return $this->belongsTo('App\Models\Filter','filter_id','filter_id');
    }
    public function productwithfilter()
    {
        return $this->hasMany('App\Models\ProductWithFilter','filter_option_id','filter_option_id');
    }
}
