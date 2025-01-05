<form id="filterForm" method="POST" action="{{url('filter-data')}}">
    @csrf
    <div class="row">
        <div class="col-3 filter-box-col">
            <div class="mb-2">
                <label for="example-select" class="form-label">Districts</label>
                <select id="districtSelect" class="form-select" name="district_id" onchange="onDistrictChange()">
                    <option value="0">Select District</option>
                    @foreach($districts as $district)
                        <option value="{{ $district->d_name }}" {{ (old('district_id', $selectedDistrict ?? '') == $district->d_name) ? 'selected' : '' }}>
                            {{ $district->d_name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Tehsil Dropdown -->
        <div class="col-3 filter-box-col">
            <div class="mb-2">
                <label for="tehsilSelect" class="form-label">Tehsils</label>
                <select id="tehsilSelect" class="form-select" name="tehsil_id" onchange="onTehsilChange()">
                    <option value="0">Select Tehsil</option>
                    @if(isset($tehsils))
                        @foreach($tehsils as $tehsil)
                            <option value="{{ $tehsil->t_name }}" {{ (old('tehsil_id', $selectedTehsil ?? '') == $tehsil->t_name) ? 'selected' : '' }}>
                                {{ $tehsil->t_name }}
                            </option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>

        <!-- Markaz Dropdown -->
        <div class="col-3 filter-box-col">
            <div class="mb-2">
                <label for="markazSelect" class="form-label">Markaz</label>
                <select id="markazSelect" class="form-select" name="markaz_id" onchange="onMarkazChange()">
                    <option value="0">Select Markaz</option>
                    @if(isset($markaz))
                        @foreach($markaz as $m)
                            <option value="{{ $m->m_name }}" {{ (old('markaz_id', $selectedMarkaz ?? '') == $m->m_name) ? 'selected' : '' }}>
                                {{ $m->m_name }}
                            </option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>

        <!-- School Dropdown -->
        <div class="col-3 filter-box-col">
            <div class="mb-2">
                <label for="schoolSelect" class="form-label">School</label>
                <select id="schoolSelect" class="form-select" name="school_id" onchange="onChange()">
                    <option value="0">Select School</option>
                    @if(isset($schools))
                        @foreach($schools as $school)
                            <option value="{{ $school->s_name }}" {{ (old('school_id', $selectedSchool ?? '') == $school->s_name) ? 'selected' : '' }}>
                                {{ $school->s_name }} ({{ $school->s_emis_code }})
                            </option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>
        <div class="col-3 filter-box-col">
            <div class="mb-2">
                <label for="typeSelect" class="form-label">Teacher Types</label>
                <select class="form-select" id="teacherType" name="teacher_type" onchange="onChange()">
                    <option value="">Select Types</option>
                    @if(isset($teacherTypes))
                        @foreach($teacherTypes as $type)
                            <option value="{{ $type->std_name }}" {{ (old('teacher_type', $selectedType ?? '') == $type->std_name) ? 'selected' : '' }}>
                                {{ $type->std_name }}
                            </option>
                        @endforeach
                    @endif

                </select>
            </div>
        </div><!-- end col-->
        <div class="col-3 filter-box-col">
            <div class="mb-2">
                <label for="qualificationSelect" class="form-label">Teacher Qualification</label>
                <select class="form-select" id="teacherQualification" name="teacher_qualification" onchange="onChange()">
                    <option value="">Select Qualification</option>
                    @if(isset($teacherQualification))
                        @foreach($teacherQualification as $qualification)
                            <option value="{{ $qualification->std_level }}" {{ (old('teacher_qualification', $selectedQualification ?? '') == $qualification->std_level) ? 'selected' : '' }}>
                                {{ $qualification->std_level }}
                            </option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div><!-- end col-->
        <div class="col-3 filter-box-col">
            <div class="mb-2">
                <label for="rangeSelect" class="form-label">Marks Range</label>
                <select class="form-select" id="selectRange" name="range">
                    <option value="">Select Range</option>
                    <option value="10-20">10-20</option>
                    <option value="20-30">20-30</option>
                    <option value="40-50">40-50</option>
                    <option value="50-60">50-60</option>
                    <option value="60-70">60-70</option>
                    <option value="70-80">70-80</option>
                    <option value="80-90">80-90</option>
                    <option value="90-100">90-100</option>
                    <option value="100">100</option>
                </select>
            </div>
        </div><!-- end col-->

{{--        <div class="col-3 filter-box-col">--}}
{{--            <div class="mb-2">--}}
{{--                <label for="example-select" class="form-label"></label>--}}
{{--                <button class="btn btn-primary mt-3 w-50" type="submit">Submit</button>--}}
{{--            </div> <!-- end col-->--}}
{{--        </div>--}}


    </div>
</form>
