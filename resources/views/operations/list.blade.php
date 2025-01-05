@extends('layouts.main')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <a href="{{url('add-interviewer')}}" class="btn btn-primary mb-3">Add Interviewer</a>
                </div>
                <h4 class="page-title">Interviewer List</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body" style="overflow: hidden;overflow-x: scroll;margin: 1.5rem;    padding: 0;">
                    <table id="datatable-buttons" class="table table-stripedw-100"><!--  dt-responsive   nowrap-->
                        <thead>
                        <tr>
                            <th>Sr. No</th>
                            <th>Interviewer Name</th>
                            <th>CNIC</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $i =>$user)
                        <tr>
                            <td>{{$i+1}}</td>
                            <td>{{$user['name']}}</td>
                            <td>{{$user['cnic']}}</td>
                            <td>{{$user['role']}}</td>
                            <td>{{$user['status']}}</td>
                            <td><a href="{{url('edit-interviewer/'.$user['cnic'])}}"><i class="mdi mdi-pencil-outline"></i></a></td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
    <!-- end row-->
@endsection
