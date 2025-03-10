@extends('admin.layouts.master')
@section('manage-attendance', 'menu-open')
@section('create', 'active')

@section('main-content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Batch Wise Attendance</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Select Batch for Attendance</h3>
                    </div>
                    <div class="card-body">
                        <form id="attendance-form" action="{{ route('admin.attendances.store') }}" method="POST">
                        @csrf

                        <!-- Batch Selection -->
                            <div class="col-md-6 float-left">
                                <div class="form-group">
                                    <label for="batch">Select Batch</label>
                                    <select id="batch" name="batch_id" class="form-control js-example-templating" required>
                                        <option value="">Choose Batch</option>
                                        @foreach($batches as $batch)
                                            <option value="{{ $batch->id }}">{{ $batch->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 float-right">
                                <div class="form-group">
                                    <label for="month">Select Month</label>
                                    <input type="month" id="month" name="month" class="form-control custom_form_control" required>
                                </div>
                            </div>

                            <!-- Attendance Table -->
                            <div id="attendance-table" class="table-responsive"></div>

                            <button type="submit" class="btn btn-primary mt-3">Submit Attendance</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @push('js')
        <script>
            $(document).ready(function() {
                $(".js-example-templating").select2({ placeholder: "Select", allowClear: true });

                $('#month').change(function() {
                    let selectedMonthStr = $(this).val();
                    let batchId = $('#batch').val();

                    if (batchId) {
                        let [year, monthNumber] = selectedMonthStr.split('-');
                        let displayMonth = new Date(year, monthNumber - 1).toLocaleString('default', { month: 'long', year: 'numeric' });

                        $.ajax({
                            url: "{{ route('admin.attendance.getBatchStudents') }}",
                            type: "GET",
                            data: { batch_id: batchId, month: selectedMonthStr },
                            success: function(response) {
                                let currentDate = new Date().toISOString().split('T')[0];
                                let students = response.students || [];
                                let dates = response.dates || [];
                                let attendanceData = response.attendance || {};

                                if (students.length === 0 || dates.length === 0) {
                                    $('#attendance-table').html('<p>No students or attendance dates found.</p>');
                                    return;
                                }

                                let tableHtml = `<h4>Attendance for ${displayMonth}</h4>
                    <table class="table table-bordered w-100">
                        <thead>
                            <tr>
                                <th style="display: none">Student ID</th>
                                <th style="font-size: 10px">Student Name</th>`;

                                dates.forEach(date => {
                                    tableHtml += `<th style="font-size: 10px">${date}</th>`;
                                });

                                tableHtml += `</tr></thead><tbody>`;

                                students.forEach(student => {
                                    tableHtml += `<tr>
                        <td style="font-size: 10px; display: none">${student.id}</td>
                        <td style="font-size: 10px; font-weight: bold">${student.name_en} (${student.student_roll})</td>`;

                                    dates.forEach(date => {
                                        let dateWithoutTime = date.split(' ')[0];
                                        let attendanceKey = `${student.id}_${dateWithoutTime}`;

                                        let status = attendanceData[attendanceKey] || [];
                                        status = Array.isArray(status) ? status : Object.values(status);

                                        let isFutureDate = new Date(date) > new Date();
                                        let disabledAttr = isFutureDate ? 'disabled' : '';

                                        let presentChecked = status.includes('Present') ? 'checked' : '';
                                        let absentChecked = status.includes('Absent') ? 'checked' : '';
                                        let lateChecked = status.includes('Late') ? 'checked' : '';

                                        tableHtml += `<td style="font-size: 10px">
                            <input type="hidden" name="attendances[${student.id}][${date}][]" value="">
                            <input type="checkbox" class="attendance-checkbox" data-student="${student.id}" data-date="${date}"
                                name="attendances[${student.id}][${date}][]" value="Present"
                                ${presentChecked} ${disabledAttr}> P
                            <input type="checkbox" class="attendance-checkbox" data-student="${student.id}" data-date="${date}"
                                name="attendances[${student.id}][${date}][]" value="Absent"
                                ${absentChecked} ${disabledAttr}> A
                            <input type="checkbox" class="attendance-checkbox" data-student="${student.id}" data-date="${date}"
                                name="attendances[${student.id}][${date}][]" value="Late"
                                ${lateChecked} ${disabledAttr}> L
                        </td>`;
                                    });

                                    tableHtml += `</tr>`;
                                });

                                tableHtml += `</tbody></table>`;
                                $('#attendance-table').html(tableHtml);

                                $(".attendance-checkbox").change(function () {
                                    let studentId = $(this).data("student");
                                    let date = $(this).data("date");

                                    let presentCheckbox = $(`input[data-student="${studentId}"][data-date="${date}"][value="Present"]`);
                                    let absentCheckbox = $(`input[data-student="${studentId}"][data-date="${date}"][value="Absent"]`);
                                    let lateCheckbox = $(`input[data-student="${studentId}"][data-date="${date}"][value="Late"]`);

                                    if (absentCheckbox.prop("checked")) {
                                        presentCheckbox.prop("checked", false).prop("disabled", true);
                                        lateCheckbox.prop("checked", false).prop("disabled", true);
                                    } else {
                                        presentCheckbox.prop("disabled", false);
                                        lateCheckbox.prop("disabled", false);
                                    }

                                    if (presentCheckbox.prop("checked") || lateCheckbox.prop("checked")) {
                                        absentCheckbox.prop("checked", false).prop("disabled", true);
                                    } else {
                                        absentCheckbox.prop("disabled", false);
                                    }
                                });
                            },
                            error: function() {
                                $('#attendance-table').html('<p>An error occurred. Please try again later.</p>');
                            }
                        });
                    } else {
                        $('#attendance-table').html('');
                    }
                });

            });
        </script>
    @endpush
@endsection
