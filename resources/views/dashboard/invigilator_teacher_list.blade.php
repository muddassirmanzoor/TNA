@extends('layouts.main')

@section('content')
    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <h4 class="page-title">Activate Teacher</h4>
                            </div>
                        </div>
                    </div>
    <!-- end page title -->
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
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card card-h-100">
                <div class="card-body">
                    <form  action="{{url('activate-teacher-login')}}" method="post">
                        @csrf
                        <input type="hidden" name="teacher_cnic" value="{{$teacher['st_cnic'] ?? ''}}">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12">
                                <div class="mb-3">
                                    <h3 class="header-title mb-3">Activation</h3>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12">
                                <div class="row">
                                    <div class="col-xl-3 col-lg-3">
                                        <div class="mb-3">
                                            <label class="form-label">Name</label>
                                            <p class="text-muted font-13">
                                                {{ $teacher['st_name'] ?? ''}}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3">
                                        <div class="mb-3">
                                            <label class="form-label">CNIC No</label>
                                            <p class="text-muted font-13">
                                                {{ $teacher['st_cnic'] ?? ''}}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3">
                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            <p class="text-muted font-13">
                                                {{$teacher['password'] ?? ''}}
                                            </p>
                                        </div>
                                    </div>
                                    @if(isset($teacher))
                                    <div class="col-xl-3 col-lg-3">
                                        <div class="mb-3">
                                            <button class="btn btn-primary" type="submit">Activate</button>
                                        </div>
                                    </div>
                                    @endif
                                </div><!--row end-->
                            </div> <!--col end-->
                        </div>
                    </form>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
        <!----------Show Table-------->
        <div class="col-xl-12 col-lg-12">
            <div class="card card-h-100">
                <div class="card-body">
                    <div class="mb-3">
                        <h3 class="header-title mb-3">Active Teachers List</h3>
                    </div>
                    <table id="datatable-buttons" class="table table-striped table-centered w-100"><!--  dt-responsive   nowrap-->
                        <thead>
                        <tr>
                            <th>Sr. No</th>
                            <th>Teacher Name</th>
                            <th>CNIC</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($activated_teachers))
                        @foreach($activated_teachers as $i => $activated_teacher)
                        <tr>
                            <td>{{$i+1}}</td>
                            <td>{{$activated_teacher['teacher']['st_name']}}</td>
                            <td>{{$activated_teacher['teacher']['st_cnic']}}</td>
                            <td>
                                <p class="text-success">Active</p>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!----------Show Table End-------->

    </div>
@endsection
