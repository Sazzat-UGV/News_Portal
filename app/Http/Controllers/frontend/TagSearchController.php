<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Ads;
use App\Models\Post;
use Illuminate\Http\Request;

class TagSearchController extends Controller
{
    public function tagAllPost(Request $request, $slug)
    {
        $search_results = Post::where(function ($query) use ($slug) {
            $query->where('tags_en', 'LIKE', '%' . $slug . '%')
                ->orWhere('tags_bn', 'LIKE', '%' . $slug . '%');
        })->latest('id')->paginate(3);

        // popular tags
        $populartags = Post::select('id', 'tags_en', 'tags_bn')->inRandomOrder()->limit(11)->get();

        // recent news
        $recent_news = Post::with(['category:id,category_name_bn,category_name_en,category_name_slug_bn,category_name_slug_en', 'user:id,name'])->where('status', 1)->inRandomOrder()->select('id', 'category_id', 'user_id', 'title_en', 'title_bn', 'title_slug_en', 'title_slug_bn', 'thumbnail', 'created_at', 'post_month')->latest('post_month')->limit(4)->get();

        // ads
        $ads7 = Ads::where('type', 'vertical')->select('id', 'link', 'ads', 'type')->skip(2)->first();
        return view('frontend.pages.all-tag-news', compact(
            'search_results',
            'populartags',
            'recent_news',
            'ads7'
        ));
    }
}
