<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Navbarmenuitem;
use App\Aboutus;
use App\Contact;
use App\Image;
use DB;
use App\Videolink;
use App\Committee;
use App\Partner;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //$menuItems = Navbarmenuitem::where('status','Enable')->get();
        //view()->share('menuItems',$menuItems);

        //--------------------------------

        // solution property
        $FullMenuFamily = array();
        $allRootMenu = Navbarmenuitem::where('status','Enable')->get();
        foreach($allRootMenu as $aR){
            $rootId = Navbarmenuitem::find($aR->id);
            $subRootMenu =$rootId->subnavbarmenuitems;
            if(!empty($subRootMenu)){
                $FullMenuFamily[] = array(
                    "rootMenuName" =>$aR->navbar_name,
                    "rootMenuLink" =>$aR->navbar_link,
                    "subRootListName" =>json_encode($subRootMenu),
                );
            }
        }
        $MenuItems = json_encode($FullMenuFamily);
        view()->share('MenuItems',$MenuItems);

        $aboutUs = DB::table('aboutuses')->orderBy('id','desc')->first();
        view()->share('AboutUs',$aboutUs);

        $bodyImage = Image::where('image_type','body_image')->get();
        view()->share('bodyImage',$bodyImage);

        $videoLink = DB::table('videolinks')->orderBy('id','desc')->first();
        view()->share('videoLink',$videoLink);
        $Committee = Committee::all();
        view()->share('committee',$Committee);

        $partner = Partner::all();
        view()->share('partner',$partner);

        $service = DB::table('services')->orderBy('id','desc')->get();
        view()->share('service',$service);

        $contactNumber = Contact::OrderBy('id','desc')->first();
        view()->share('contactNumber',$contactNumber);

    }
}
