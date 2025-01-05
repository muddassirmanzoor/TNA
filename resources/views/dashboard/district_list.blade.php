@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="datatable-buttons" class="table table-striped dt-responsive  w-100"><!--nowrap-->
                        <thead>
                        <tr>
                            <th>Sr. No</th>
                            <th>Districts</th>
                            <th>Tehsils</th>
                            <th>Markaz</th>
                            <th>School EMIS</th>
                            <th>Test Attempted</th>
                            <th>Total Teachers</th>
                            <th>Appeared</th>
                            <th>Qualified</th>
                            <th>Not Qualified</th>
                            <th>View</th>
                        </tr>
                        </thead>

                        <tbody>
                        <tr>
                            <td>01</td>
                            <td>D.G. KHAN</td>
                            <td>D.G. KHAN</td>
                            <td>DRAHMAH - MALE</td>
                            <td>12345678</td>
                            <td>Yes</td>
                            <td>35</td>
                            <td>35</td>
                            <td>22</td>
                            <td>22</td>
                            <td><a href="schools-listing.html"><i class="mdi mdi-eye-circle-outline"></i></a></td>
                        </tr>
                        <tr>
                            <td>01</td>
                            <td>D.G. KHAN</td>
                            <td>D.G. KHAN</td>
                            <td>DRAHMAH - MALE</td>
                            <td>12345678</td>
                            <td>Yes</td>
                            <td>35</td>
                            <td>35</td>
                            <td>22</td>
                            <td>22</td>
                            <td><a href="schools-listing.html"><i class="mdi mdi-eye-circle-outline"></i></a></td>
                        </tr>
                        <tr>
                            <td>01</td>
                            <td>D.G. KHAN</td>
                            <td>D.G. KHAN</td>
                            <td>DRAHMAH - MALE</td>
                            <td>12345678</td>
                            <td>Yes</td>
                            <td>35</td>
                            <td>35</td>
                            <td>22</td>
                            <td>22</td>
                            <td><a href="schools-listing.html"><i class="mdi mdi-eye-circle-outline"></i></a></td>
                        </tr>
                        <tr>
                            <td>01</td>
                            <td>D.G. KHAN</td>
                            <td>D.G. KHAN</td>
                            <td>DRAHMAH - MALE</td>
                            <td>12345678</td>
                            <td>Yes</td>
                            <td>35</td>
                            <td>35</td>
                            <td>22</td>
                            <td>22</td>
                            <td><a href="schools-listing.html"><i class="mdi mdi-eye-circle-outline"></i></a></td>
                        </tr>
                        </tbody>
                    </table>
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
@endsection
