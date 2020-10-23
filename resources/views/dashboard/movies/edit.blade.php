@extends('layouts.dashboard.app')

@section('content')

    <div>
        <h2>Movies</h2>
    </div>

        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('dashboard.movies.index')}}">Movies</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ul>


    <div class="row">
        <div class="col-md-12">
            <div class="tile mb-4">
                <form id="movies__properties"
                      method="post"
                      action="{{route('dashboard.movies.update', ['movie' => $movie->id])}}"
                      enctype="multipart/form-data"
                >
                    @csrf
                    @method('put')

                    @include('dashboard.partials._errors')



                    {{-- Name --}}
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" id="movie__name" class="form-control" value="{{old('name', $movie->name)}}">
                    </div>


                    {{-- description --}}
                    <div class="form-group">
                        <label>Description</label>
                        <textarea type="text" name="description" class="form-control">{{old('description', $movie->description)}}</textarea>
                    </div>


                    {{-- Poster --}}
                    <div class="form-group">
                        <label>Poster</label>
                        <input type="file" name="poster" class="form-control">
                        <img src="{{ $movie->poster_path }}" style="width: 255px; height: 378px; margin-top: 10px;">
                    </div>


                    {{-- Image --}}
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control">
                        <img src="{{ $movie->image_path }}" style="width: 300px; height: 300px; margin-top: 10px;">
                    </div>


                    {{-- Categories --}}
                    <div class="form-group">
                        <label>Categories</label>
                        <select class="form-control select2" name="categories[]" multiple>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}"
                                    {{ in_array($category->id, $movie->categories->pluck('id')->toArray()) ? 'selected' : '' }}
                                >{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>


                    {{-- year --}}
                    <div class="form-group">
                        <label>Year</label>
                        <input type="text" name="year" class="form-control" value="{{old('year', $movie->year)}}">
                    </div>


                    {{-- Rating --}}
                    <div class="form-group">
                        <label>Rating</label>
                        <input type="number" min="1" name="rating" class="form-control" value="{{old('rating', $movie->rating)}}">
                    </div>


                    <div class="form-group">
                        <button type="submit"  class="btn btn-primary"><i class="fa fa-edit"></i> Edit</button>
                    </div>

                </form>
            </div><!-- end of tile -->
        </div>
    </div>


@endsection
