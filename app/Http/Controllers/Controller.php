<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Models\Setting;
use App\Models\Menu;
use App\Models\Category;
use App\Models\Post;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function __construct()
    {
        $setting = Setting::find('1');
        $menu = Menu::with('children')->where('parent', 0)->orderBy('view', 'asc')->get();
        $categorys = Category::orderBy('view', 'asc')->where('parent',0)->get();
        $RecentNews = Post::where('sort_by', 'News')->orderBy('id', 'desc')->take(5)->get();
        view()->share( [
            'setting'=>$setting,
            'menu'=>$menu,
            'categorys'=>$categorys,
            'RecentNews'=>$RecentNews,
        ]);
    }
}
