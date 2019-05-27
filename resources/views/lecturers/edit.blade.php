@extends('lecturers.layout')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit lecturer</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('lecturers.index') }}"> Back</a>
            </div>
        </div>
    </div>


    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    {!! Form::model($lecturer, ['method' => 'PATCH','route' => ['lecturers.update', $lecturer->id]]) !!}
        @include('lecturers.form')
    {!! Form::close() !!}


@endsection
