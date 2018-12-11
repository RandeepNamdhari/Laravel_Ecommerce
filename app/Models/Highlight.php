<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Highlight extends Model
{
    protected $table='product_highlights';
    protected $primaryKey='highlight_id';

    protected $fillable=['highlight_text'];
}
