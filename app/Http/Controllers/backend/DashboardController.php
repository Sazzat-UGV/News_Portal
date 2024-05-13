<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Ads;
use App\Models\Category;
use App\Models\District;
use App\Models\Division;
use App\Models\Post;
use App\Models\SubCategory;
use App\Models\User;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $category = Category::count();
        $subcategory = SubCategory::count();
        $division = Division::count();
        $district = District::count();
        $total_post = Post::count();
        $active_post = Post::where('status', 1)->count();
        $ads = Ads::count();
        $user = User::count();

        return view('backend.pages.dashboard', compact(
            'category',
            'subcategory',
            'division',
            'subcategory',
            'district',
            'total_post',
            'active_post',
            'ads',
            'user'
        ));
    }
}
