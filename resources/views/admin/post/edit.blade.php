@extends('layouts.admin.master')
@section('title','Edit Post Page')
@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Post</h4>
                    <form class="forms-sample" action="{{ route('post.update',1) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="exampleSelectGender">Category</label>
                            <select class="form-control" name="category" id="category">
                                <option selected="selected" value="news">News</option>
                                <option value="sports">Sports</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" id="title" value="Text title">
                        </div>

                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea class="form-control" name="content" id="content" rows="4">New post for this post</textarea>
                        </div>
                        <div class="form-group">
                            <label>Image upload</label>
                            <input type="file" name="image" id="image" class="file-upload-default">
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                                <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" aria-selected="selected" class="form-check-input" name="status" id="published" value="">
                                    Published
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="status" id="unpublished" value="">
                                    Un-Published
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Update</button>
                        <button class="btn btn-light">Cancel</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection