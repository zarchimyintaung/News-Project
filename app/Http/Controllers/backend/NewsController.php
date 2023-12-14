<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Image;
use App\Models\News;
use Illuminate\Auth\Events\Validated;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\NewAccessToken;

class NewsController extends Controller
{
    public function index(){
        $news = News::all();

        return view('backend.news.index',['news' => $news]);
    }

    public function create(){
        $categories = Category::all();
        return view('backend.news.create',['categories'=> $categories]);
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required',
            'description'=> 'required',
            'category_id' => 'required',
            'images' => 'required',
        ]);

        $news = new News;

        $news->title = $request->title;
        $news->description = $request->description;
        $news->category_id = $request->category_id;

        $news->save();

        $id = $news->id;
        foreach ($request->file('images') as $img) {
            $image = new Image;

            $image->news_id = $id;
            $filename = $img->hashName();
            $img->storeAs('news',$filename);

            $image->image = $filename;

            $news->images()->save($image);
        }
        return to_route('news.index')->with('success','News Create Successfully!');

    }

    public function show(News $new){
        return view('backend.news.show',['new' => $new]);

    }

    public function edit(News $new){
        $categories = Category::all();
        return view('backend.news.edit',['new' => $new,'categories'=> $categories]);
    }

    public function update(Request $request,News $new){
        $request->validate([
            'title' => 'required',
            'description'=> 'required',
            'category_id' => 'required',
            'images' => 'required',
        ]);

        $new->title = $request->title;
        $new->description = $request->description;
        $new->category_id = $request->category_id;

        $new->save();

        if($request->file('images')){
            $oldImage = Image::where('news_id',$new->id)->get() ?? [];

            foreach($oldImage  as $image){
                $image->delete();
                if(Storage::exists('images/'.$image->image)){
                    Storage::delete('images/'.$image->image);
                }
            }

            foreach ($request->file('images') as $img) {
                $image = new Image;

                $filename = $img->hashName();
                $img->storeAs('news',$filename);    

                $image->image = $filename;

                $new->images()->save($image);
            }

        }
        return to_route('news.index')->with('success','News Updated Successfully!');
    }

    public function delete(News $new){

        $oldImage = Image::where('news_id',$new->id)->get() ?? [];

        foreach($oldImage  as $image){
            if(Storage::exists('images/'.$image->image)){
                Storage::delete('images/'.$image->image);
            }
         $image->delete();
        }

        $new->delete();

        return to_route('news.index')->with('success','News Deleted Successfully!');
    }

}
