<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Subnavbarmenu;
class Navbarmenuitem extends Model
{
    protected $fillable =['navbar_name','navbar_link','status','description'];
    public function subnavbarmenuitems(){
    	return $this->hasMany(Subnavbarmenu::class,'navbarmenuitem_id')->where('status','Enable');
    }
}
