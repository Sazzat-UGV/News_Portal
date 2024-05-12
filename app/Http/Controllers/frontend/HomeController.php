<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Livetv;
use App\Models\Notice;
use App\Models\Post;
use App\Models\PrayerTime;
use App\Models\Video;

class HomeController extends Controller
{
    public function homePage()
    {
        //  breaking news
        $breaking_news = Post::where('breaking_news', 1)->where('status', 1)->latest('id')->limit(20)->select('title_en', 'title_bn')->get();

        // notice
        $notice = Notice::select('id', 'notice_bn', 'notice_en', 'active')->first();

        // first_sections
        $first_sections = Post::with(['category:id,category_name_bn,category_name_en,category_name_slug_bn,category_name_slug_en', 'user:id,name'])->where('status', 1)->where('first_section', 1)->latest('id')->select('id', 'category_id', 'title_slug_en', 'title_slug_bn', 'user_id', 'title_en', 'title_slug_en', 'title_slug_bn', 'title_bn', 'thumbnail', 'created_at')->limit(2)->get();

        // firstsection big thumbnail
        $firstSectionBigThumbnail = Post::with(['category:id,category_name_bn,category_name_en,category_name_slug_bn,category_name_slug_en', 'user:id,name'])->where('status', 1)->where('first_section_thumbnail', 1)->latest('id')->select('id', 'category_id', 'user_id', 'title_en', 'title_bn', 'title_slug_en', 'title_slug_bn', 'title_slug_en', 'title_slug_bn', 'thumbnail', 'created_at')->first();

        // favourite post
        $favourites = Post::with(['category:id,category_name_bn,category_name_en,category_name_slug_bn,category_name_slug_en', 'user:id,name'])->where('status', 1)->inRandomOrder()->select('id', 'category_id', 'user_id', 'title_slug_en', 'title_slug_bn', 'title_en', 'title_bn', 'thumbnail', 'created_at')->limit(3)->get();

        // recent news
        $recent_news = Post::with(['category:id,category_name_bn,category_name_en,category_name_slug_bn,category_name_slug_en', 'user:id,name'])->where('status', 1)->latest('id')->select('id', 'category_id', 'user_id', 'title_en', 'title_bn', 'title_slug_en', 'title_slug_bn', 'thumbnail', 'created_at')->limit(3)->get();

        // first category items bangladesh
        $firstcategory = Category::where('status', 1)->select('id', 'category_name_en', 'category_name_bn', 'category_name_slug_bn', 'category_name_slug_en')->first();
        $firstcategorybigpost = Post::where('status', 1)->where('category_id', $firstcategory->id)->where('bigthumbnail', 1)->latest('id')->select('id', 'category_id', 'user_id', 'title_en', 'title_slug_en', 'title_slug_bn', 'title_bn', 'thumbnail', 'created_at', )->first();
        $firstcategorysmallpost = Post::where('status', 1)->where('category_id', $firstcategory->id)->where('bigthumbnail', 0)->latest('id')->select('id', 'category_id', 'user_id', 'title_slug_en', 'title_slug_bn', 'title_en', 'title_bn', 'thumbnail', 'created_at', )->limit(4)->get();

        // second category items sports
        $secondcategory = Category::where('status', 1)->select('id', 'category_name_en', 'category_name_bn', 'category_name_slug_bn', 'category_name_slug_en', 'category_name_slug_bn', 'category_name_slug_en')->skip(1)->first();
        $secondcategorypost = Post::where('status', 1)->where('category_id', $secondcategory->id)->where('bigthumbnail', 0)->latest('id')->select('id', 'category_id', 'user_id', 'title_slug_en', 'title_slug_bn', 'title_en', 'title_bn', 'thumbnail', 'created_at')->limit(3)->get();

        // third category items international
        $thirdcategory = Category::where('status', 1)->select('id', 'category_name_en', 'category_name_bn', 'category_name_slug_bn', 'category_name_slug_en')->skip(2)->first();
        $thirdcategorybigpost = Post::where('status', 1)->where('category_id', $thirdcategory->id)->where('bigthumbnail', 1)->latest('id')->select('id', 'category_id', 'user_id', 'title_slug_en', 'title_slug_bn', 'title_en', 'title_bn', 'thumbnail', 'created_at', )->first();
        $thirdcategorysmallpost = Post::where('status', 1)->where('category_id', $thirdcategory->id)->where('bigthumbnail', 0)->latest('id')->select('id', 'category_id', 'user_id', 'title_slug_en', 'title_slug_bn', 'title_en', 'title_bn', 'thumbnail', 'created_at', )->limit(4)->get();

        // forth category items business
        $forthcategory = Category::where('status', 1)->select('id', 'category_name_en', 'category_name_bn', 'category_name_slug_bn', 'category_name_slug_en')->skip(3)->first();
        $forthcategorypost = Post::where('status', 1)->where('category_id', $forthcategory->id)->where('bigthumbnail', 0)->latest('id')->select('id', 'category_id', 'user_id', 'title_en', 'title_slug_en', 'title_slug_bn', 'title_bn', 'thumbnail', 'created_at', )->limit(3)->get();

        // fifth category items intertainment
        $fifthcategory = Category::where('status', 1)->select('id', 'category_name_en', 'category_name_bn', 'category_name_slug_bn', 'category_name_slug_en')->skip(4)->first();
        $fifthcategorypost = Post::where('status', 1)->where('category_id', $fifthcategory->id)->latest('id')->select('id', 'category_id', 'user_id', 'title_en', 'title_bn', 'title_slug_en', 'title_slug_bn', 'thumbnail', 'created_at')->limit(7)->get();

        // sixth category items health
        $sixthcategory = Category::where('status', 1)->select('id', 'category_name_en', 'category_name_bn', 'category_name_slug_bn', 'category_name_slug_en')->skip(5)->first();
        $sixthcategorypost = Post::where('status', 1)->where('category_id', $sixthcategory->id)->latest('id')->select('id', 'category_id', 'user_id', 'title_en', 'title_bn', 'title_slug_en', 'title_slug_bn', 'thumbnail', 'details_en', 'details_bn', 'created_at', )->limit(4)->get();
        $liveTV = Livetv::select('id', 'embed_code', 'active')->first();
        $prayerTime = PrayerTime::select('id', 'fajr', 'dhuhr', 'asr', 'maghrib', 'isha_a', 'jumu_ah', 'active')->first();

        // seventh category items science & technology
        $seventhcategory = Category::where('status', 1)->select('id', 'category_name_en', 'category_name_bn', 'category_name_slug_bn', 'category_name_slug_en')->skip(6)->first();
        $seventhcategorypost = Post::where('status', 1)->where('category_id', $seventhcategory->id)->latest('id')->select('id', 'category_id', 'user_id', 'title_en', 'title_bn', 'title_slug_en', 'title_slug_bn', 'thumbnail', 'created_at')->limit(4)->get();

        // video gallery
        $videos = Video::where('status', 1)->latest('id')->select('id', 'title_en', 'title_bn', 'video_link', 'thumbnail', 'created_at')->limit(7)->get();

        // all country news
        $allcountries = Post::with(['category:id,category_name_bn,category_name_en,category_name_slug_bn,category_name_slug_en', 'user:id,name'])->where('status', 1)->whereNotNull('division_id')->latest('id')->select('id', 'category_id', 'user_id', 'title_en', 'title_slug_en', 'title_slug_bn', 'title_bn', 'thumbnail', 'created_at')->limit(12)->get();

        return view('frontend.pages.home', compact(
            'breaking_news',
            'notice',
            'first_sections',
            'firstSectionBigThumbnail',
            'favourites',
            'recent_news',
            'firstcategory',
            'firstcategorybigpost',
            'firstcategorysmallpost',
            'secondcategory',
            'secondcategorypost',
            'thirdcategory',
            'thirdcategorybigpost',
            'thirdcategorysmallpost',
            'forthcategory',
            'forthcategorypost',
            'fifthcategory',
            'fifthcategorypost',
            'sixthcategory',
            'sixthcategorypost',
            'liveTV',
            'prayerTime',
            'seventhcategory',
            'seventhcategorypost',
            'videos',
            'allcountries',
        ));
    }
}
