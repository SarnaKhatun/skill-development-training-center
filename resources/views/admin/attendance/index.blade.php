@extends('admin.layouts.master')
@section('manage-attendance', 'menu-open')
@section('index', 'active')

@section('main-content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Month Wise Batch Attendance</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Select Batch & Month</h3>
                        <div class="float-right">
                            <button id="export-btn" class="btn btn-primary">Export to Excel</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="attendance-filter-form">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="batch">Select Batch</label>
                                        <select id="batch" name="batch_id" class="form-control custom_form_control js-example-templating">
                                            <option value="">Choose Batch</option>
                                            @foreach($batches as $batch)
                                                <option value="{{ $batch->id }}">{{ $batch->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="month">Select Month</label>
                                        <input type="month" id="month" name="month" class="form-control custom_form_control" required>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Show Attendance</button>
                        </form>


                        <div id="attendance-container" class="table-responsive mt-4"></div>



                    </div>
                </div>
            </div>
        </section>
    </div>

    @push('js')
        <script>
            $(document).ready(function() {
                $(".js-example-templating").select2({
                    placeholder: "Select",
                    allowClear: true
                });

                $('#attendance-filter-form').submit(function(e) {
                    e.preventDefault();
                    let batchId = $('#batch').val();
                    let month = $('#month').val();

                    if (batchId && month) {
                        $.ajax({
                            url: "{{ route('admin.attendance.getBatchAttendance') }}",
                            type: "GET",
                            data: { batch_id: batchId, month: month },
                            success: function(response) {
                                let students = response.students;
                                let attendanceData = response.attendanceData;
                                let dates = response.dates;

                                console.log('dates', dates);
                                if (students.length === 0) {
                                    $('#attendance-container').html('<p class="text-danger">No attendance records found.</p>');
                                    return;
                                }

                                let tableHtml = `
                                    <h4>Attendance for the Month</h4>
                                    <div class="table-responsive">
                                        <table id="attendance-table" class="table table-bordered w-100">
                                            <thead>
                                                <tr>
                                                    <th style="font-size: 10px; white-space: nowrap;">Student Name</th>`;


                                dates.forEach(date => {
                                    tableHtml += `<th style="font-size: 10px; white-space: nowrap;">${date}</th>`;
                                });

                                tableHtml += `</tr></thead><tbody>`;


                                students.forEach(student => {
                                    tableHtml += `<tr>
                                        <td style="font-size: 10px; font-weight: bold; white-space: nowrap;">${student.name_en} (${student.student_roll})</td>`;


                                    dates.forEach(date => {
                                        let status = '-';

                                        if (attendanceData[student.id]) {
                                            let attendanceRecord = attendanceData[student.id].find(a => a.date === date);

                                            if (attendanceRecord) {
                                                let statuses = attendanceRecord.status.split(',');
                                                status = statuses.map(s => s.trim()).map(s => s.charAt(0).toUpperCase() + s.slice(1)).join(', ');
                                            }
                                        }

                                        tableHtml += `<td style="font-size: 10px; text-align: center; white-space: nowrap;">${status}</td>`;
                                    });

                                    tableHtml += `</tr>`;
                                });

                                tableHtml += `</tbody></table></div>`;


                                $('#attendance-container').html(tableHtml);
                            },

                            error: function() {
                                $('#attendance-container').html('<p class="text-danger">An error occurred. Please try again later.</p>');
                            }
                        });
                    }
                });


                $('#export-btn').click(function() {
                    let table = document.getElementById('attendance-table');

                    let wb = XLSX.utils.table_to_book(table, { sheet: "Attendance" });

                    let ws = wb.Sheets['Attendance'];
                    let range = XLSX.utils.decode_range(ws['!ref']);

                    let colWidths = [];

                    for (let col = range.s.c; col <= range.e.c; col++) {
                        let maxLength = 0;
                        for (let row = range.s.r; row <= range.e.r; row++) {
                            let cellAddress = XLSX.utils.encode_cell({ r: row, c: col });
                            let cell = ws[cellAddress];

                            if (cell && cell.v) {
                                maxLength = Math.max(maxLength, cell.v.toString().length);

                                if (cell.t === 'n' && cell.v > 10000) {
                                    cell.z = "dd/mm/yyyy";
                                }
                            }
                        }

                        colWidths.push({ wpx: maxLength * 4 });
                    }

                    ws['!cols'] = colWidths;

                    XLSX.writeFile(wb, 'attendance_data.xlsx');
                });


            });
        </script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.1/xlsx.full.min.js"></script>
    @endpush
@endsection

