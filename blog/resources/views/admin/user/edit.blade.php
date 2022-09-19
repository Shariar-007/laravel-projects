@extends('layouts.admin')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">User Edit Page</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('website')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('user.index')}}">User List</a></li>
                    <li class="breadcrumb-item active">Edit User</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->


<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Edit User - {{$user->name}}</h3>
                            <a href="{{route('user.index')}}" class="btn btn-primary">Go Back to User List</a>
                        </div>
                    </div> 

                    <div class="card-body p-0">
                        <div class="row-">
                            <div class="col-12 col-lg-6 offset-lg-3 col-md-8 offset-md-2">
                                <form action="{{route('user.update', [$user->id])}}" method="POST">
                                    @csrf
                                    @method("PUT")
                                    <div class="card-body">
                                        @include('includes.errors')

                                        <div class="form-group">
                                            <label>User Name</label>
                                             <input type="text" name=name class="form-control" placeholder="Enter name" value="{{$user->name}}">
                                        </div>

                                        <div class="form-group">
                                            <label>User Email</label>
                                             <input type="email" name=email class="form-control" placeholder="Enter email" value="{{$user->email}}">
                                        </div>

                                        <div class="form-group">
                                            <label>User Password <small>Enter password if you want to change.</small></label>
                                             <input type="password" name=password class="form-control" placeholder="Enter password">
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-8">
                                                    <label for="image">User Image</label>
                                                    <div class="custom-file">
                                                        <input type="file" name="image" class="custom-file-input"
                                                            id="image">
                                                        <label class="custom-file-label" for="image">Choose file</label>
                                                    </div>
                                                </div>
                                                <div class="col-4 text-right d-flex align-items-center">
                                                    <div
                                                        style="max-width: 100px; max-height: 100px; overflow:hidden; margin-left: auto">
                                                        <img src="{{ asset($user->image) }}" class="img-fluid"
                                                            alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>User Description</label>
                                            <textarea class="form-control" rows="4" name="description">{{$user->description}}</textarea>
                                        </div>
                                    </div>

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Update User</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection