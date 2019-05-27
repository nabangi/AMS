@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="content">
                        <div class="title m-b-md">
                            Academic Management System
                        </div>

                        <div class="links">
                            <a href="{{ route('courses') }}">Courses</a>
                            <a href="{{ route('students') }}">Students</a>
                          
                        </div>
                    </div>
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
