@extends('layouts.front.master')
@section('title','Details Page')
@section('content')
    <section class="site-section py-lg">
      <div class="container">
        
        <div class="row blog-entries element-animate">

          <div class="col-md-12 col-lg-8 main-content">
            <img src="{{ asset($post->image) }}" alt="Image" class="img-fluid mb-5">
             <div class="post-meta">
                        <span class="author mr-2">{{$post->author->name}}</span>&bullet;
                        <span class="mr-2">{{ date('M d, Y',strtotime($post->published_at))}}</span>
                      </div>
            <h1 class="mb-4">{{ $post->title}}</h1> <a class="category mb-5" href="#">{{$post->category->name}}</a>
           
            <div class="post-content-body">
             <p>{{$post->content}}</p>
            </div>

            <div class="pt-5">
              <h3 class="mb-5">6 Comments</h3>
              <ul class="comment-list">
                <li class="comment">
                  <div class="vcard">
                    <!-- <img src="images/person_1.jpg" alt="Image placeholder"> -->
                  </div>
                  <div class="comment-body">
                    <h3>Jean Doe</h3>
                    <div class="meta">January 9, 2018 at 2:21pm</div>
                    <p>Lorem ipsum dolor sit amet,</p>
                    <p><a href="#" class="reply rounded">Reply</a></p>
                  </div>
                </li>
              </ul>
              <!-- END comment-list -->
              
              <div class="comment-form-wrap pt-5">
                <h3 class="mb-5">Leave a comment</h3>
                <form action="#" class="p-5 bg-light">
                  <div class="form-group">
                    <label for="name">Name *</label>
                    <input type="text" class="form-control" id="name">
                  </div>
                  <div class="form-group">
                    <label for="message">Message</label>
                    <textarea name="" id="message" cols="30" rows="10" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <input type="submit" value="Post Comment" class="btn btn-primary">
                  </div>

                </form>
              </div>
            </div>

          </div>

          <!-- END main-content -->

          <div class="col-md-12 col-lg-4 sidebar">
	        @include('front.rightSidebar')
          </div>
          <!-- END sidebar -->

        </div>
      </div>
    </section>

    <section class="py-5">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="mb-3 ">Related Post</h2>
          </div>
        </div>
        <div class="row">
          	@foreach($related_posts as $post)
          <div class="col-md-6 col-lg-4">
            <a href="{{ route('post.details',$post->id)}}" class="a-block sm d-flex align-items-center height-md" style="background-image: url('{{ asset($post->image) }}'); ">
              <div class="text">
                <div class="post-meta">
                  <span class="category">{{$post->category->name}}</span>
                  <span class="mr-2">{{date('M d, Y', strtotime($post->published_at))}} </span> &bullet;
                </div>
                <h3>{{$post->title}}</h3>
              </div>
            </a>
          </div>
            @endforeach
        </div>
      </div>


    </section>
    <!-- END section -->
@endsection
