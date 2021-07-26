<?php

namespace App\Http\View\Composer;

use App\Models\admin\Blog;
use Illuminate\View\View;

class variable{

    public function compose(View $view)
    {
        $recent_blogs = Blog::where('Value_Status' , 2)->orderBy('id' , 'desc')->take(5)->get();

        $popular_blogs = Blog::where('Value_Status' , 2)->orderBy('views' , 'desc')->take(5)->get();
        $view->with(['recent_blogs' => $recent_blogs, 'popular_blogs' => $popular_blogs]);
    }
}