@extends('layouts.admin.master')
@section('title','Create New Category')
@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Create New Category</h4>
                    <form class="forms-sample" action="{{ route('category.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="Name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Category Name">
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" id="description" rows="4"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection