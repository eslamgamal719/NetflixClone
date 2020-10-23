@extends('layouts.dashboard.app')

@section('content')

    <h2>Categories</h2>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('dashboard.categories.index')}}">Categories</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </nav>

    <div class="tile mb-4">
        <form method="post" action="{{route('dashboard.categories.update', $category->id)}}">
            @csrf
            @method('put')

            @include('dashboard.partials._errors')

            <input type="hidden" value="{{$category->id}}" name="category_id">


            <div class="form-group">
                <label class="">Name</label>
                <input type="text" name="name" class="form-control" value="{{$category->name}}">
            </div>

            <div class="form-group">
                <button type="submit"  class="btn btn-primary"><i class="fa fa-edit"></i> Edit</button>
            </div>

        </form>
    </div><!-- end of tile -->


@endsection
