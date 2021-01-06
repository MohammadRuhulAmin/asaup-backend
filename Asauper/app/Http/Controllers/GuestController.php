<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;
use App\Videolink;
class GuestController extends Controller
{
    public function index(){
        return view('Guest.index');
    }

    public function showVideos(){
    	$videos = Videolink::all();
    	return view('Guest.guestVideo',compact('videos'));
    }
    public function viewNotice(){
        $allNotice = Post::orderBy('id','desc')->get();
        return view('Guest.guestNotice',compact('allNotice'));
    }
}
