@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">Student CRUD application</div>
                    <div class="card-body">
                        <div class="list-group">
                            <a href="/students" class="list-group-item list-group-item-action">
                                Student Management
                            </a>
                            <a href="/courses" class="list-group-item list-group-item-action">
                                Course Management
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
