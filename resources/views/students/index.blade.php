@extends('master.admin.master')

@section('body')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Student Information</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('students.create') }}"> Add New</a>
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
            <th>No</th>
            <th>Image</th>
            <th>Name</th>

            <th width="280px">Action</th>
        </tr>
        @foreach ($student as $student)
            <tr>
                <td>{{ ++$i }}</td>
                <td><img src="{{asset('student-images/'.$student->image)}}" alt="" width="100px" height="100"></td>
                <td>{{ $student->name }}</td>

                <td>
                    <form action="{{ route('students.destroy',$student->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('students.show',$student->id) }}">View</a>

                        <a class="btn btn-primary" href="{{ route('students.edit',$student->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

{{--    {!! $student->links() !!}--}}

@endsection
