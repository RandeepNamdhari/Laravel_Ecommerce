<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerAddress extends Model
{
    protected $table='user_address';
    protected $primaryKey='id';
    protected $fillable=['ship_name','ship_mobile','ship_pin','ship_landmark','ship_state','ship_city','ship_add1'];
    public $timestamps=false;

    public function customer()
    {
    	return $this->belongsTo('App\Models\Customer','user_id','customers_id');
    }
}
