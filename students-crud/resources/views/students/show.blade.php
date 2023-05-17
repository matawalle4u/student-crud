@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-5">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="/students">Student Management</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Student Info</li>
                    </ol>
                </nav>

                <div class="card mt-2">
                    <div class="card-header d-flex justify-content-between">
                        <div>Student Information</div>
                    </div>
                    <div class="card-body">
                        @isset($student)
                            <div class="list-group">
                                <div class="list-group-item">
                                    <b>First Name:</b> {{$student['first_name']}}
                                </div>
                                <div class="list-group-item">
                                    <b>Last Name:</b> {{$student['last_name']}}
                                </div>
                                <div class="list-group-item">
                                    <b>Registration Number:</b> {{$student['reg_no']}}
                                </div>
                            </div>

                            <div class="mt-3 text-end">
                                <a href="/students/{{$student['id']}}/edit" id="edit_std" class="btn btn-sm btn-primary">Edit</a>
                                <a href="/students/{{$student['id']}}/delete" id="delete_std" class="btn btn-sm btn-danger">Delete</a>
                            </div>
                        @else
                            <div class="alert alert-warning">
                                Such student does not exists
                            </div>
                        @endisset
                    </div>
                </div>
            </div>

            <div class="col-md-4" style="margin-top: 30px">
                <div class="card mt-2">
                    <div class="card-header">Student Courses</div>
                    <div class="card-body">
                        <div class="list-group">

                            @foreach($student_courses as $course)
                                <div class="list-group-item d-flex justify-content-between">
                                    <div>{{$course['name']}}-{{$course['code']}}</div>
                                    <div>
                                        <a href="/student-courses/{{$course['id']}}/delete"
                                           class="btn btn-sm btn-danger">Delete</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="card mt-2">
                    <div class="card-header">Add Student Course</div>
                    <div class="card-body">
                        <form action="/students/{{$student['id']}}/add-course" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-10">
                                    <select name="course_id" id="course_id" class="form-select">
                                        @foreach($courses as $course)
                                            <option value="{{$course['id']}}">
                                                {{$course['name']}} - {{$course['code']}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-1">
                                    <button type="submit" class="btn btn-primary">Add</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
