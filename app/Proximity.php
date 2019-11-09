<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proximity extends Model
{
    protected $table = 'proximities';
    protected $fillable = ['distance'];
}
