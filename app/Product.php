<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
     protected $table='products';
    protected $fillable=['name','description','size','category_id','image','price'];

    public function category()
    {


    	//$this->belongsTo('App\category');
    return $this->belongsTo('App\Category');
    }
}
