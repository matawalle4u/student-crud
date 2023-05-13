@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-5">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="/students">Student Management</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create</li>
                    </ol>
                </nav>

                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div>Create Student</div>
                    </div>
                    <div class="card-body">
                        <form action="/students" method="post">
                            @csrf

                            <div class="mb-2">
                                <label for="first_name" class="text-muted">First Name</label>
                                <input id="first_name" name="first_name" type="text"
                                       value="{{old('first_name')}}"
                                       class="form-control @error('first_name') is-invalid @enderror">
                                @error('first_name')
                                <span class="invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label for="last_name" class="text-muted">Last Name</label>
                                <input id="last_name" name="last_name" type="text"
                                       value="{{old('last_name')}}"
                                       class="form-control @error('last_name') is-invalid @enderror">
                                @error('last_name')
                                <span class="invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label for="reg_no" class="text-muted">Code</label>
                                <input id="reg_no" name="reg_no" type="text"
                                       value="{{old('reg_no')}}"
                                       class="form-control @error('reg_no') is-invalid @enderror">
                                @error('reg_no')
                                <span class="invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="text-end mt-2">
                                <button class="btn btn-primary">Create Student</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
