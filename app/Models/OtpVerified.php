<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OtpVerified extends Model
{
    protected $fillable=['otp','mobile'];
}
