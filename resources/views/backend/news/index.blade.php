@extends('layouts.admin')

@section('title','Dashboard')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">News Table</h4>
                    <a href="{{ route('news.create') }}" class="btn btn-primary">Add new News</a>
                </div>
                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        <svg viewbox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                        <strong>Success!</strong> {{ session('success') }}
                        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                        </button>
                    </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-responsive-md">
                            <thead>
                                <tr>
                                    <th style="width:80px;"><strong>#</strong></th>
                                    <th><strong>Title</strong></th>
                                    <th><strong>Category</strong></th>
                                    <th><strong>DATE</strong></th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>

                               @foreach ($news as $new)
                               <tr>
                                <td><strong>{{ $new->id }}</strong></td>
                                <td>{{ $new->title }}</td>
                                <td>{{ $new->category->name }}</td>
                                <td>{{ Carbon\Carbon::parse($new->created_at)->format('d-m-Y') }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-success light sharp" data-toggle="dropdown">
                                            <svg width="20px" height="20px" viewbox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('news.edit',['new' => $new]) }}">Edit</a>
                                            <a class="dropdown-item" href="{{ route('news.show',['new' => $new]) }}">Show</a>
                                            <a class="dropdown-item" href="{{ route('news.delete',['new' => $new]) }}">Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                               @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
