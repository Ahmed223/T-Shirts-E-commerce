<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table='addresses';
   protected $fillable=['addressline','city','state','zip','country','phone'];
}
