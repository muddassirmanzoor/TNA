<form id="ministerFilterForm" method="POST" action="{{url('minister-dashboard')}}">
    @csrf
    <div class="row">
{{--        <div class="col-3 filter-box-col">--}}
{{--            <div class="mb-2">--}}
{{--                <label for="example-select" class="form-label">Districts</label>--}}
{{--                <select id="districtSelect" class="form-select" name="district_id" onchange="onDistrictChangeMinister()">--}}
{{--                    <option value="">Select District</option>--}}
{{--                    @foreach($districts as $district)--}}
{{--                        <option value="{{ $district->d_name }}" {{ (old('district_id', $selectedDistrict ?? '') == $district->d_name) ? 'selected' : '' }}>--}}
{{--                            {{ $district->d_name }}--}}
{{--                        </option>--}}
{{--                    @endforeach--}}
{{--                </select>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <!-- Tehsil Dropdown -->--}}
{{--        <div class="col-3 filter-box-col">--}}
{{--            <div class="mb-2">--}}
{{--                <label for="tehsilSelect" class="form-label">Tehsils</label>--}}
{{--                <select id="tehsilSelect" class="form-select" name="tehsil_id" onchange="onChangeMinister()">--}}
{{--                    <option value="">Select Tehsil</option>--}}
{{--                    @if(isset($tehsils))--}}
{{--                        @foreach($tehsils as $tehsil)--}}
{{--                            <option value="{{ $tehsil->t_name }}" {{ (old('tehsil_id', $selectedTehsil ?? '') == $tehsil->t_name) ? 'selected' : '' }}>--}}
{{--                                {{ $tehsil->t_name }}--}}
{{--                            </option>--}}
{{--                        @endforeach--}}
{{--                    @endif--}}
{{--                </select>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-3 filter-box-col">--}}
{{--            <div class="mb-2">--}}
{{--                <label for="typeSelect" class="form-label">Teacher Types</label>--}}
{{--                <select class="form-select" id="teacherType" name="teacher_type" onchange="onChangeMinister()">--}}
{{--                    <option value="">Select Types</option>--}}
{{--                    @if(isset($teacherTypes))--}}
{{--                        @foreach($teacherTypes as $type)--}}
{{--                            <option value="{{ $type->std_name }}" {{ (old('teacher_type', $selectedType ?? '') == $type->std_name) ? 'selected' : '' }}>--}}
{{--                                {{ $type->std_name }}--}}
{{--                            </option>--}}
{{--                        @endforeach--}}
{{--                    @endif--}}

{{--                </select>--}}
{{--            </div>--}}
{{--        </div><!-- end col-->--}}

{{--        <div class="col-3">--}}
{{--            <div class="mb-2">--}}
{{--                <label for="testDate" class="form-label">Test Date</label>--}}
{{--                <input class="form-control" value="{{ $selectedDate ?? '' }}"  id="testDate" type="date" name="date" onchange="onChangeMinister()">--}}
{{--            </div>--}}
{{--        </div><!-- end col-->--}}
    </div>
</form>
