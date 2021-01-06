<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;

class WelcomeController extends Controller
{
    public function index(){
    	$image = Image::where('image_type','banner_image')->get();
    	return view('website',compact('image'));
    }
}
