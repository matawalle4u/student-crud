@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-5">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="/courses">Course Management</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create</li>
                    </ol>
                </nav>

                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div>Create Course</div>
                    </div>
                    <div class="card-body">
                        <form action="/courses" method="post">
                            @csrf

                            <div class="mb-2">
                                <label for="name" class="text-muted">Name</label>
                                <input id="name" name="name" type="text"
                                       value="{{old('name')}}"
                                       class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                <span class="invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label for="code" class="text-muted">Code</label>
                                <input id="code" name="code" type="text"
                                       value="{{old('code')}}"
                                       class="form-control @error('code') is-invalid @enderror">
                                @error('code')
                                <span class="invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="text-end mt-2">
                                <button class="btn btn-primary">Create Course</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
