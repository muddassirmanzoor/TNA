@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <a href="{{ asset('assets/images/teacher_interview_rubric_final.pdf') }}" target="_blank" class="btn btn-danger mb-3">Rubric Scale</a>
                </div>
                <h4 class="page-title">Interview Form</h4>
            </div>
        </div>
    </div>
    @if($result)
        <div class="alert alert-danger">
            Interview already taken.
        </div>
    @endif
    <!-- end page title -->
    <!---------Filter Start Here---------->
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card card-h-100">
                <div class="card-body">
                    <form  action="{{url('submit-interview-form')}}" method="post" onsubmit="return confirmSubmission()">
                        @csrf
                        <input type="hidden" name="teacher_cnic" value="{{$teacher['st_cnic']}}">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12">
                                <div class="mb-3">
                                    <h3 class="header-title mb-3">Basic Information</h3>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3">
                                <div class="mb-3">
                                    <label class="form-label">School Name</label>
                                    <p class="text-muted font-13">
                                        {{$teacher['s_name']}}
                                    </p>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3">
                                <div class="mb-3">
                                    <label class="form-label">Teacher Name</label>
                                    <p class="text-muted font-13">
                                        {{$teacher['st_name']}}
                                    </p>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3">
                                <div class="mb-3">
                                    <label class="form-label">CNIC No</label>
                                    <p class="text-muted font-13">
                                        {{$teacher['st_cnic']}}
                                    </p>
                                </div>
                            </div>
{{--                            <div class="col-xl-3 col-lg-3">--}}
{{--                                <div class="mb-3">--}}
{{--                                    <label class="form-label">Father/Husband Name</label>--}}
{{--                                    <p class="text-muted font-13">--}}
{{--                                        Saad Hameed--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-xl-3 col-lg-3">--}}
{{--                                <div class="mb-3">--}}
{{--                                    <label class="form-label">Date of Birth</label>--}}
{{--                                    <p class="text-muted font-13">--}}
{{--                                        10-08-1985--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-xl-3 col-lg-3">--}}
{{--                                <div class="mb-3">--}}
{{--                                    <label class="form-label">E-mail</label>--}}
{{--                                    <p class="text-muted font-13">--}}
{{--                                        abc@gmail.com--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="col-xl-3 col-lg-3">
                                <div class="mb-3">
                                    <label class="form-label">Teacher Type</label>
                                    <p class="text-muted font-13">
                                        {{$teacher['std_name']}}
                                    </p>
                                </div>
                            </div>
{{--                            <div class="col-xl-3 col-lg-3">--}}
{{--                                <div class="mb-3">--}}
{{--                                    <label class="form-label">Contact No</label>--}}
{{--                                    <p class="text-muted font-13">--}}
{{--                                        0324-7889520--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="col-xl-3 col-lg-3">
                                <div class="mb-3">
                                    <label class="form-label">Subject</label>
                                    <p class="text-muted font-13">
                                        {{$teacher['sts_name'] ?? 'General'}}
                                    </p>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3">
                                <div class="mb-3">
                                    <label class="form-label">Education</label>
                                    <p class="text-muted font-13">
                                        {{$teacher['std_level']}} - {{$teacher['stds_name']}}
                                    </p>
                                </div>
                            </div>
{{--                            <div class="col-xl-3 col-lg-3">--}}
{{--                                <div class="mb-3">--}}
{{--                                    <label class="form-label">Teacher Type</label>--}}
{{--                                    <p class="text-muted font-13">--}}
{{--                                        PST--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="col-xl-3 col-lg-3">
                                <div class="mb-3">
                                    <label class="form-label">Grade</label>
                                    <p class="text-muted font-13">
                                        {{$teacher['stg_name']}}
                                    </p>
                                </div>
                            </div>
{{--                            <div class="col-xl-3 col-lg-3">--}}
{{--                                <div class="mb-3">--}}
{{--                                    <label class="form-label">Overall Percentage</label>--}}
{{--                                    <p class="text-muted font-13">--}}
{{--                                        91.67%--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-xl-3 col-lg-3">--}}
{{--                                <div class="mb-3">--}}
{{--                                    <label class="form-label">Status</label>--}}
{{--                                    <p class="text-muted font-13">--}}
{{--                                        Pass--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <!-- <div class="col-xl-12 col-lg-12">
                                 <div class="mb-3">
                                     <h3 class="header-title mb-3">Written  Test Assessment</h3>
                                 </div>
                             </div>
                             <div class="col-xl-4 col-lg-4">
                                 <div class="mb-3">
                                     <label class="form-label">Content</label>
                                     <input type="text" class="form-control" value="15" readonly>
                                 </div>
                             </div>
                             <div class="col-xl-4 col-lg-4">
                                 <div class="mb-3">
                                     <label class="form-label">Pedagogy</label>
                                     <input type="text" class="form-control" value="15" readonly>
                                 </div>
                             </div>
                             <div class="col-xl-4 col-lg-4">
                                 <div class="mb-3">
                                     <label class="form-label">Cognitive</label>
                                     <input type="text" class="form-control" value="15" readonly>
                                 </div>
                             </div>  -->
{{--                            <div class="col-xl-12 col-lg-12">--}}
{{--                                <div class="mb-3">--}}
{{--                                    <h2 style="text-decoration: underline;">Candidate Attendance</h2>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <!--------------Assessment Indicator Start ------------->
                            <div class="col-xl-12 col-lg-12">
                                <div class="mb-3">
                                    <h5><b>Candidate Attendance</b></h5>
                                    <br>
                                    <div class="form-check form-radio-danger form-check-inline">
                                        <input type="radio" id="attendanceAbsent" value="0" name="attendance" class="form-check-input"
                                            {{ isset($result) && $result->attendance == 0 ? 'checked' : '' }} onclick="toggleRequired(false)">
                                        <label class="form-check-label text-danger" for="attendanceAbsent">Absent</label>
                                    </div>
                                    <div class="form-check form-radio-warning form-check-inline">
                                        <input type="radio" id="attendancePresent" value="1" name="attendance" class="form-check-input"
                                            {{ (isset($result) && $result->attendance == 1) || !isset($result) ? 'checked' : '' }} onclick="toggleRequired(true)">
                                        <label class="form-check-label text-success1" for="attendancePresent">Present</label>
                                    </div>
                                </div>
                            </div>
                            <!--------------Assessment Indicator 1 End------------->

                            <div class="col-xl-12 col-lg-12">
                                <div class="mb-3">
                                    <h2 style="text-decoration: underline;">Interview Assessment Indicator</h2>
                                </div>
                            </div>
                            <!--------------Assessment Indicator Start ------------->
                            <!-- Verbal Communication Skills -->
                            <div class="col-xl-12 col-lg-12">
                                <div class="mb-3">
                                    <h5><b>1: Verbal Communication Skills</b></h5>
                                    <br>
                                    <div class="form-check form-radio-danger form-check-inline">
                                        <input type="radio" id="communicationSkills1" value="1" name="communication_skills" class="form-check-input"
                                            {{ isset($result) && $result->verbal_skills == 1 ? 'checked' : '' }}>
                                        <label class="form-check-label text-danger" for="communicationSkills1">Below Average</label>
                                    </div>
                                    <div class="form-check form-radio-warning form-check-inline">
                                        <input type="radio" id="communicationSkills2" value="2" name="communication_skills" class="form-check-input"
                                            {{ isset($result) && $result->verbal_skills == 2 ? 'checked' : '' }}>
                                        <label class="form-check-label text-warning" for="communicationSkills2">Satisfactory</label>
                                    </div>
                                    <div class="form-check form-radio-dismissible form-check-inline">
                                        <input type="radio" id="communicationSkills3" value="3" name="communication_skills" class="form-check-input"
                                            {{ isset($result) && $result->verbal_skills == 3 ? 'checked' : '' }}>
                                        <label class="form-check-label text-dismissible" for="communicationSkills3">Good</label>
                                    </div>
                                    <div class="form-check form-radio-gold form-check-inline">
                                        <input type="radio" id="communicationSkills4" value="4" name="communication_skills" class="form-check-input"
                                            {{ isset($result) && $result->verbal_skills == 4 ? 'checked' : '' }}>
                                        <label class="form-check-label text-gold" for="communicationSkills4">Very Good</label>
                                    </div>
                                    <div class="form-check form-radio-success form-check-inline">
                                        <input type="radio" id="communicationSkills5" value="5" name="communication_skills" class="form-check-input"
                                            {{ isset($result) && $result->verbal_skills == 5 ? 'checked' : '' }}>
                                        <label class="form-check-label text-success1" for="communicationSkills5">Excellent</label>
                                    </div>
                                </div>
                            </div>
                            <!--------------Assessment Indicator 1 End------------->
                            <div class="col-xl-12 col-lg-12">
                                <div class="mb-3">
                                    <h5><b>2: Non-verbal Communication Skills</b></h5>
                                    <br>
                                    <div class="form-check form-radio-danger form-check-inline">
                                        <input type="radio" id="nonVerbalCommunicationSkills1" value="1" name="non_communication_skills" class="form-check-input"
                                            {{ isset($result) && $result->non_verbal_skills == 1 ? 'checked' : '' }}>
                                        <label class="form-check-label text-danger" for="nonVerbalCommunicationSkills1">Below Average</label>
                                    </div>
                                    <div class="form-check  form-radio-warning form-check-inline">
                                        <input type="radio" id="nonVerbalCommunicationSkills2" value="2" name="non_communication_skills" class="form-check-input"
                                            {{ isset($result) && $result->non_verbal_skills == 2 ? 'checked' : '' }}>
                                        <label class="form-check-label text-warning" for="nonVerbalCommunicationSkills2">Satisfactory</label>
                                    </div>
                                    <div class="form-check form-radio-dismissible form-check-inline">
                                        <input type="radio" id="nonVerbalCommunicationSkills3" value="3" name="non_communication_skills" class="form-check-input"
                                            {{ isset($result) && $result->non_verbal_skills == 3 ? 'checked' : '' }}>
                                        <label class="form-check-label text-dismissible" for="nonVerbalCommunicationSkills3">Good</label>
                                    </div>
                                    <div class="form-check form-radio-gold  form-check-inline">
                                        <input type="radio" id="nonVerbalCommunicationSkills4" value="4" name="non_communication_skills" class="form-check-input"
                                            {{ isset($result) && $result->non_verbal_skills == 4 ? 'checked' : '' }}>
                                        <label class="form-check-label text-gold" for="nonVerbalCommunicationSkills4">Very Good</label>
                                    </div>
                                    <div class="form-check form-radio-success form-check-inline">
                                        <input type="radio" id="nonVerbalCommunicationSkills5" value="5" name="non_communication_skills" class="form-check-input"
                                            {{ isset($result) && $result->non_verbal_skills == 5 ? 'checked' : '' }}>
                                        <label class="form-check-label text-success1" for="nonVerbalCommunicationSkills5">Excellent</label>
                                    </div>
                                </div>
                            </div>

                            <!--------------Assessment Indicator 2 End------------->
                            <div class="col-xl-12 col-lg-12">
                                <div class="mb-3">
                                    <h5><b>3: Professional Attire</b></h5>
                                    <br>
                                    <div class="form-check form-radio-danger  form-check-inline">
                                        <input type="radio" id="professionalAttire1" value="1" name="professional_attire" class="form-check-input"
                                            {{ isset($result) && $result->proffessional_attire == 1 ? 'checked' : '' }}>
                                        <label class="form-check-label text-danger" for="professionalAttire1">Below Average</label>
                                    </div>
                                    <div class="form-check form-radio-warning form-check-inline">
                                        <input type="radio" id="professionalAttire2" value="2" name="professional_attire" class="form-check-input"
                                            {{ isset($result) && $result->proffessional_attire == 2 ? 'checked' : '' }}>
                                        <label class="form-check-label text-warning" for="professionalAttire2">Satisfactory</label>
                                    </div>
                                    <div class="form-check  form-radio-dismissible form-check-inline">
                                        <input type="radio" id="professionalAttire3" value="3" name="professional_attire" class="form-check-input"
                                            {{ isset($result) && $result->proffessional_attire == 3 ? 'checked' : '' }}>
                                        <label class="form-check-label  text-dismissible" for="professionalAttire3">Good</label>
                                    </div>
                                    <div class="form-check form-radio-gold form-check-inline">
                                        <input type="radio" id="professionalAttire4" value="4" name="professional_attire" class="form-check-input"
                                            {{ isset($result) && $result->proffessional_attire == 4 ? 'checked' : '' }}>
                                        <label class="form-check-label text-gold" for="professionalAttire4">Very Good</label>
                                    </div>
                                    <div class="form-check form-radio-success form-check-inline">
                                        <input type="radio" id="professionalAttire5" value="5" name="professional_attire" class="form-check-input"
                                            {{ isset($result) && $result->proffessional_attire == 5 ? 'checked' : '' }}>
                                        <label class="form-check-label text-success1" for="professionalAttire5">Excellent</label>
                                    </div>
                                </div>
                            </div>
                            <!--------------Assessment Indicator 3 End------------->
                            <div class="col-xl-12 col-lg-12">
                                <div class="mb-3">
                                    <h5><b>4: Use of Teaching Aids (Whiteboard, Blackboard)</b></h5>
                                    <p class="text-danger alert alert-danger">
                                        <strong>Hint: </strong> How would you adjust your use of the board if students started asking questions that showed they were confused?
                                    </p>
                                    <br>
                                    <div class="form-check form-radio-danger  form-check-inline ">
                                        <input type="radio" id="teachingAids1" value="1" name="teaching_aids" class="form-check-input"
                                            {{ isset($result) && $result->teaching_aids == 1 ? 'checked' : '' }}>
                                        <label class="form-check-label text-danger" for="teachingAids1">Below Average</label>
                                    </div>
                                    <div class="form-check form-radio-warning form-check-inline">
                                        <input type="radio" id="teachingAids2" value="2" name="teaching_aids" class="form-check-input"
                                            {{ isset($result) && $result->teaching_aids == 2 ? 'checked' : '' }}>
                                        <label class="form-check-label text-warning" for="teachingAids2">Satisfactory</label>
                                    </div>
                                    <div class="form-check  form-radio-dismissible form-check-inline">
                                        <input type="radio" id="teachingAids3" value="3" name="teaching_aids" class="form-check-input"
                                            {{ isset($result) && $result->teaching_aids == 3 ? 'checked' : '' }}>
                                        <label class="form-check-label text-dismissible" for="teachingAids3">Good</label>
                                    </div>
                                    <div class="form-check form-radio-gold  form-check-inline">
                                        <input type="radio" id="teachingAids4" value="4" name="teaching_aids" class="form-check-input"
                                            {{ isset($result) && $result->teaching_aids == 4 ? 'checked' : '' }}>
                                        <label class="form-check-label text-gold" for="teachingAids4">Very Good</label>
                                    </div>
                                    <div class="form-check form-radio-success form-check-inline">
                                        <input type="radio" id="teachingAids5" value="5" name="teaching_aids" class="form-check-input"
                                            {{ isset($result) && $result->teaching_aids == 5 ? 'checked' : '' }}>
                                        <label class="form-check-label text-success1" for="teachingAids5">Excellent</label>
                                    </div>
                                </div>
                            </div>

                            <!--------------Assessment Indicator 4 End------------->
                            @if(!isset($result))
                            <div class="col-xl-12 col-lg-12">
                                <div class="mb-3">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                            </div>
                            @endif
                        </div>
                    </form>
                </div> <!-- end card-body-->
            </div> <!-- end card-->

        </div> <!-- end col -->
    </div>
@endsection
