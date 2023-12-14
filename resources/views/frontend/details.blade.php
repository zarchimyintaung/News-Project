@extends('layouts.app')
@section('title','Home')

@section('content')

<!--Detail Start-->
<section id="details" class="py-5">
    <div class="container">
        <div class="row">
            <div id="detailsCarousel" class="carousel slide mt-5" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($news->images as $key => $image)
                        @if ($key == 0)
                        <div class="carousel-item active">
                            <img src="{{ asset('images/'.$image->image) }}" alt="...." class="d-block w-100" height="500px">
                        </div>

                        @else
                        <div class="carousel-item ">
                            <img src="{{ asset('images/'.$image->image) }}" alt="...." class="d-block w-100" height="500px">
                        </div>
                        @endif
                    @endforeach

                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#detailsCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#detailsCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <div class="col-12 my-3">
                <h1 class="text-dark text-uppercase fw-bold fs-2">{{$news->title}}</h1>
                <p class="text-dark">Category-{{$news->category->name}}</p>
                <small class="text-muted">
                    Date-{{Carbon\Carbon::parse($news->created_at)->format('d/m/Y')}}</small>
                <p class="lead">
                    {!! $news->description !!}
                </p>
            </div>
        </div>
    </div>
</section>
<!--Detail End-->

<!--Related Start-->
<section id="related_news">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center fw-bold fs-2 my-4">Related News</h2>
            </div>
            <div class="row g-4">
                @foreach ($related_news as $new)
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
</section>
<!--Related End-->

@endsection

