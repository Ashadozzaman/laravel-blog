@extends('layouts.admin.master')
@section('title','Show details')
@section('content')
    <div class="row">

        <div class="col-12 col-md-10 offset-md-1">
            <div class="col-12 grid-margin" id="doc-intro">
                <div class="card">
                    <div class="card-body">
                        <h3 class="mb-4 mt-4">{{ $post->title }}</h3>
                        <p class="card-subtitle">Category:
                            @foreach($categories as $category)
                                @if($category->id == $post->category_id) {{$category->name}} @endif
                            @endforeach
                        </p>
                        <h4>Author:
                            @foreach($authors as $author)
                                @if($author->id == $post->author_id) {{$author->name}} @endif
                            @endforeach
                        </h4>
                        <p class="card-subtitle">{{$post->status}}</p>
                        @if($post->image != null)
                            <p><img src="{{ asset($post->image) }}" alt=""></p>
                        @endif
                        <p><strong>{{$post->content }}</strong></p>
                        <div class="text-right">
                            <a href="{{ route('post.index') }}"><button class="btn btn-secondary">Back</button></a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    @endsection