@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="row justify-content-center">
                <!--------------Row Start-------  filter-box-col----->
                <div class="col-lg-3">
                    <div class="card widget-flat">
                        <div class="card-header">
{{--                            <div class="dropdown float-end mt-1">--}}
{{--                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                                    <i class="mdi mdi-dots-vertical  text-white"></i>--}}
{{--                                </a>--}}
{{--                                <div class="dropdown-menu dropdown-menu-end">--}}
{{--                                    <!-- item-->--}}
{{--                                    <a href="#" class="dropdown-item">View Report</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <h5 class="text-muted  mt-1 mb-1">Total Teachers</h5>
                        </div>
                        <div class="card-body  pt-2 pb-2">
                            <div class="float-end">
                                <i class="mdi mdi-teach widget-icon"></i>
                            </div>
                            <h3 class="mt-0 mb-0">{{$count_data['teacher_count']}}</h3>
{{--                            <p class="mb-0 text-muted">--}}
{{--                                <span class="text-danger mr-5"><i class="mdi mdi-human-female"></i>3000</span>--}}
{{--                                <span class="text-success ml-5"><i class="mdi mdi-human-male"></i> 4000</span>--}}
{{--                            </p>--}}
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->
                <div class="col-lg-3">
                    <div class="card widget-flat">
                        <div class="card-header">
{{--                            <div class="dropdown float-end mt-1">--}}
{{--                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                                    <i class="mdi mdi-dots-vertical  text-white"></i>--}}
{{--                                </a>--}}
{{--                                <div class="dropdown-menu dropdown-menu-end">--}}
{{--                                    <!-- item-->--}}
{{--                                    <a href="#" class="dropdown-item">View Report</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <h5 class="text-muted  mt-1 mb-1">Total Invigilator</h5>
                        </div>
                        <div class="card-body  pt-2 pb-2">
                            <div class="float-end">
                                <i class="mdi mdi-teach widget-icon"></i>
                            </div>
                            <h3 class="mt-0 mb-0">{{$count_data['invigilator_count']}}</h3>
{{--                            <p class="mb-0 text-muted">--}}
{{--                                <span class="text-danger mr-5"><i class="mdi mdi-human-female"></i>3000</span>--}}
{{--                                <span class="text-success ml-5"><i class="mdi mdi-human-male"></i> 4000</span>--}}
{{--                            </p>--}}
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->
                <div class="col-lg-3">
                    <div class="card widget-flat">
                        <div class="card-header">
{{--                            <div class="dropdown float-end mt-1">--}}
{{--                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                                    <i class="mdi mdi-dots-vertical  text-white"></i>--}}
{{--                                </a>--}}
{{--                                <div class="dropdown-menu dropdown-menu-end">--}}
{{--                                    <!-- item-->--}}
{{--                                    <a href="#" class="dropdown-item">View Report</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <h5 class="text-muted  mt-1 mb-1">Total Interviewer</h5>
                        </div>
                        <div class="card-body  pt-2 pb-2">
                            <div class="float-end">
                                <i class="uil uil-file-check-alt widget-icon"></i>
                            </div>
                            <h3 class="mt-0 mb-0">{{$count_data['interviewer_count']}}</h3>
{{--                            <p class="mb-0 text-muted">--}}
{{--                                <span class="text-danger mr-5"><i class="mdi mdi-human-female"></i>3000</span>--}}
{{--                                <span class="text-success ml-5"><i class="mdi mdi-human-male"></i> 4000</span>--}}
{{--                            </p>--}}
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->
                <div class="col-lg-3">
                    <div class="card widget-flat">
                        <div class="card-header">
{{--                            <div class="dropdown float-end mt-1">--}}
{{--                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                                    <i class="mdi mdi-dots-vertical  text-white"></i>--}}
{{--                                </a>--}}
{{--                                <div class="dropdown-menu dropdown-menu-end">--}}
{{--                                    <!-- item-->--}}
{{--                                    <a href="#" class="dropdown-item">View Report</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <h5 class="text-muted  mt-1 mb-1">Active Invigilator</h5>
                        </div>
                        <div class="card-body  pt-2 pb-2">
                            <div class="float-end">
                                <i class="uil uil-file-check-alt widget-icon"></i>
                            </div>
                            <h3 class="mt-0 mb-0">{{$count_data['Active_invigilator']}}</h3>
{{--                            <p class="mb-0 text-muted">--}}
{{--                                <span class="text-danger mr-5"><i class="mdi mdi-human-female"></i>3000</span>--}}
{{--                                <span class="text-success ml-5"><i class="mdi mdi-human-male"></i> 4000</span>--}}
{{--                            </p>--}}
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->
                <div class="col-lg-3">
                    <div class="card widget-flat">
                        <div class="card-header">
{{--                            <div class="dropdown float-end mt-1">--}}
{{--                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                                    <i class="mdi mdi-dots-vertical  text-white"></i>--}}
{{--                                </a>--}}
{{--                                <div class="dropdown-menu dropdown-menu-end">--}}
{{--                                    <!-- item-->--}}
{{--                                    <a href="#" class="dropdown-item">View Report</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <h5 class="text-muted  mt-1 mb-1">Active Interviewer</h5>
                        </div>
                        <div class="card-body  pt-2 pb-2">
                            <div class="float-end">
                                <i class="uil uil-file-check-alt widget-icon"></i>
                            </div>
                            <h3 class="mt-0 mb-0">{{$count_data['active_interviewer']}}</h3>
{{--                            <p class="mb-0 text-muted">--}}
{{--                                <span class="text-danger mr-5"><i class="mdi mdi-human-female"></i>3000</span>--}}
{{--                                <span class="text-success ml-5"><i class="mdi mdi-human-male"></i> 4000</span>--}}
{{--                            </p>--}}
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->
                <div class="col-lg-3">
                    <div class="card widget-flat">
                        <div class="card-header">
{{--                            <div class="dropdown float-end mt-1">--}}
{{--                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                                    <i class="mdi mdi-dots-vertical  text-white"></i>--}}
{{--                                </a>--}}
{{--                                <div class="dropdown-menu dropdown-menu-end">--}}
{{--                                    <!-- item-->--}}
{{--                                    <a href="#" class="dropdown-item">View Report</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <h5 class="text-muted  mt-1 mb-1">Test Attempt</h5>
                        </div>
                        <div class="card-body  pt-2 pb-2">
                            <div class="float-end">
                                <i class="uil uil-file-check-alt widget-icon"></i>
                            </div>
                            <h3 class="mt-0 mb-0">{{$count_data['test_attempts']}}</h3>
{{--                            <p class="mb-0 text-muted">--}}
{{--                                <span class="text-danger mr-5"><i class="mdi mdi-human-female"></i>3000</span>--}}
{{--                                <span class="text-success ml-5"><i class="mdi mdi-human-male"></i> 4000</span>--}}
{{--                            </p>--}}
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->
                <div class="col-lg-3">
                    <div class="card widget-flat">
                        <div class="card-header">
{{--                            <div class="dropdown float-end mt-1">--}}
{{--                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                                    <i class="mdi mdi-dots-vertical  text-white"></i>--}}
{{--                                </a>--}}
{{--                                <div class="dropdown-menu dropdown-menu-end">--}}
{{--                                    <!-- item-->--}}
{{--                                    <a href="#" class="dropdown-item">View Report</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <h5 class="text-muted  mt-1 mb-1">Active Teachers</h5>
                        </div>
                        <div class="card-body  pt-2 pb-2">
                            <div class="float-end">
                                <i class="uil uil-file-check-alt widget-icon"></i>
                            </div>
                            <h3 class="mt-0 mb-0">{{$count_data['user_activated']}}</h3>
{{--                            <p class="mb-0 text-muted">--}}
{{--                                <span class="text-danger mr-5"><i class="mdi mdi-human-female"></i>3000</span>--}}
{{--                                <span class="text-success ml-5"><i class="mdi mdi-human-male"></i> 4000</span>--}}
{{--                            </p>--}}
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->

                <div class="col-lg-3">
                    <div class="card widget-flat">
                        <div class="card-header">
{{--                            <div class="dropdown float-end mt-1">--}}
{{--                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                                    <i class="mdi mdi-dots-vertical  text-white"></i>--}}
{{--                                </a>--}}
{{--                                <div class="dropdown-menu dropdown-menu-end">--}}
{{--                                    <!-- item-->--}}
{{--                                    <a href="#" class="dropdown-item">View Report</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <h5 class="text-muted  mt-1 mb-1">Interview Conducted</h5>
                        </div>
                        <div class="card-body  pt-2 pb-2">
                            <div class="float-end">
                                <i class="uil uil-file-check-alt widget-icon"></i>
                            </div>
                            <h3 class="mt-0 mb-0">{{$count_data['interview_conducted']}}</h3>
{{--                            <p class="mb-0 text-muted">--}}
{{--                                <span class="text-danger mr-5"><i class="mdi mdi-human-female"></i>3000</span>--}}
{{--                                <span class="text-success ml-5"><i class="mdi mdi-human-male"></i> 4000</span>--}}
{{--                            </p>--}}
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->
                <!--------------Row End-------------->
            </div>
            <h3>Today Stats ({{ now()->format('d-m-Y') }})</h3>
            <div class="row justify-content-center">
                <!--------------Row Start-------  filter-box-col----->
                <div class="col-lg-3">
                    <div class="card widget-flat">
                        <div class="card-header">
                            <h5 class="text-muted  mt-1 mb-1">Today Attempts</h5>
                        </div>
                        <div class="card-body  pt-2 pb-2">
                            <div class="float-end">
                                <i class="mdi mdi-teach widget-icon"></i>
                            </div>
                            <h3 class="mt-0 mb-0">{{$todayAttempts}}</h3>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->
                <div class="col-lg-3">
                    <div class="card widget-flat">
                        <div class="card-header">
                            <h5 class="text-muted  mt-1 mb-1">Today Interviews</h5>
                        </div>
                        <div class="card-body  pt-2 pb-2">
                            <div class="float-end">
                                <i class="mdi mdi-teach widget-icon"></i>
                            </div>
                            <h3 class="mt-0 mb-0">{{$todayInterviews}}</h3>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->
{{--                <div class="col-lg-3">--}}
{{--                    <div class="card widget-flat">--}}
{{--                        <div class="card-header">--}}
{{--                            <h5 class="text-muted  mt-1 mb-1">Today Active</h5>--}}
{{--                        </div>--}}
{{--                        <div class="card-body  pt-2 pb-2">--}}
{{--                            <div class="float-end">--}}
{{--                                <i class="mdi mdi-teach widget-icon"></i>--}}
{{--                            </div>--}}
{{--                            <h3 class="mt-0 mb-0">{{$todayActive}}</h3>--}}
{{--                        </div> <!-- end card-body-->--}}
{{--                    </div> <!-- end card-->--}}
{{--                </div> <!-- end col-->--}}
                <!--------------Row End-------------->
            </div>

{{--            <div class="row">--}}
{{--                <div class="col-12">--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-body">--}}
{{--                            <table id="datatable-buttons" class="table table-striped table-centered w-100"><!--  dt-responsive   nowrap-->--}}
{{--                                <thead>--}}
{{--                                <tr>--}}
{{--                                    <th>Sr. No</th>--}}
{{--                                    <th>Test Date</th>--}}
{{--                                    <th>Districts</th>--}}
{{--                                    <th>Tehsils</th>--}}
{{--                                    <th>Markaz</th>--}}
{{--                                    <th>EMIS-School Name </th>--}}
{{--                                    <th>Teacher Types</th>--}}
{{--                                    <th>Interview Conducted</th>--}}
{{--                                </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody>--}}
{{--                                @foreach($teachers as $i=>$teacher)--}}
{{--                                <tr>--}}
{{--                                    <td>{{$i+1}}</td>--}}
{{--                                    <td>{{ date('d-m-Y', $teacher['answer']['start_time'] / 1000) }}</td>--}}
{{--                                    <td>{{$teacher['d_name']}}</td>--}}
{{--                                    <td>{{$teacher['t_name']}}</td>--}}
{{--                                    <td>{{$teacher['m_name']}}</td>--}}
{{--                                    <td>{{$teacher['s_emis_code']}}-{{$teacher['s_name']}}</td>--}}
{{--                                    <th>{{$teacher['std_name']}}</th>--}}
{{--                                    <th>{{$teacher['interview_status'] > 0 ? 'Yes' : 'No'}}</th>--}}
{{--                                </tr>--}}
{{--                                @endforeach--}}
{{--                                </tbody>--}}
{{--                            </table>--}}

{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>
@endsection
