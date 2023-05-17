@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-5">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="/courses">Course Management</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Course Info</li>
                    </ol>
                </nav>

                <div class="card mt-2">
                    <div class="card-header d-flex justify-content-between">
                        <div>Course Information</div>
                    </div>
                    <div class="card-body">
                        @isset($course)
                            <div class="list-group">
                                <div class="list-group-item">
                                    <b>Name: </b> {{$course['name']}}
                                </div>
                                <div class="list-group-item">
                                    <b>Code:</b> {{$course['code']}}
                                </div>
                            </div>

                            <div class="mt-3 text-end">
                                <a id="edit_course" href="/courses/{{$course['id']}}/edit" class="btn btn-sm btn-primary">Edit</a>
                                <a id="delete_course" href="/courses/{{$course['id']}}/delete" class="btn btn-sm btn-danger">Delete</a>
                            </div>
                        @else
                            <div class="alert alert-warning">
                                Such course does not exists
                            </div>
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
