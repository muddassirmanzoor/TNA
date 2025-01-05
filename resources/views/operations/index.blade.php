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
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Add Interviewer</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card card-h-100">
                <div class="card-body">
                    <form  action="{{'add-interviewer'}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-xl-12 col-lg-12">
                                <div class="mb-3">
                                    <h3 class="header-title mb-3">Basic Information</h3>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6">
                                <div class="mb-3">
                                    <label for="nameinput" class="form-label">Name</label>
                                    <input type="text" id="nameinput" name="name" class="form-control" placeholder="Enter Name" required>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6">
                                <div class="mb-3">
                                    <label for="CNICinput" class="form-label">CNIC No (Without Dash)</label>
                                    <input type="text" id="CNICinput" name="cnic" placeholder="Enter CNIC 13 Digits" minlength="13" maxlength="13"  class="form-control" required>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6">
                                <div class="mb-3">
                                    <label for="districtSelect" class="form-label">Districts</label>
                                    <select id="districtSelect" class="form-select" name="district" onchange="fetchTehsils(this.value)" required>
                                        <option value="0">Select District</option>
                                        @foreach($districts as $district)
                                            <option value="{{ $district->d_name }}" {{ (old('district_id', $selectedDistrict ?? '') == $district->d_name) ? 'selected' : '' }}>
                                                {{ $district->d_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6">
                                <div class="mb-3">
                                    <label for="tehsilSelect" class="form-label">Tehsils</label>
                                    <select id="tehsilSelect" class="form-select" name="tehsil" onchange="fetchCenters(this.value)" required>
                                        <option value="">Select Tehsil</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-xl-6 col-lg-6">
                                <div class="mb-3">
                                    <label for="centerEMISSelect" class="form-label">Center EMIS</label>
                                    <select id="centerEMISSelect" class="form-select" name="emis_code" required>
                                        <option value="">Select Center EMIS</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6">
                                <div class="mb-3">
                                    <label for="roleSelect" class="form-label">Status</label>
                                    <select id="roleSelect" class="form-select" name="status">
                                        <option value="">Select Status</option>
                                        <option value="1" selected>Active</option>
                                        <option value="0">Not Active</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12">
                                <div class="mb-3">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                            </div>
                        </div> <!--Row End--->
                    </form>
                </div> <!-- end card-body-->
            </div> <!-- end card-->

        </div> <!-- end col -->
    </div>
@endsection
