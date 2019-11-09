<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CurrentTemperature extends Model
{
    protected $table = "temperatures";
    protected $fillable = ['degrees'];
}
