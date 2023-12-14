@extends('layouts.app')
@section('title','Home')

@section('content')

    <!-- Landing Start -->
    <section id="landing" class="py-5 bg-dark mt-5">
        <div class="container">
            <div class="row" style="min-height: 50vh;">
                <div class=" col-md-6 d-flex flex-column g-4 justify-content-center align-items-start">
                    <h1 class="text-light"><span class="text-primary">NEWS</span></h1>
                    <p class="lead text-light">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam saepe, recusandae iusto autem maxime repellat?
                    </p>
                    <a href="{{route('news')}}" class="btn btn-primary w-25">All News</a>
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('assets/frontend/images/1.svg') }}" alt="" class="img-fluid p-4">
                </div>
            </div>
        </div>
    </section>
    <!-- Landing End -->

    <!-- Categories Start -->

    <section id="categories" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 my-3">
                    <h1 class="text-center text-dark text-uppercase fw-bold fs-2">All Categories</h1>
                </div>
                <div class="col-12">
                    <section class="splide" aria-label="Basic Structure Example">
                        <div class="splide__track">
                          <ul class="splide__list">
                                @foreach ($categories as $category)
                                <a href="{{route('news.cat',['id' => $category->id])}}" class="splide__slide">
                                    {!! $category->icon !!}
                                    <h2>{{$category->name}}</h2>
                                </a>
                                @endforeach
                          </ul>
                        </div>
                      </section>
                </div>
            </div>
        </div>
    </section>

    <!-- Categories End -->

    <!-- Latest Start -->

    <section id="categories" class="py-5" style="background: #f4f4f4;">
        <div class="container">
            <div class="row">
                <div class="col-12 my-3">
                    <h1 class="text-center text-dark text-uppercase fw-bold fs-2">Latest News</h1>
                </div>
                <div class="col-12">
                    <div class="row g-4">
                        @foreach ($latest_news as $new)
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
            </div>
        </div>
    </section>

     <!-- Latest End -->

@endsection
