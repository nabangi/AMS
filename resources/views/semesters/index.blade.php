@extends('semesters.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Semesters</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('semesters.create') }}"> Start New semester</a>
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
            <th>code</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($semesters as $semester)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $semester->Start_Date }}</td>
            <td>{{ $semester->End_Date }}</td>
            <td>{{ $semester->Details }}</td>
            <td>
                <form action="{{ route('semesters.destroy',$semester->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('semesters.show',$semester->id) }}">Show</a>

                    <a class="btn btn-primary" href="{{ route('semesters.edit',$semester->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $semesters->links() !!}
      @endsection
