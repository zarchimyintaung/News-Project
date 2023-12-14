@extends('layouts.app')
@section('title','Home')

@section('content')
<!--Filter Sart -->
<section id="filter" class="mt-5 d-flex justify-content-center align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 mx-auto" style="z-index:1">
                <h2 class="text-center fw-bold fs-2 text-uppercase text-light my-3">What you want to find?</h2>
                <form action="{{route('news.filter')}}">
                    <div class="mb-3">
                        <select name="cat_id" id="" class="form-select mb-3">
                            <option value="All">All Category</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <input type="date" class="form-control" name="date" placeholder="Seach By Date">
                    </div>
                    <div class="mb-3 text-center">
                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!--Filter End -->

<!--All New Sart -->
<section id="news" class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 my-3">
                <h2 class="text-uppercase fw-bold fs-2">All News</h2>
                <p class="text-muted">Date-{{Carbon\Carbon::now()->format('d/m/Y')}}</p>
            </div>
        </div>
        <div class="row g-4">
            @foreach ($news as $new)
            <div class="col-md-4">
                <div class="card border-0 shadow-lg">
                    <img src="{{ asset('images/'.$new->images[0]->image) }}" alt="" class="card-image-top p-2" width="100%" height="200px">
                    <div class="card-body">
                        <a href="{{route('news.details',['id'=> $new->id])}}" class="text-decoration-none text-dark">
                            <h3>{{$new->title}}</h3>
                            <p class="text-muted">
                                {!! $new->description !!}
                            </p>
                            <small class="text-muted">
                                {{Carbon\Carbon::parse($new->created_at)->format('d/m/Y')}}
                            </small>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!--All New End -->

@endsection
