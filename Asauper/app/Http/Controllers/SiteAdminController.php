<?php

namespace App\Http\Controllers;

use App\Post;
use App\Contact;
use Illuminate\Http\Request;
use App\Navbarmenuitem;
use DB;
use App\User;
use App\Image;
use App\Videolink;
use App\Subnavbarmenu;
use Illuminate\Support\Facades\Hash;
use App\Aboutus;
use App\Committee;
use App\Partner;
use App\Service;
use App\Activitylog;

//use Illuminate\Contracts\Encryption\DecryptException;
//use Illuminate\Support\Facades\Crypt;
use \Crypt;
class SiteAdminController extends Controller
{
    public function index(){
        $userInfo = User::find(auth()->user()->id);
        $activityLog = $userInfo->activitylogs;
        //return $activityLog;
        return view('SiteAdmin.index')->with(['activityLog' =>$activityLog]);
    }
    public function createMenu(){
        $FullMenuFamily = array();
        $allRootMenu = Navbarmenuitem::all();
        foreach($allRootMenu as $aR){
            $rootId = Navbarmenuitem::find($aR->id);
            $subRootMenu =$rootId->subnavbarmenuitems;
            if(!empty($subRootMenu)){
                $FullMenuFamily[] = array(
                    "rootMenuName" =>$aR->navbar_name,
                    "rootMenuId" =>$aR->id,
                   // "rootMenuLink" =>  $aR->navbar_link,
                    "subRootListName" =>json_encode($subRootMenu),
                );
            }
        }
        //return json_encode($FullMenuFamily);
    	return view('SiteAdmin.menuitemCreate')->with(['allRootMenu'=>json_encode($FullMenuFamily)]);
    }
    public function storeMenu(Request $request){
        $request->validate([
            'navbar_name' =>'required',
            'navbar_link' =>'required',
            'status' =>'required',
        ]);
    	Navbarmenuitem::create([
    		'navbar_name' =>$request->navbar_name,
    		'navbar_link' =>$request->navbar_link,
    		'status'=>$request->status,

    	]);
    	return redirect()->back()->with('root_menu_created','Root Menu is Created Successfully!');


    }
    public function deleteMainMenu($id){
        $rootMenu = Navbarmenuitem::find($id);
        $rootMenu->delete();
        return redirect()->back()->with('delete_main_menu',"Root  Menu is Deleted Successfully! ");

    }

    public function subMenuStore(Request $request){
        $request->validate([
            'navbar_sub_name' => 'required',
            'navbar_link_add' =>'required',
        ]);
       $navbar_name = $request->navbar_name;
       $navbar_sub_name = $request->navbar_sub_name;
       $navbar_link = $request->navbar_link_add;
        $rootNavBarInfo = Navbarmenuitem::where('navbar_name',$navbar_name)->first();
       $rootNavBarId = $rootNavBarInfo->id;
       Subnavbarmenu::create([
            'navbar_name' =>$navbar_sub_name,
            'navbarmenuitem_id' => $rootNavBarId,
            'navbar_link'  =>$navbar_link,
            'status' =>'Enable',
            'description' =>"this is a text",
       ]);


       return "sub navbar is created Successfully!";
    }
    public function viewChangePasswordPage(){
        return view('SiteAdmin.changePasswordPage');
    }
    public function updatePassword(Request $request){
        $request->validate([
            'new_password' =>'required',
            'old_password' =>'required',
            'confirm_password' =>'required',
        ]);
        if($request->new_password == $request->confirm_password){
           $user = User::find(auth()->user()->id);
           if($user){
                if(Hash::check($request->old_password,$user->password)){
                    $user->password = Hash::make($request->new_password);
                    $user->save();
                    //return "password is changed Successfully";
                    return redirect()->back()->with('change_password',"Password is changed Successfully!");
                }
                else{
                    //return "old password didnt match";
                    return  redirect()->back()->with('unchanged_password','Password Didnt Match ,Please Try Again');
                }
            }
            else return "user is not authenticated";
        }
        else return redirect()->back()
            ->with([
                'confirm_password_and_new_password_un_matched',
                "Confirm Password and New Password didnt match, Please Try Again"
            ]);
    }

