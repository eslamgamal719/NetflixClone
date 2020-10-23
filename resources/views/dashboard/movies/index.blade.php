@extends('layouts.dashboard.app')

@section('content')

    <h2>Movie</h2>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Movie</li>
        </ol>
    </nav>

    <div class="tile mb-4">
        <div class="row">
            <div class="col-12">

            <form action="">
              <div class="row">

                  <div class="col-4">
                      <div class="form-group">
                          <input type="text" name="search" autofocus class="form-control"  placeholder="search" value="{{request()->search}}">
                      </div>
                  </div>


                  <div class="col-4">
                      <div class="form-group">
                          <select name="category" class="form-control">
                              <option>All Categories</option>
                              @foreach($categories as $category)
                                  <option value="{{ $category->id }}" {{request()->category == $category->id ? 'selected' : ''}}>{{ $category->name }}</option>
                              @endforeach
                          </select>
                      </div>
                  </div>


                  <div class="col-4">
                      <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>

                      @if(auth()->user()->hasPermission('create_movies'))
                          <a href="{{route('dashboard.movies.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Add</a>
                      @else
                          <a href="#" disabled="" class="btn btn-primary"><i class="fa fa-plus"></i> Add</a>
                      @endif
                  </div>

              </div>
            </form>

            </div>
        </div> <!-- end of row -->

        <div class="row">
            <div class="col-md-12">

              @if($movies->count() > 0)
                <table class="table table-hover">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Categories</th>
                            <th>Year</th>
                            <th>Rating</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                            @foreach($movies as $index=>$movie)
                                <tr>
                                    <td>{{$index + 1}}</td>
                                    <td>{{$movie->name}}</td>
                                    <td>{{ $movie->description }}</td>
                                    <td>
                                        @foreach($movie->categories as $category)
                                            <h5 style="display: inline-block"><span class="badge badge-primary">{{$category->name}}</span></h5>
                                        @endforeach
                                    </td>
                                    <td>{{$movie->year}}</td>
                                    <td>{{$movie->rating}}</td>
                                    <td>
                                        @if(auth()->user()->hasPermission('update_movies'))
                                            <a href="{{route('dashboard.movies.edit', $movie->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>Edit</a>
                                        @else
                                            <a href="#" disabled="" class="btn btn-primary"><i class="fa fa-plus"></i> Edit</a>
                                        @endif

                                            @if(auth()->user()->hasPermission('delete_movies'))
                                                <form action="{{route('dashboard.movies.destroy', $movie->id)}}" method="post" style="display: inline-block">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger btn-sm delete" ><i class="fa fa-trash"></i>Delete</button>
                                                </form>                                            @else
                                                <a href="#" disabled="" class="btn btn-danger"><i class="fa fa-plus"></i> Delete</a>
                                            @endif

                                    </td>
                                </tr>
                            @endforeach

                          @else
                            <h4>Sorry, No data found</h4>
                          @endif

                    </tbody>
                </table>

                    {{$movies->appends(request()->query())->links()}}
            </div>
        </div>




    </div>

@endsection
