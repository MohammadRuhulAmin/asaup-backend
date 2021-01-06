<?php

use Illuminate\Support\Facades\Route;



// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','WelcomeController@index');
Auth::routes();

//
//Route::get('/home', 'HomeController@index')->name('home');


//Super Admin Panel

Route::get('/super_admin','SuperAdminController@index')
->name('superAdmin.index')->middleware('superAdmin','auth');

Route::get('/super_admin/Employee_page','SuperAdminController@employeePageView')->name('superAdmin.employeePage')->middleware('superAdmin','auth');

Route::get('/super_admin/User_information','SuperAdminController@viewRegisterInfo')->name('superAdmin.registerPage')->middleware('auth','superAdmin');


Route::get('/super_admin/User_information/Change_status_to_regular_user/{id}','SuperAdminController@toRegularUser')
->name('superAdmin.change.toRegularUser')->middleware('auth','superAdmin');


Route::get('/super_admin/User_information/Change_status_to_site_admin/{id}','SuperAdminController@toSiteAdmin')->name('superAdmin.change.toSiteAdmin')->middleware('auth','superAdmin');

Route::get('/super_admin/User_information/Change_status_to_guest_user/{id}','SuperAdminController@toGuestUser')->name('superAdmin.change.toGuestUser')
->middleware('auth','superAdmin');

Route::get('/super_admin/settings','SuperAdminController@settingsView')
->name('superAdmin.settings')->middleware('auth','superAdmin');








//site Admin Panel

Route::get('/site_admin','SiteAdminController@index')->name('siteAdmin.index')->middleware('siteAdmin','auth');
Route::get('/site_admin/create_navigation_menu','SiteAdminController@createMenu')->name('siteAdmin.create.nav')->middleware('auth','siteAdmin');
Route::post('/site_admin/store_navigation_menu','SiteAdminController@storeMenu')->name('siteAdmin.navmenu.store')->middleware('auth','siteAdmin');
Route::post('/site_admin/store_sub_navigation_menu','SiteAdminController@subMenuStore')
->name('siteAdmin.navmenu.subment.store')->middleware('auth','siteAdmin');
Route::post('/site_admin/delete_main_menu/{id}','SiteAdminController@deleteMainMenu')
->name('siteAdmin.deleteMainMenu')->middleware('auth','siteAdmin');


Route::get('/site_admin/change_password','SiteAdminController@viewChangePasswordPage')
->name('siteAdmin.changePassword.view')->middleware('auth','siteAdmin');

Route::post('/site_admin/change_password/updation','SiteAdminController@updatePassword')
->name('siteAdmin.changePassword.insert')->middleware('auth','siteAdmin');


Route::get('/site_admin/banner_panel','SiteAdminController@viewBannerPanel')->name('siteAdmin.bannerPanel')->middleware('auth','siteAdmin');

Route::post('/site_admin/banner_panel/upload_image','SiteAdminController@uploadBannerImages')
->name('siteAdmin.bannerImage.upload')->middleware('auth','siteAdmin');

Route::post('/site_admin/banner_panel/delete_banner/image_id/{id}','SiteAdminController@deleteBannerImage')->name('siteAdmin.bannerImage.Delete')->middleware('auth','siteAdmin');

Route::get('/site_admin/body_image_panel','SiteAdminController@viewBodyImagePanel')->name('siteAdmin.bodyImagePanel')->middleware('auth','siteAdmin');

Route::post('/site_admin/body_image/insert_image','SiteAdminController@bodyImageInsert')
->name('siteAdmin.bodyImage.Insert')->middleware('auth','siteAdmin');

Route::post('/site_admin/body_image/Delete=/{id}','SiteAdminController@deleteBodyImage')
->name('siteAdmin.bodyImage.Delete')->middleware('auth','siteAdmin');

Route::get('/site_admin/dynamic_text','SiteAdminController@viewDynamicTextPage')
->name('siteAdmin.dynamicTextEditInfo')->middleware('auth','siteAdmin');

Route::post('/site_admin/dynamic_text/save_about_website','SiteAdminController@saveAboutWebSite')
->name('siteAdmin.saveAboutWebSiteInformation')->middleware('auth','siteAdmin');


Route::post('/site_admin/dynamic_text/save_new_video','SiteAdminController@saveVideoLink')
->name('siteAdmin.uploadVideoLink')->middleware('auth','siteAdmin');

Route::post('/site_admin/dynamic_text/delete_video/{id}','SiteAdminController@deleteVideoLink')
->name('siteAdmin.deleteVideoLink')->middleware('auth','siteAdmin');


Route::get('/site_admin/website_committee','SiteAdminController@viewCommittee')
->name('siteAdmin.viewCommitteeSection')->middleware('auth','siteAdmin');

Route::post('/site_admin/website_committee/save_committee_member','SiteAdminController@saveMemberCommittee')->name('siteAdmin.saveCommitteeMember')->middleware('auth','siteAdmin');
Route::post('/site_admin/website_committee/delete_member/{id}','SiteAdminController@deleteMember')
->name('siteAdmin.deleteCommittee')->middleware('auth','siteAdmin');

Route::get('/site_admin/partner_view','SiteAdminController@viewpartnerPage')
->name('siteAdmin.partnersView')->middleware('auth','siteAdmin');

Route::post('/site_admin/partner_view/insert_new_partner','SiteAdminController@insertPartner')
->name('siteAdmin.partner.save')->middleware('auth','siteAdmin');

Route::post('/site_admin/partner_view/delete_Partner/{id}','SiteAdminController@deletePartner')
->name('siteAdmin.deletePartner')->middleware('auth','siteAdmin');

Route::get('/site_admin/services_view','SiteAdminController@viewServicePage')
->name('siteAdmin.services')->middleware('auth','siteAdmin');

Route::post('/site_admin/services_view/upload_service','SiteAdminController@uploadService')
->name('siteAdmin.uploadService')->middleware('auth','siteAdmin');

Route::post('/site_admin/service/delete_id/{id}','SiteAdminController@deleteService')
->name('siteAdmin.service.Delete')->middleware('auth','siteAdmin');

Route::get('/site_admin/create_notice','SiteAdminController@viewCreateNoticePage')
    ->name('siteAdmin.createNotice')->middleware('auth','siteAdmin');
Route::post('/site_admin/create_notice/save_post','SiteAdminController@savePost')
    ->name('siteAdmin.InsertNotice')->middleware('auth','siteAdmin');
Route::get('/site_admin/update_notice/notice_id=/{id}','SiteAdminController@viewEditNoticePage')
    ->name('siteAdmin.updateAnoc')->middleware('auth','siteAdmin');
Route::post('/site_admin/update_notice/notice_id=/{id}/update','SiteAdminController@updatePost')
    ->name('siteAdmin.updatePost')->middleware('auth','siteAdmin');
Route::post('/site_admin/notice/delete/{id}','SiteAdminController@deletePost')
    ->name('siteAdmin.deletePost')->middleware('auth','siteAdmin');

Route::get('/site_admin/change_photo','SiteAdminController@viewSiteAdminProfile')
    ->name('siteAdmin.changeImageForSiteAdmin')->middleware('auth','siteAdmin');
Route::post('/site_admin/update_profile_photo','SiteAdminController@updateProfilePhoto')
    ->name('siteAdmin.updateProfilePhoto_view')->middleware('auth','siteAdmin');

Route::post('/site_admin/update_contact_number','SiteAdminController@updateContactNumber')
    ->name('siteAdmin.updateContactNumber')->middleware('auth','siteAdmin');

//Guest Panel
Route::get('/guest_user','GuestController@index')->middleware('guestUser','auth');

Route::get('/view_guest_videos','GuestController@showVideos')->name('guest.allvideoLink');
Route::get('/view_notice','GuestController@viewNotice')->name('guest.viewNotice');

//Regular user

Route::get('/regular_user','UserController@index')
->name('regularUser.index')
->middleware('regularUser','auth');
