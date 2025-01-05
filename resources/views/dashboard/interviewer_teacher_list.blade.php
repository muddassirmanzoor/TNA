@extends('layouts.main')

@section('content')
    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <h4 class="page-title">Search Teacher with CNIC</h4>
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
{{--    <div class="row">--}}
{{--        <div class="col-12">--}}
{{--            <div class="card">--}}
{{--                <div class="card-body" style="overflow: hidden;overflow-x: scroll;margin: 1.5rem;    padding: 0;">--}}
{{--                    <table id="datatable-buttons" class="table table-stripedw-100"><!--  dt-responsive   nowrap-->--}}
{{--                        <thead>--}}
{{--                        <tr>--}}
{{--                            <th>Sr. No</th>--}}
{{--                            <th>School Name</th>--}}
{{--                            <th>Teacher Name</th>--}}
{{--                            <th>CNIC</th>--}}
{{--                            <th>DOB</th>--}}
{{--                            <th>Qualification</th>--}}
{{--                            <th>Subject </th>--}}
{{--                            <th>Teacher Type</th>--}}
{{--                            <th>Interview</th>--}}
{{--                            <th>View</th>--}}
{{--                        </tr>--}}
{{--                        </thead>--}}
{{--                        <tbody>--}}
{{--                        @foreach($teachers as $i=>$teacher)--}}
{{--                        <tr style="{{ count($teacher['interview']) == 1 ? 'color: red;' : '' }}">--}}
{{--                            <td>{{$i+1}}</td>--}}
{{--                            <td>{{$teacher['s_name']}}({{$teacher['s_emis_code']}})</td>--}}
{{--                            <td>{{$teacher['st_name']}}</td>--}}
{{--                            <td>{{$teacher['st_cnic']}}</td>--}}
{{--                            <td>{{date('d-m-Y', strtotime($teacher['st_dob']))}}</td>--}}
{{--                            <td>{{$teacher['std_level']}}</td>--}}
{{--                            <td>{{$teacher['sts_name'] ?? 'General'}}</td>--}}
{{--                            <td>{{$teacher['std_name']}}</td>--}}
{{--                            <td>{{count($teacher['interview'])}}</td>--}}
{{--                            <td><a href="{{url('interview-form/'.($teacher['st_cnic']))}}"><i class="mdi mdi-eye-circle-outline"></i></a></td>--}}
{{--                        </tr>--}}
{{--                        @endforeach--}}
{{--                        </tbody>--}}
{{--                    </table>--}}
{{--                </div> <!-- end card body-->--}}
{{--            </div> <!-- end card -->--}}
{{--        </div><!-- end col-->--}}
{{--    </div>--}}
@endsection
