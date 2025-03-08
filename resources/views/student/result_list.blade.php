@extends('student.layouts.master')

@section('main-content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>My Exam Results</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div id="result-container">
                    <div class="row">
                        <!-- Written Exam Results -->
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Written Exam Results</h3>
                                </div>
                                <div class="card-body" id="written-results">
                                    @if($results2->count() > 0)
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th>Exam Name</th>
                                                <th>Course Name</th>
                                                <th>Date</th>
                                                <th>Total Marks</th>
                                                <th>Obtained Marks</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($results2 as $result)
                                                <tr>
                                                    <td>{{ $result->exam_name }}</td>
                                                    <td>{{ $result->course_name }}</td>
                                                    <td>{{ \Illuminate\Support\Carbon::parse($result->created_at)->format('d-m-Y') }}</td>
                                                    <td>{{ $result->total_mark }}</td>
                                                    <td>{{ number_format($result->obtained_marks, 2) }}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        {{ $results2->links() }} <!-- Pagination -->
                                    @else
                                        <p>No written results found.</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- MCQ Results -->
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">MCQ Exam Results</h3>
                                </div>
                                <div class="card-body" id="mcq-results">
                                    @if($results1->count() > 0)
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th>Exam Name</th>
                                                <th>Course Name</th>
                                                <th>Date</th>
                                                <th>Correct Answers</th>
                                                <th>Total Questions</th>
                                                <th>Total Marks</th>
                                                <th>Obtained Marks</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($results1 as $result)
                                                <tr>
                                                    <td>{{ $result->exam_name }}</td>
                                                    <td>{{ $result->course_name }}</td>
                                                    <td>{{ \Illuminate\Support\Carbon::parse($result->created_at)->format('d-m-Y') }}</td>
                                                    <td>{{ $result->correct_answers }}</td>
                                                    <td>{{ $result->total_questions }}</td>
                                                    <td>{{ number_format($result->total_mark, 2) }}</td>
                                                    <td>{{ number_format($result->obtained_marks, 2) }}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        {{ $results1->links() }} <!-- Pagination -->
                                    @else
                                        <p>No MCQ results found.</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
