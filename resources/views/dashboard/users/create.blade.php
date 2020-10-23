@extends('layouts.dashboard.app')

@section('content')

    <div>
        <h2>Users</h2>
    </div>

        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('dashboard.users.index')}}">Users</a></li>
            <li class="breadcrumb-item active">Add</li>
        </ul>


   <div class="row">
       <div class="col-md-12">
           <div class="tile mb-4">
               <form method="post" action="{{route('dashboard.users.store')}}">
                   @csrf
                   @method('post')

                   @include('dashboard.partials._errors')

                   <div class="form-group">
                       <label class="">Name</label>
                       <input type="text" name="name" class="form-control" value="{{old('name')}}">
                   </div>

                   <div class="form-group">
                       <label class="">Email</label>
                       <input type="email" name="email" class="form-control" value="{{old('email')}}">
                   </div>


                   <div class="form-group">
                       <label class="">Password</label>
                       <input type="password" name="password" class="form-control" >
                   </div>


                   <div class="form-group">
                       <label class="">Password Confirmation</label>
                       <input type="password" name="password_confirmation" class="form-control" >
                   </div>


                   <div class="form-group">
                       <label>Roles</label>
                       <select name="role_id" class="form-control">

                           @foreach($roles as $role)
                               <option value="{{$role->id}}">{{$role->name}}</option>
                           @endforeach

                       </select>
                       <a href="{{route('dashboard.roles.create')}}">Create rew role</a>
                   </div>



                   <div class="form-group">
                       <button type="submit"  class="btn btn-primary"><i class="fa fa-plus"></i> Add</button>
                   </div>

               </form>
           </div><!-- end of tile -->
       </div>
   </div>


@endsection
