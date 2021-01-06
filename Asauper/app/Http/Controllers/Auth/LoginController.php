<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Activitylog;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;
    public function redirectTo(){
        $userType = auth()->user()->user_type;
        if( $userType== 'super_admin'){
            return '/super_admin';
        }
        else if( $userType== 'site_admin'){
            $date = date("Y/m/d");
            $user_id = auth()->user()->id;
            $login_time = date("H:i:s");
            $logout_time = "";
            $working_hours_per_day = "";
            Activitylog::create(
                [
                    'user_id' => $user_id,
                    'login_time' =>$login_time,
                    'logout_time' =>$logout_time,
                    'date' =>$date,
                    'working_hours_per_day' =>$working_hours_per_day,
                ]
            );
            return '/site_admin';
        }
        else if($userType == 'regular_user'){
            return '/regular_user';
        }
        else if($userType == 'guest_user'){
            return '/guest_user';
        }
        else return '/logout';
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
