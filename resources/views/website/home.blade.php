@extends('master.front.master')
@section('title')
    User Page
@endsection
@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>Student Result Entry</h2>
                        </div>
                    </div>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{route('new-student')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Name:</strong>
                                <input type="text" name="name" class="form-control" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Image:</strong>
                                <input type="file" name="file" class="form-control-file" placeholder="image">
                            </div>
                        </div>

{{--                           selected --}}

                        <div class="col-sm-5">
                            <label class="col-form-label">Subject</label>
                            <select name="subject" class="form-control text-center"
                                    id="">
                                <option>Bangla</option>
                                <option>English</option>
                            </select>
                        </div>

                        <div class="col-sm-5">
                            <label for="inputNumber" class="form-label">Number</label>
                            <input type="number" name="number" class="form-control" id="inputCity">
                        </div>
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-primary">Add More</button>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                </form>

                </div>
            </div>
        </div>
    </div>

@endsection

