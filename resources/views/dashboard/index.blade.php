@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <!--------------Row Start------------>
                <div class="col-lg-4">
                    <div class="card widget-flat">
                        <div class="card-header">
                            <div class="dropdown float-end mt-1">
                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical  text-white"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <!-- item-->
                                    <a href="district-listing.html" class="dropdown-item">View Report</a>
                                </div>
                            </div>
                            <h5 class="text-muted  mt-1 mb-1">Total Teachers</h5>
                        </div>
                        <div class="card-body  pt-2 pb-2">
                            <div class="float-end">
                                <i class="mdi mdi-teach widget-icon"></i>
                            </div>
                            <h3 class="mt-0 mb-0">36,254</h3>
                            <p class="mb-0 text-muted">
                                <span class="text-danger mr-5"><i class="mdi mdi-human-female"></i>3000</span>
                                <span class="text-success ml-5"><i class="mdi mdi-human-male"></i> 4000</span>
                            </p>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->

                <div class="col-lg-4">
                    <div class="card widget-flat">
                        <div class="card-header">
                            <div class="dropdown float-end mt-1">
                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical  text-white"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <!-- item-->
                                    <a href="teacher-appeared.html" class="dropdown-item">View Report</a>
                                </div>
                            </div>
                            <h5 class="text-muted  mt-1 mb-1">Total Appeared</h5>
                        </div>
                        <div class="card-body  pt-2 pb-2">
                            <div class="float-end">
                                <i class="uil uil-file-check-alt widget-icon"></i>
                            </div>
                            <h3 class="mt-0 mb-0">36,254</h3>
                            <p class="mb-0 text-muted">
                                <span class="text-danger mr-5"><i class="mdi mdi-human-female"></i>3000</span>
                                <span class="text-success ml-5"><i class="mdi mdi-human-male"></i> 4000</span>
                            </p>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->

                <div class="col-lg-4">
                    <div class="card widget-flat">
                        <div class="card-header">
                            <div class="dropdown float-end mt-1">
                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical  text-white"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <!-- item-->
                                    <a href="district-listing.html" class="dropdown-item">View Report</a>
                                </div>
                            </div>
                            <h5 class="text-muted  mt-1 mb-1">Teacher by Marks</h5>
                        </div>
                        <div class="card-body  pt-2 pb-2">
                            <div class="float-end">
                                <i class="mdi mdi-bookmark widget-icon"></i>
                            </div>
                            <h3 class="mt-0 mb-0">36,254</h3>
                            <p class="mb-0 text-muted">
                                <span class="text-danger mr-5"><i class="mdi mdi-human-female"></i>3000</span>
                                <span class="text-success ml-5"><i class="mdi mdi-human-male"></i> 4000</span>
                            </p>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->

                <!--------------Row End-------------->
            </div>
        </div>
        <!---------MAP START--------->
        <div class="col-lg-7">
            <div class="card card-h-100">
                <div class="card-body">

                    <h4 class="header-title mb-3">All Districts of Punjab</h4>
                    <div id="map" style="height: 400px; width: 100%;"></div>
                </div>
            </div>
        </div>
        <!---------MAP END--------->
        <div class="col-lg-5">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card card-h-100">
                        <div class="card-body">
                            <div class="dropdown float-end">
                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                                </div>
                            </div>
                            <h4 class="header-title mb-3">Teacher by Marks  (0-100)</h4>

                            <div dir="ltr">
                                <div  id="totalTeacherQualifiedNotQualified" ></div>
                            </div>

                        </div> <!-- end card-body-->
                    </div> <!-- end card-->

                </div> <!-- end col -->
            </div>
        </div>

    </div> <!-- end row -->
    <div class="row">
        <div class="col-xl-5 col-lg-5">
            <div class="card card-h-100">
                <div class="card-body">
                    <div class="dropdown float-end">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                        </div>
                    </div>
                    <h4 class="header-title mb-3">Subject Wise Ranking</h4>

                    <div dir="ltr">
                        <div  id="DistrictWiseSubjectPerformanceHeatmap" ></div>
                    </div>

                </div> <!-- end card-body-->
            </div> <!-- end card-->

        </div> <!-- end col -->
        <div class="col-xl-7 col-lg-7">
            <div class="card card-h-100">
                <div class="card-body">
                    <div class="dropdown float-end">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                        </div>
                    </div>
                    <h4 class="header-title mb-3">Average Marks (Female & Male)</h4>

                    <div dir="ltr">
                        <div  id="TeacherMarks" ></div>
                    </div>

                </div> <!-- end card-body-->
            </div> <!-- end card-->

        </div> <!-- end col -->
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="dropdown float-end">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                        </div>
                    </div>
                    <h4 class="header-title mb-3">Districts Wise Female & Male Teachers</h4>
                    <div dir="ltr">
                        <div id="districtsQualifiedNotQualified"></div>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>
@endsection
