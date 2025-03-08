@extends('admin.layouts.master')
@section('manage-exam', 'menu-open')
@section('all-exam-result', 'active')

@section('main-content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Student Results</h1>
                    </div>
                    <div class="col-md-6">
                        <select id="search-student" class="form-control custom_form_control js-example-templating">
                            <option value="">Select Student</option>
                            @foreach($students as $student)
                                <option value="{{ $student->id }}">
                                    {{ $student->name_en }} ({{ $student->student_roll }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div id="result-container" style="display: none;">
                    <div class="row">
                        <!-- Written Exam Results -->
                        <div class="col-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Written Exam Results</h3>
                                </div>
                                <div class="card-body" id="written-results"></div>
                                <div class="card-footer" id="written-pagination"></div>
                            </div>
                        </div>
                        <!-- MCQ Results -->
                        <div class="col-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">MCQ Exam Results</h3>
                                </div>
                                <div class="card-body" id="mcq-results"></div>
                                <div class="card-footer" id="mcq-pagination"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $(".js-example-templating").select2({
                placeholder: "Select Student",
                allowClear: true
            });

            function loadResults(student_id, page = 1) {
                $.ajax({
                    url: "{{ route('admin.all-exam.result.list') }}",
                    type: "GET",
                    data: { student_id: student_id, page: page },
                    success: function(response) {
                        if (response.results1 || response.results2) {
                            $('#mcq-results').html(response.results1);
                            $('#written-results').html(response.results2);
                            $('#mcq-pagination').html(response.pagination1);
                            $('#written-pagination').html(response.pagination2);
                            $('#result-container').show();
                        } else {
                            $('#result-container').hide();
                        }
                    }
                });
            }

            $('#search-student').on('change', function() {
                let student_id = $(this).val();
                if (student_id) {
                    loadResults(student_id);
                } else {
                    $('#result-container').hide();
                }
            });

            $(document).on('click', '.pagination a', function(e) {
                e.preventDefault();
                let student_id = $('#search-student').val();
                let page = $(this).attr('href').split('page=')[1];
                if (student_id) {
                    loadResults(student_id, page);
                }
            });
        });
    </script>
@endpush
