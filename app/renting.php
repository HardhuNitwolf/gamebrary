<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class renting extends Model
{
    protected $table = 'renting';
    
    //relación one to many
    public function product(){
        return $this->belong('App\product', 'product_id ');
        
    }
    public function members(){
        return $this->belong('App\User', 'member_id ');
        
    }
     //
}
