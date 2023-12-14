<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $categories = Category::all();

        $latest_news = News::orderby('created_at','DESC')->take(6)->get();
        return view('frontend.home',compact('categories','latest_news'));
    }

    public function newsByCat($id){
        $category = Category::find($id);

        return view('frontend.cat-by-news',compact('category'));
    }
}
