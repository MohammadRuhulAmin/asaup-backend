<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
class Activitylog extends Model
{
    protected $fillable =[
        'user_id','login_time','login_time',
        'logout_time','date','working_hours_per_day'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }


}
