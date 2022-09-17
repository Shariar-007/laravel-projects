@extends('layouts.admin')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tag Edit Page</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('website')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('tag.index')}}">Tag List</a></li>
                    <li class="breadcrumb-item active">Edit Tag</li>
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
                            <h3 class="card-title">Edit Tag - {{$tag->name}}</h3>
                            <a href="{{route('tag.index')}}" class="btn btn-primary">Go Back to Tag List</a>
                        </div>
                    </div> 

                    <div class="card-body p-0">
                        <div class="row-">
                            <div class="col-12 col-lg-6 offset-lg-3 col-md-8 offset-md-2">
                                <form action="{{route('tag.update', [$tag->id])}}" method="POST">
                                    @csrf
                                    @method("PUT")
                                    <div class="card-body">
                                        @include('includes.errors')
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tag Name</label>
                                             <input type="text" name=name class="form-control" placeholder="Enter name" value="{{$tag->name}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                                name="description">{{$tag->description}}</textarea>
                                        </div>
                                    </div>

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Update Tag</button>
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