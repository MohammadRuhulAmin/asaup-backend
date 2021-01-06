<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Navbarmenuitem;

class Subnavbarmenu extends Model
{
    protected $fillable = ['navbar_name','navbarmenuitem_id','navbar_link','status'];
    public function navbarmenuitem(){
    	return $this->belongsTo(Navbarmenuitem::class);
    }
}
