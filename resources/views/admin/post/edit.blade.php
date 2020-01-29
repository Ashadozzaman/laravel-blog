@extends('layouts.admin.master')
@section('title','Edit Post Page')
@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Post</h4>
                    <form class="forms-sample" action="{{ route('post.update',$post->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="exampleSelectGender">Category</label>
                            <select class="form-control" name="category_id" id="name">
                                @foreach($categories as $category)
                                    <option @if($category->id == $post->category_id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleSelectGender">Author</label>
                            <select class="form-control" name="author_id" id="name">
                                @foreach($authors as $author)
                                    <option @if($author->id == $post->author_id) selected @endif value="{{ $author->id }}">{{ $author->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" id="title" value="{{$post->title}}">
                        </div>

                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea class="form-control" name="content" id="content" rows="4">{{ $post->content }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Image upload</label>
                            <input type="file" name="image" id="image" class="file-upload-default">
                            <div class="input-group col-xs-12">
                                <input type="text" name="image" class="form-control file-upload-info" disabled placeholder="Upload Image">
                                <span class="input-group-append">
                                  <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                </span>
                            </div>
                            <img src="{{ asset($post->image) }}" width="50%" alt="">
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" @if($post->status == 'published') checked @endif class="form-check-input" name="status" id="published" value="published">
                                    Published
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" @if($post->status == 'unpublished') checked @endif class="form-check-input" name="status" id="unpublished" value="unpublished">
                                    Un-Published
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection