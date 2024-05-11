<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;

class PostDetailsController extends Controller
{
    public function postDetail($slug)
    {
        // post details
        $postdetails = Post::with(['category:id,category_name_bn,category_name_en', 'subcategory:id,category_id,subcategory_name_bn,subcategory_name_en', 'user:id,name', 'division:id,division_name_bn,division_name_en', 'district:id,division_id,district_name_bn,district_name_en'])->where('title_slug_en', $slug)->orWhere('title_slug_bn', $slug)->first();

        // recent news
        $recent_news = Post::with(['category:id,category_name_bn,category_name_en', 'user:id,name'])->where('status', 1)->inRandomOrder()->select('id', 'category_id', 'user_id', 'title_en', 'title_bn', 'title_slug_en', 'title_slug_bn', 'thumbnail', 'created_at', 'post_month')->latest('post_month')->limit(4)->get();

        // popular tags
        $populartags = Post::select('id', 'tags_en', 'tags_bn')->inRandomOrder()->limit(11)->get();

        // releted_post
        $releted_post = Post::with(['category:id,category_name_bn,category_name_en', 'user:id,name'])->where('status', 1)->whereNot('title_slug_en', $slug)->orWhereNot('title_slug_bn', $slug)->inRandomOrder()->select('id', 'category_id', 'user_id', 'title_en', 'title_bn', 'title_slug_en', 'title_slug_bn', 'thumbnail', 'created_at', 'post_month')->latest('post_month')->limit(8)->get();

        // releted_tag
        $releted_tags = Post::select('id', 'tags_en', 'tags_bn', 'title_slug_en', 'title_slug_bn')->whereNot('title_slug_en', $slug)->orWhereNot('title_slug_bn', $slug)->inRandomOrder()->limit(4)->get();

        return view('frontend.pages.post-details', compact(
            'postdetails',
            'recent_news',
            'populartags',
            'releted_post',
            'releted_tags'
        ));
    }
}
