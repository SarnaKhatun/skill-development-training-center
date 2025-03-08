@extends('admin.layouts.master')
@section('manage-exam', 'menu-open')
@section('written-exam', 'active')

@section('main-content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="card p-4 shadow-sm">
                            <div class="card-header">
                                <h5>Enter Marks for Exam: {{ $exam->exam_name }}</h5>
                                <h6 class="text-left">Course: {{ $exam->course->name }}</h6>
                                <h6 class="text-left">Total Marks: {{ $exam->total_mark }}</h6>
                            </div>
                            <div class="card-body">

                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Sl</th>
                                            <th>Student Name</th>
                                            <th>Marks</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($students as $index => $student)
                                            @php
                                                // Check if the student already has marks for the exam
                                                $marks = $exam->marks()->where('student_id', $student->id)->first();
                                            @endphp
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $student->name_en }} ({{$student->student_roll}})</td>
                                                <td>
                                                    {{ $marks ? $marks->marks : '' }}
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
