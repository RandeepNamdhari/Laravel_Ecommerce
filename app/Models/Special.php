<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Special extends Model
{
    protected $fillable=['specials_new_products_price','expires_date','date_status_change','specials_last_modified','specials_date_added'];

    public $timestamps=false;

    //const CREATED_AT = 'specials_date_added';
    //const UPDATED_AT = 'specials_last_modified';

}
