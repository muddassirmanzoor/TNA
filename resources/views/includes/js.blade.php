<!-- build:js assetsvendor/js/core.js -->
<script src="{{ asset('assets/js/vendor.min.js') }}"></script>
<script src="{{ asset('assets/js/app.min.js') }}"></script>

<!-- third party js -->
<script src="{{ asset('assets/js/vendor/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/dataTables.bootstrap5.js') }}"></script>
<script src="{{ asset('assets/js/vendor/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/responsive.bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/buttons.bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/buttons.flash.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/dataTables.keyTable.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/dataTables.select.min.js') }}"></script>
<!-- third party js ends -->

<!-- demo app -->
<script src="{{ asset('assets/js/pages/demo.datatable-init.js') }}"></script>
<!-- end demo js-->

<script>
    // This function clears Tehsil, Markaz, and School dropdowns when a district is selected
    function onDistrictChange() {
        document.getElementById('tehsilSelect').selectedIndex = 0;
        document.getElementById('markazSelect').selectedIndex = 0;
        document.getElementById('schoolSelect').selectedIndex = 0;
        // Submit form to get new tehsil list based on selected district
        document.getElementById("filterForm").submit();
    }

    // This function clears Markaz and School dropdowns when a tehsil is selected
    function onTehsilChange() {
        document.getElementById('markazSelect').selectedIndex = 0;
        document.getElementById('schoolSelect').selectedIndex = 0;
        // Submit form to get new markaz list based on selected tehsil
        document.getElementById("filterForm").submit();
    }
    // This function clears the School dropdown when a markaz is selected
    function onMarkazChange() {
        document.getElementById('schoolSelect').selectedIndex = 0;
        // Submit form to get new school list based on selected markaz
        document.getElementById("filterForm").submit();
    }
    // This function clears the School dropdown when a markaz is selected
    function onChange() {
        document.getElementById("filterForm").submit();
    }
</script>

<script>
    // This function clears Tehsil, Markaz, and School dropdowns when a district is selected
    function onDistrictChangeMinister() {
        document.getElementById('tehsilSelect').selectedIndex = 0;
        // Submit form to get new tehsil list based on selected district
        document.getElementById("ministerFilterForm").submit();
    }
    // This function clears the School dropdown when a markaz is selected
    function onChangeMinister() {
        document.getElementById("ministerFilterForm").submit();
    }
</script>

<script>
    function encryptCNIC(event) {
        event.preventDefault(); // Prevent form from submitting right away

        let plainCNIC = document.getElementById('cnic').value;
        let form = document.getElementById('cnicForm');
        let userRole = form.getAttribute('data-user-role');

        if (plainCNIC.length === 13) {
            let actionUrl;

            // Set the action URL based on the user's role
            if (userRole === 'interviewer') {
                actionUrl = `/interview-form/${plainCNIC}`;
            } else if (userRole === 'invigilator') {
                actionUrl = `/invigilator-form/${plainCNIC}`;
            } else {
                alert("Unauthorized role.");
                return;
            }

            form.action = actionUrl;
            form.submit(); // Submit the form
        } else {
            alert("Please enter a valid 13-digit CNIC.");
        }
    }

    function confirmSubmission() {
        return confirm("You are about to submit the form. Once submitted, you won't be able to make changes. Do you want to proceed?");
    }
</script>
<script>
    function toggleRequired(isPresent) {
        // Get all input fields of type 'radio' in the form
        const radioInputs = document.querySelectorAll('input[type="radio"]');

        // Loop through all radio buttons
        radioInputs.forEach(input => {
            // Exclude the attendance radio buttons from being affected
            if (input.name !== 'attendance') {
                if (isPresent) {
                    // Add 'required' attribute if "Present" is selected
                    input.setAttribute('required', 'required');
                } else {
                    // Remove 'required' attribute if "Absent" is selected
                    input.removeAttribute('required');
                }
            }
        });
    }

    // Call the function on page load to set the initial state based on attendance
    window.onload = function() {
        const attendancePresent = document.getElementById('attendancePresent').checked;
        toggleRequired(attendancePresent);
    }
</script>
<script>
    function fetchTehsils(district) {
        // Clear the Tehsil and Center dropdowns
        $('#tehsilSelect').html('<option value="">Select Tehsil</option>');
        $('#centerEMISSelect').html('<option value="">Select Center EMIS</option>');

        if (district !== "0") {
            $.ajax({
                url: '/get-tehsils/' + district,
                type: 'GET',
                success: function (response) {
                    response.tehsils.forEach(tehsil => {
                        $('#tehsilSelect').append('<option value="' + tehsil.t_name + '">' + tehsil.t_name + '</option>');
                    });
                },
                error: function () {
                    alert('Error fetching tehsils');
                }
            });
        }
    }
    function fetchCenters(tehsil) {
        // Clear the Center dropdown
        $('#centerEMISSelect').html('<option value="">Select Center EMIS</option>');

        if (tehsil !== "") {
            $.ajax({
                url: '/get-centers/' + tehsil,
                type: 'GET',
                success: function (response) {
                    response.centers.forEach(center => {
                        $('#centerEMISSelect').append('<option value="' + center.emis_code + '">' + center.tna_center +'('+center.emis_code+')'+ '</option>');
                    });
                },
                error: function () {
                    alert('Error fetching centers');
                }
            });
        }
    }
</script>
