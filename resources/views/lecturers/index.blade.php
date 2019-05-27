@extends('lecturers.layout')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>lecturer Profile</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('lecturers.create') }}"> Create New lecturer</a>
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
            <th>Staff No</th>
            <th>Name</th>
            <th>Faculty</th>
            <th>Email</th>
            <th width="280px">Action</th>
        </tr>
    @foreach ($lecturers as $lecturer)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $lecturer->Name}}</td>
        <td>{{ $lecturer->Faculty}}</td>
        <td>{{ $student->Email}}</td>
        <td>
            <a class="btn btn-info" href="{{ route('lecturers.show',$lecturer->id) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('lecturers.edit',$lecturer->id) }}">Edit</a>
            {!! Form::open(['method' => 'DELETE','route' => ['lecturers.destroy', $lecturer->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
    </table>


    {!! $lecturers->links() !!}
@endsection
