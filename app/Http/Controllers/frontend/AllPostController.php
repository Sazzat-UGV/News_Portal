<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\SubCategory;

class AllPostController extends Controller
{
    public function categoryAllPost($slug)
    {
        $category = Category::where('category_name_slug_bn', $slug)->orWhere('category_name_slug_en', $slug)->first();

        $posts = Post::with(['category:id,category_name_bn,category_name_en,category_name_slug_bn,category_name_slug_en', 'subcategory:id,category_id,subcategory_name_bn,subcategory_name_en', 'user:id,name'])->where('category_id', $category->id)->where('status', 1)->select('id', 'category_id', 'subcategory_id', 'user_id', 'title_en', 'title_slug_en', 'title_bn', 'title_slug_bn', 'thumbnail', 'created_at')->latest('id')->paginate(16);

        $postcategory = Post::with(['category:id,category_name_bn,category_name_en,category_name_slug_bn,category_name_slug_en', 'subcategory:id,category_id,subcategory_name_bn,subcategory_name_en'])->where('category_id', $category->id)->where('status', 1)->select('id', 'category_id', 'subcategory_id')->first();

        return view('frontend.pages.all-news', compact(
            'posts',
            'postcategory',
        ));
    }

    public function subCategoryAllPost($category, $subcategory)
    {
        $category = Category::where('category_name_slug_bn', $category)->orWhere('category_name_slug_en', $category)->first();

        $subcategory = SubCategory::where('subcategory_name_slug_bn', $subcategory)->orWhere('subcategory_name_slug_en', $subcategory)->first();

        $posts = Post::with(['category:id,category_name_bn,category_name_en,category_name_slug_bn,category_name_slug_en', 'subcategory:id,category_id,subcategory_name_bn,subcategory_name_en', 'user:id,name'])->where('subcategory_id',
            $subcategory->id)->where('status', 1)->select('id', 'category_id', 'subcategory_id', 'user_id', 'title_en', 'title_slug_en', 'title_bn', 'title_slug_bn', 'thumbnail', 'created_at')->latest('id')->paginate(16);

        $postcategory = Post::with(['category:id,category_name_bn,category_name_en,category_name_slug_bn,category_name_slug_en', 'subcategory:id,category_id,subcategory_name_bn,subcategory_name_en'])->where('category_id', $category->id)->where('status', 1)->select('id', 'category_id', 'subcategory_id')->first();

        return view('frontend.pages.all-news', compact(
            'posts',
            'postcategory',
            'subcategory',
        ));
    }

    public function countryAllPost()
    {
        $posts = Post::with(['category:id,category_name_bn,category_name_en,category_name_slug_bn,category_name_slug_en', 'user:id,name'])->where('status', 1)->whereNotNull('division_id')->latest('id')->select('id', 'category_id', 'user_id', 'title_en', 'title_slug_en', 'title_slug_bn', 'title_bn', 'thumbnail', 'created_at')->paginate(16);

        return view('frontend.pages.all-news', compact(
            'posts',
        ));
    }
}
