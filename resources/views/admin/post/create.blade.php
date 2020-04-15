@extends('layouts.admin.master')
@section('title','Create Post Page')
@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Create Post</h4>
                    <form class="forms-sample" action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                       @include('admin.post._form')
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection