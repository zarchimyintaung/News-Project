@extends('layouts.app')
@section('title','Home')

@section('content')


    <!-- Latest Start -->

    <section id="categories" class="py-5" style="background: #f4f4f4;">
        <div class="container">
            <div class="row">
                <div class="col-12 my-3">
                    <h1 class="text-center text-dark text-uppercase fw-bold fs-2">{{$category->name}}</h1>
                </div>
                <div class="col-12">
                    <div class="row g-4">
                        @foreach ($category->newses as $new)
                        <div class="col-md-4">
                            <div class="card border-0 shadow-lg">
                                <img src="{{ asset('images/'.$new->images[0]->image) }}" alt="" class="card-image-top p-2" width="100%" height="200px">
                                <div class="card-body">
                                    <a href="" class="text-decoration-none text-dark">
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
