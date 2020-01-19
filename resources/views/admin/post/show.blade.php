@extends('layouts.admin.master')
@section('title','Show details')
@section('content')
    <div class="row">

        <div class="col-12 col-md-10 offset-md-1">
            <div class="col-12 grid-margin" id="doc-intro">
                <div class="card">
                    <div class="card-body">
                        <h3 class="mb-4 mt-4">Title</h3>
                        <p class="card-subtitle">News</p>
                        <p class="card-subtitle">Status</p>
                        <p>RoyalUI Admin is a responsive HTML template that is based on the CSS framework Bootstrap 4 and it is built with Sass. Sass compiler makes it easier to code and customize. If you are unfamiliar with Bootstrap or Sass, visit their
                            website and read through the documentation. All of Bootstrap components have been modified to fit the style of RoyalUI Admin and provide a consistent look throughout the template.</p>
                        <p>Before you start working with the template, we suggest you go through the pages that are bundled with the theme. Most of the template example pages contain quick tips on how to create or use a component which can
                            be really helpful when you need to create something on the fly.</p>
                        <p class="d-inline"><strong>Note</strong>: We are trying our best to document how to use the template. If you think that something is missing from the documentation, please do not hesitate to tell us about it. If you have any questions or issues regarding this theme please email us at <a class="d-inline text-info" href="mailto:info@templatewatch.com">info@templatewatch.com</a></p>
                        <div class="text-right">
                            <a href="{{ route('post.index') }}"><button class="btn btn-secondary">Back</button></a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    @endsection