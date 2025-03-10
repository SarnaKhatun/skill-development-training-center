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
                                        <label for="batch">Select Date</label>
                                        <input type="text" id="reportrange" class="form-control datevalues" name="date_range"
                                               placeholder="Filter by date" data-format="DD-MM-Y"
                                               data-separator=" - " autocomplete="off" >
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


                $('#reportrange').daterangepicker({
                    locale: {
                        format: 'DD/MM/YYYY'
                    },
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                            'month').endOf('month')]
                    }
                });

                $('#attendance-filter-form').submit(function(e) {
                    e.preventDefault();
                    let batchId = $('#batch').val();
                    let date_range = $('#reportrange').val();

                    if (batchId && date_range) {
                        $.ajax({
                            url: "{{ route('admin.attendance.getBatchAttendance') }}",
                            type: "GET",
                            data: { batch_id: batchId, date_range: date_range },
                            success: function(response) {
                                let students = response.students;
                                let attendanceData = response.attendanceData;
                                let dates = response.dates;

                                if (students.length === 0) {
                                    $('#attendance-container').html('<p class="text-danger">No attendance records found.</p>');
                                    return;
                                }

                                let tableHtml = `
                    <h4>Attendance from ${date_range}</h4>
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
                    } else {
                        alert("Please select batch and date range.");
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

                                    let dateValue = new Date((cell.v - 25569) * 86400 * 1000);
                                    let day = ('0' + dateValue.getDate()).slice(-2);
                                    let month = ('0' + (dateValue.getMonth() + 1)).slice(-2);
                                    let year = dateValue.getFullYear();


                                    cell.v = `${month}/${day}/${year}`;
                                    cell.t = 's';

                                    cell.z = "MM/DD/YYYY";
                                } else if (typeof cell.v === 'string') {

                                    let dateRegex = /^\d{4}-\d{2}-\d{2}$/;
                                    if (dateRegex.test(cell.v)) {
                                        let dateValue = new Date(cell.v);
                                        let day = ('0' + dateValue.getDate()).slice(-2);
                                        let month = ('0' + (dateValue.getMonth() + 1)).slice(-2);
                                        let year = dateValue.getFullYear();


                                        cell.v = `${month}/${day}/${year}`;
                                        cell.t = 's';
                                        cell.z = "MM/DD/YYYY";
                                    }
                                }
                            }
                        }

                        colWidths.push({ wpx: maxLength * 4 });
                    }

                    ws['!cols'] = colWidths;

                    // Write the file
                    XLSX.writeFile(wb, 'attendance_data.xlsx');
                });









        });
        </script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.1/xlsx.full.min.js"></script>
    @endpush
@endsection

