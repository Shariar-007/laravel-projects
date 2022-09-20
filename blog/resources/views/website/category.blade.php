@extends('layouts.website')

@section('content')
    <div class="py-5 bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <span>Category</span>
            <h3>{{$category->name}}</h3>
              @if($category->description)
              <p>{{$category->description}}</p>
              @endif
          </div>
        </div>
      </div>
    </div>

    <div class="site-section bg-white">
      <div class="container">
        <div class="row">
         {{-- $bloghger --}}
          @foreach($posts as $post)
          <div class="col-lg-4 mb-4">
            <div class="entry2">
              <a href="single.html"><img src="{{route('website.post', ['slug' => $post->slug])}}" alt="Image" class="img-fluid rounded"></a>
              <div class="excerpt">

                @if($post->category)
                 <span class="post-category text-white bg-secondary mb-3">{{$post->category->name}}</span>
                @endif

              <h2><a {{route('website.post', ['slug' => $post->slug])}}>{{$post->title}}</a></h2>

              <div class="post-meta align-items-center text-left clearfix">
                @if($post->user)
                  <figure class="author-figure mb-0 mr-3 float-left">
                    <img src="{{asset($post->user->image)}}" alt="Image" class="img-fluid">
                  </figure>
                @endif
            
                <span class="d-inline-block mt-1">By <a href="#">Carrol Atkinson</a></span>
                <span>&nbsp;-&nbsp; {{$post->created_at->format("M d, Y")}}</span>
              </div>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.</p>
                <p><a href="#">Read More</a></p>
              </div>
            </div>
          </div>
          @endforeach
          

        </div>
        <div class="row text-center pt-5 border-top">
          <div class="col-md-12">
            <div class="custom-pagination">
              {{-- {{$ports->links()}} --}}
              {{-- <span>1</span>
              <a href="#">2</a>
              <a href="#">3</a>
              <a href="#">4</a>
              <span>...</span>
              <a href="#">15</a> --}}
            </div>
          </div>
      </div>
    </div>
@endsection
