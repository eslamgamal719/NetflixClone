@extends('layouts.dashboard.app')

@section('content')

    <div>
        <h2>Role</h2>
    </div>

        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('dashboard.users.index')}}">Role</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ul>


    <div class="row">
        <div class="col-md-12">
            <div class="tile mb-4">
                <form method="post" action="{{route('dashboard.users.update', $user->id)}}">
                    @csrf
                    @method('put')

                    @include('dashboard.partials._errors')

                    <input type="hidden" value="{{$user->id}}" name="role_id">

                    <div class="form-group">
                        <label class="">Name</label>
                        <input type="text" name="name" class="form-control" value="{{$user->name}}">
                    </div>

                    <div class="form-group">
                        <label class="">Email</label>
                        <input type="email" name="email" class="form-control" value="{{$user->email}}">
                    </div>


                    <div class="form-group">
                        <label>Roles</label>
                        <select name="role_id" class="form-control">

                            @foreach($roles as $role)
                                <option value="{{$role->id}}"
                                {{$user->hasRole($role->name) ? 'selected' : ''}}
                                >{{$role->name}}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="form-group">
                        <button type="submit"  class="btn btn-primary"><i class="fa fa-edit"></i> Edit</button>
                    </div>

                </form>
            </div><!-- end of tile -->
        </div>
    </div>


@endsection
