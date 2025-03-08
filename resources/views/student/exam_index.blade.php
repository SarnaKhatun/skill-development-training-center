@extends('student.layouts.master')
@section('manage-written-exam', 'menu-open')
@section('staff', 'active')

@section('main-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Exam</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Exam</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">All Written Exam</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sl</th>
                                            <th>Exam Name</th>
                                            <th>Course Name</th>
                                            <th>Exam Title</th>
                                            <th>Date</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if ($written_exams->isNotEmpty())
                                        @foreach($written_exams as $exam)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $exam->exam_name }}</td>
                                                <td>{{ $exam->course->name }}</td>
                                                <td>{{ $exam->exam_title }}</td>
                                                <td>{{ \Illuminate\Support\Carbon::parse($exam->date)->format('d-m-Y') }}</td>
                                                <td>
                                                    <span class="action-btn">
                                                        <a href="{{ route('written-exam.show',$exam->id) }}" class=" btn-view">
                                                                <i class="fa fa-eye"></i>
                                                             </a>
                                                        </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">All MCQ Exam</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Exam Name</th>
                                        <th>Course Name</th>
                                        <th>Exam Title</th>
                                        <th>Date</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if ($mcq_exams->isNotEmpty())
                                        @foreach($mcq_exams as $exam)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $exam->exam_name }}</td>
                                                <td>{{ $exam->course->name }}</td>
                                                <td>{{ $exam->exam_title }}</td>
                                                <td>{{ \Illuminate\Support\Carbon::parse($exam->date)->format('d-m-Y') }}</td>
                                                <td>
                                                    <span class="action-btn">
                                                        <a href="{{ route('mcq-exam.show',$exam->id) }}" class=" btn-view">
                                                                <i class="fa fa-eye"></i>
                                                             </a>
                                                        </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
@push('js')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@endpush
