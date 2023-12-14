

@extends('layouts.admin')

@section('title','Dashboard')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Create News</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ route('news.update',['new' => $new]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="title" value="{{$new->title}}" class="form-control input-default " placeholder="Title">
                            </div>
                            @error('title')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                            @enderror
                            <select name="category_id" id="category_id" class="form-control input-default my-3">
                                @foreach ($categories as $category)
                                @if ($category->id == $new->category->id)
                                    <option value="{{$category->id}} " selected>{{$category->name}}</option>
                                @else
                                    <option value="{{$category->id}} " >{{$category->name}}</option>
                                @endif

                                @endforeach
                            </select>
                            @error('category_id')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                            @enderror
                            <div class="form-group">
                                <input type="file" name="images[]" class="form-control input-default " placeholder="Image" multiple>
                            </div>
                            @error('images')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                            @enderror
                            <div class="row">
                                @foreach ($new->images as $image)
                                    <div class="col-md-3">
                                        <img src="{{ asset('images'.'/'.$image->image)}}" alt="" class="w-100 h-100">
                                    </div>
                                @endforeach
                            </div>
                            <textarea name="description" id="description" class="form-control input-default" placeholder="Description">{{$new->description}}</textarea>
                            @error('description')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                                @enderror
                            <button type="submit" class="btn btn-primary my-3">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection

@push('js')
<script>
      tinymce.init({
        selector: '#description',
      })
</script>
@endpush
