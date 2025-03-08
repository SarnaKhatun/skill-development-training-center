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
                            <div class="text-right">
                                <button class="btn btn-info btn-sm print-btn" onclick="printExam()">
                                    Print
                                </button>
                            </div>
                            <div class="card-header">
                                <div class="row mb-2">
                                    <div class="col-md-12 text-center">
                                        <h6>{{ $detail->exam_name ?? "" }}</h6>
                                        <h6>{{ $detail->course->name ?? "" }}</h6>
                                        <h6>
                                            @php
                                                $batchIds = json_decode($detail->batch_id, true) ?? [];
                                                $batches = \App\Models\Batch::whereIn('id', $batchIds)->pluck('name')->toArray();
                                            @endphp
                                            {{ implode(', ', $batches) }}
                                        </h6>
                                        <h6>Date: {{ \Illuminate\Support\Carbon::parse($detail->date)->format('d-m-Y') ?? "" }}</h6>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <div>Time: {{ $detail->time ?? "" }}</div>
                                    <div>Marks: {{ $detail->total_mark ?? "" }}</div>
                                </div>
                            </div>
                            <div class="card-body">

                                <div class="mt-4">
                                    <div class="col-md-6">Note: {{ $detail->question_choose ?? "" }}</div>
                                   <p class="ml-2">Questions:</p>
                                    <ol class="question-list">
                                        @php $count = 1; @endphp
                                        @foreach ($detail->questions as $question)
                                            @php
                                                $decodedQuestions = json_decode($question->question, true) ?? [];
                                            @endphp
                                            @foreach ($decodedQuestions as $singleQuestion)
                                                <li class="mb-3">{!! $singleQuestion !!}</li>
                                                @php $count++; @endphp
                                            @endforeach
                                        @endforeach
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('css')
    <style>
        .table th, .table td {
            padding: 10px;
        }
        .question-list {
            font-size: 16px;
            line-height: 1.6;
        }
        .question-list li {
            margin-bottom: 10px;
        }

        @media print {
            .print-btn {
                display: none !important;
            }
        }
    </style>
@endpush

@push('js')
    <script>
        function printExam() {
            var printContents = document.querySelector('.card').innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            location.reload();
        }
    </script>
@endpush