    public function viewBannerPanel(){
        $images = Image::where('image_type','banner_image')->get();
        return view('SiteAdmin.bannerPanel')->with('images',$images);
    }
    public function uploadBannerImages(Request $request){
        $request->validate([
            'image' =>'required',
        ]);
         $images = $request->image;
        foreach($images as $image){
            $image_new_name = time() . $image->getClientOriginalName();
            $image->move('images',$image_new_name);
            $post = new Image();
            $post->image = 'images/' . $image_new_name;
            $post->image_type = $request->image_type;
            $post->save();

        }
        return redirect()->back()->with('banner_image_insert',"Banner image is inserted Successfully!");
    }

    public function deleteBannerImage($id){
        $image = Image::find($id);
        $image->delete();
        return redirect()->back()->with('delete_banner_image','Banner image is deleted Successfully!');
    }
    public function viewBodyImagePanel(){
        $images = Image::where('image_type','body_image')->get();
        return view('SiteAdmin.bodyImage',compact('images'));
    }
    public function bodyImageInsert(Request $request){
        $request->validate([
            'image' =>'required',
        ]);
        $images = $request->image;
        foreach($images as $image){
            $image_new_name = time() . $image->getClientOriginalName();
            $image->move('images',$image_new_name);
            $post = new Image();
            $post->image = 'images/' . $image_new_name;
            $post->image_type = $request->image_type;
            $post->save();

        }
        return redirect()->back()->with('body_image_inserted','Body Image is inserted Successfully!');

    }
    public function deleteBodyImage($id){
        $image = Image::find($id);
        $image->delete();
        return redirect()->back()->with('body_image_deleted','Body Image is deleted Successfully!');
    }

    public function viewDynamicTextPage(){
        $videoList = Videolink::all();
        return view('SiteAdmin.dynamicViewPage',compact('videoList'));
    }


    public function saveAboutWebSite(Request $request){
       $aboutUs = new Aboutus();
       $request->validate([
          'about_us' =>'required',
       ]);
       $aboutUs->about_us = $request->about_us;
       $aboutUs->auther_name = auth()->user()->name;
       $aboutUs->save();
       return redirect()->back()->with('change_about_us_text','About Change text is updated Successfully!');

    }


    public function saveVideoLink(Request $request){
        $request->validate([
           'video_link' =>'required',
        ]);
        $videoLink = new Videolink();
        $videoLink->video_link = $request->video_link;
        $videoLink->save();
        return redirect()->back()->with('upload_a_video','Video is uploaded Successfully!');
    }

    public function deleteVideoLink($id){
        $findVideoLink = Videolink::find($id);
        $findVideoLink->delete();
        return redirect()->back()->with('delete_video_link',"Video is deleted successfully!");
    }

    public function viewCommittee(){
        $committee = Committee::all();
        return view('SiteAdmin.webSiteCommettee',compact('committee'));
    }
    public function deleteMember($id){
        $com = Committee::find($id);
        $com->delete();
        return redirect()->back()->with('delete_asaupe_member',"Member is Deleted Successfully!");

    }

    public function saveMemberCommittee(Request $request){
        $request->validate(
          [
              'name' =>'required',
              'description' => 'required',
              'position'  => 'required',
              'image' => 'required'
          ]
        );
        $com = new Committee();
        $com->name = $request->name;
        $com->description = $request->description;
        $com->position = $request->position;
        $file = $request->image;
        $extention = $file->getClientOriginalExtension();
        $filename = 'images/'. time() . '.' .$extention;
        $file->move('images/',$filename);
        $com->image = $filename;
        $com->save();
        return redirect()->back()->with('create_asaupe_member',"New Member is created Successfully!");


    }
    public function viewpartnerPage(){
       $partnerInfo = DB::table('partners')->orderBy('id','desc')->get();
        return view('SiteAdmin.partnerInformation',compact('partnerInfo'));
    }

