@extends('layouts.app')

@section('content')
@livewireStyles
    <div class="container-fluid mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-5">

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Student CRUD application</li>
                    </ol>
                </nav>

                <input type="text" name="search" wire:model="price" class="form-control" placeholder="Enter a search key to search students">

                <div class="card mt">
                    <div class="card-header d-flex justify-content-between">
                        <div>Students</div>
                        <a href="/students/create" class="btn btn-sm btn-primary">
                            Create Student
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="list-group">
                            @foreach($students as $student)
                                <a href="/students/{{$student['id']}}"
                                   class="list-group-item list-group-item-action d-flex justify-content-between">
                                    <div>{{$student['first_name']}} {{$student['last_name']}}</div>
                                    <div>{{$student['reg_no']}}</div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@livewireScripts
@endsection
