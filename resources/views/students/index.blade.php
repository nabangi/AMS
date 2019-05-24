@extends('layout')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Student Profile</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('students.create') }}"> Create New student</a>
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>Admission No</th>
            <th>Name</th>
            <th>Course</th>
            <th width="280px">Action</th>
        </tr>
    @foreach ($students as $student)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $student->title}}</td>
        <td>{{ $student->body}}</td>
        <td>
            <a class="btn btn-info" href="{{ route('students.show',$student->id) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('students.edit',$student->id) }}">Edit</a>
            {!! Form::open(['method' => 'DELETE','route' => ['students.destroy', $student->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
    </table>


    {!! $students->links() !!}
@endsection