    public function insertPartner(Request $request){
        $partner = new Partner();
        $request->validate([
           'partner_company_name' => 'required',
            'partner_company_address' => 'required',
            'partner_company_contact' =>'required',
            'partner_company_logo' => 'required',
        ]);


        $partner->partner_company_name = $request->partner_company_name;
        $partner->partner_company_address =  $request->partner_company_address;
        $partner->partner_company_contact = $request->partner_company_contact;
        $file = $request->partner_company_logo;
        $extention = $file->getClientOriginalExtension();
        $filename = 'images/'. time() . '.' .$extention;
        $file->move('images/',$filename);
        $partner->partner_company_logo = $filename;
        $partner->save();
        return redirect()->back()->with('add_new_partner',"New Partner is Added Successfully!");

    }
    public function deletePartner($id){
        $partner = Partner::find($id);
        $partner->delete();
        return redirect()->back()->with(['delete_partner' => "Partner is Deleted Successfully!"]);

    }
    public function viewServicePage(){
        $services = DB::table('services')->orderBy('id','desc')->get();
        return view('SiteAdmin.services',compact('services'));
    }
    public function uploadService(Request $request){
        $request->validate([
            'service_name' =>'required',
            'service_details' => 'required',
            'service_contact' =>'required',
            'service_image' => 'required',
        ]);
        $service = new Service();

        $service->service_name = $request->service_name;
        $service->service_details = $request->service_details;
        $service->service_contact = $request->service_contact;

        $file = $request->service_image;
        $extention = $file->getClientOriginalExtension();
        $filename = 'images/'. time() . '.' .$extention;
        $file->move('images/',$filename);
        $service->service_image = $filename;
        $service->save();
        return redirect()->back()->with('add_new_service','New Service is added Successfully!');
    }
    public function deleteService($id){
        $service = Service::find($id);
        $service->delete();
        return redirect()->back()->with('delete_service','Service is Deleted Successfully!');

    }
    public function viewCreateNoticePage (){
        $announcements = Post::where('post_type','Announcement')->orderBy('id','desc')->get();
        $notices = Post::where('post_type','Notice')->orderBy('id','desc')->get();
        return view('SiteAdmin.noticeOrAnouncement')
            ->with(['announcement'=>$announcements ,'notices' =>$notices]);
    }
    public function savePost(Request  $request){
        $request->validate([
           'posted_by' =>'required',
           'post_date' => 'required',
           'post_description' =>'required',
           'post_type' =>'required',
        ]);
        $post = new Post();
        $post->posted_by = $request->posted_by;
        $post->post_date = $request->post_date;
        $post->post_description = $request->post_description;
        $post->post_type = $request->post_type;
        $post->save();
        return redirect()->back()->with('create_notice',"Notice is published Successfully!!");
        //return "post is saved successfully";
    }
    public function viewEditNoticePage($id){
        $post = Post::find($id);
        return view('SiteAdmin.editNotice',compact('post'));
    }
    public function updatePost(Request $request,$id){
        $request->validate(
            [
                'posted_by' =>'required',
                'post_date' => 'required',
                'post_description' => 'required',
                'post_type'=> 'required',
            ]
        );
        $post = Post::find($id);
        $post->posted_by = $request->posted_by;
        $post->post_date = $request->post_date;
        $post->post_description = $request->post_description;
        $post->post_type = $request->post_type;
        $post->save();
        return redirect()->back()->with('create_notice',"Notice is published Successfully!!");

    }
    public function deletePost($id){
        $post =Post::find($id);
        $post->delete();
        return redirect()->back()->with('delete_post',"Post is deleted Successfully!");
        return "Post is deleted successfully!";
    }
    public function viewSiteAdminProfile(){
        return view('SiteAdmin.siteAdminProfilePage');
    }



    public function updateProfilePhoto(Request $request){
        $request->validate([
           'image' => 'required',
        ]);
        $user = User::find(auth()->user()->id);
        $file = $request->image;
        $extention = $file->getClientOriginalExtension();
        $filename = 'images/'. time() . '.' .$extention;
        $file->move('images/',$filename);
        $user->profile_image = $filename;
        $user->save();
        return redirect()->back()->with('profile_image_updated','Profile Image Is Added Successfully!');
        //return "Profile Image is Updated Successfully";
    }
    public function updateContactNumber(Request $request){
        $request->validate([
           'contactNumber'=>'required|max:13|min:13',
        ]);
        $contact = new Contact();
        $contact->contactNumber =$request->contactNumber;
        $contact->save();
        return redirect()->back()->with('contact_updated','New Contact Number is updated Successfully!');

    }





}
