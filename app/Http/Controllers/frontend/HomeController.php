<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Livetv;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   public function homePage(){
    $liveTV=Livetv::select('id','embed_code','active')->first();
    return view('frontend.pages.home',compact(
        'liveTV',
    ));
   }
}
