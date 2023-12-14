

@extends('layouts.admin')

@section('title','Dashboard')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Create Category</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ route('categories.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="name" class="form-control input-default " placeholder="Category Name">
                            </div>
                            @error('name')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                            @enderror
                            <div class="form-group">
                                <input type="text" name="icon" class="form-control input-rounded" placeholder="Category Icon">
                            </div>
                            @error('icon')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                            @enderror
                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
