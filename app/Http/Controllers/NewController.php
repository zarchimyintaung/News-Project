<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class NewController extends Controller
{
    public function index(){
        $news = News::all();
        $categories = Category::all();
        return view('frontend.news',compact('news','categories'));
    }

    public function show($id){
        $news = News::find($id);
        $cat_id = $news->category->id;

        $related_news = News::whereHas('category',function($query) use ($cat_id){
            $query->where('id',$cat_id);
        })->take(3)->get();

        return view('frontend.details',compact('news','related_news'));

    }

    public function filter(Request $request){
        $cat_id = $request->cat_id;
        $date = $request->date;

        if($cat_id == 'All'){
            $news = News::whereDate('created_at',$date)->get();
        }
        else{
            $news = News::whereHas('category',function($query) use ($cat_id){
                $query->where('id',$cat_id);
            })->orWhere('created_at',$date)->get();
        }

        $categories = Category::all();

        return view('frontend.filter',compact('news','categories'));
    }


    public function search(Request $request){

        $news = News::where('title','LIKE','%'.$request->title.'%')->get();
        $categories = Category::all();
        return view('frontend.search',compact('news','categories'));
    }
}
