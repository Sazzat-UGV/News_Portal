<?php

namespace App\Http\Controllers\frontend;

use App\Models\Post;
use App\Models\Livetv;
use App\Models\Notice;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
   public function homePage(){
    $liveTV=Livetv::select('id','embed_code','active')->first();

    $notice=Notice::first();

    $firstSectionBigThumbnail=Post::with(['category:id,category_name_bn,category_name_en','user:id,name'])->where('status',1)->where('first_section_thumbnail',1)->latest('id')->select('id','category_id','user_id','title_en','title_bn','thumbnail','created_at')->first();

    $first_sections=Post::with(['category:id,category_name_bn,category_name_en','user:id,name'])->where('status',1)->where('first_section',1)->latest('id')->select('id','category_id','user_id','title_en','title_bn','thumbnail','created_at')->limit(2)->get();

    $recent_news=Post::with(['category:id,category_name_bn,category_name_en','user:id,name'])->where('status',1)->latest('id')->select('id','category_id','user_id','title_en','title_bn','thumbnail','created_at')->limit(3)->get();

    $favourites=Post::with(['category:id,category_name_bn,category_name_en','user:id,name'])->where('status',1)->inRandomOrder()->select('id','category_id','user_id','title_en','title_bn','thumbnail','created_at')->limit(3)->get();
    $countriesBig=Post::with(['category:id,category_name_bn,category_name_en','user:id,name'])->where('status',1)->whereNotNull('division_id')->where('bigthumbnail',1)->latest('id')->select('id','category_id','user_id','title_en','title_bn','thumbnail','created_at')->first();

    $countriesSmall=Post::with(['category:id,category_name_bn,category_name_en','user:id,name'])->where('status',1)->where('division_id',null)->latest('id')->select('id','category_id','user_id','title_en','title_bn','thumbnail','created_at')->limit(5)->get();

    return view('frontend.pages.home',compact(
        'liveTV',
        'notice',
        'firstSectionBigThumbnail',
        'first_sections',
        'recent_news',
        'favourites',
        'countriesSmall',
        'countriesBig',
    ));
   }
}
