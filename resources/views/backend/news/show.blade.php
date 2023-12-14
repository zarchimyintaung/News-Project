@extends('layouts.admin')

@section('title','Show')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-6 col-sm-12">
                <ul class="list-group">
                    <li class="list-group-item active">
                        <h2>{{$new->title}}</h2>
                    </li>
                    <li class="list-group-item ">
                        <h2>{{$new->category->name}}</h2>
                    </li>
                    <li class="list-group-item ">
                        {{Carbon\Carbon::parse($new->created_at)->format('d-m-y')}}
                    </li>
                    <li class="list-group-item ">
                        {!! $new->description !!}
                    </li>
                </ul>
            </div>

            <div class="col-lg-12 col-md-6 col-sm-12 mt-5">
                <div class="bootstrap-carousel">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        {{-- @php
                            dd($new->images);
                        @endphp --}}
                        <ol class="carousel-indicators">
                            @if (count($new->images) > 0 || $new->images != null)
                                @foreach ($new->images as $key => $image)
                                <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key  }}" class="active"></li>
                                @endforeach
                            @endif
                        </ol>
                        <div class="carousel-inner">
                            @if (count($new->images) > 0 || $new->images != null)
                                @foreach ($new->images as $key => $image)
                                    @if ($key == 0)
                                    <div class="carousel-item active">
                                        <img class="d-block w-100" src="{{ asset('images'.'/'.$image->image)}}" alt="First slide">
                                    </div>

                                    @else
                                    <div class="carousel-item ">
                                        <img class="d-block w-100" src="{{ asset('images'.'/'.$image->image)}}" alt="First slide">
                                    </div>
                                    @endif
                                @endforeach
                            @endif


                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
