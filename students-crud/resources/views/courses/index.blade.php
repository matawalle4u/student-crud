@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-5">

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Course Management</li>
                    </ol>
                </nav>

                <div class="card mt">
                    <div class="card-header d-flex justify-content-between">
                        <div>Courses</div>
                        <a href="/courses/create" class="btn btn-sm btn-primary">
                            Create Course
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="list-group">
                            @foreach($courses as $course)
                                <a href="/courses/{{$course['id']}}"
                                   class="list-group-item list-group-item-action d-flex justify-content-between">
                                    <div>{{$course['name']}}</div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
