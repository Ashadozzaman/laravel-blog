@extends('layouts.admin.master')
@section('title','List of User')
@section('content')
    <div class="row">

        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <a class="card-body">
                    <h4 class="card-title">List of User</h4>
                    <form class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>
                                    ID
                                </th>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Action
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>
                                    {{ $user->id }}
                                </td>
                                <td>
                                    {{ $user->name }}
                                </td>
                                <td>
                                   {{ $user->email }}
                                </td>
                                <td>
                                    <a class="btn btn-warning btn-sm" href="{{ route('user.edit',$user->id) }}">Edit</a>
                                    <form class="d-inline-block" action="{{ route('user.destroy',$user->id) }}" method="post">
                                        @csrf
                                        @method('delete')

                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Are you delete this?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach

                            </tbody>
                        </table>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection