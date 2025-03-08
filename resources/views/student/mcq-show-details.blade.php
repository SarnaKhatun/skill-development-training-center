@extends('student.layouts.master')
@section('mcq exam', 'menu-open')
@section('mcq exam', 'active')

@section('main-content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="card p-4 shadow-sm">
                            <div class="card-header text-center">
                                <h6>{{ $detail->exam_name ?? "" }}</h6>
                                <h6>{{ $detail->course->name ?? "" }}</h6>
                                <h6>
                                    @php
                                        $batchIds = json_decode($detail->batch_id, true) ?? [];

                                        $userBatchId = Auth::user()->batch_id ?? null;
                                        $matchingBatchIds = array_intersect($batchIds, [$userBatchId]);

                                        $batches = \App\Models\Batch::whereIn('id', $matchingBatchIds)->pluck('name')->toArray();
                                    @endphp

                                    {{ implode(', ', $batches) }}
                                </h6>
                                <h6>Date: {{ \Illuminate\Support\Carbon::parse($detail->date)->format('d-m-Y') ?? "" }}</h6>
                                <div class="d-flex justify-content-between mt-2">
                                    <div>Time: {{ $detail->time ?? "" }}</div>
                                    <div>Marks: {{ $detail->total_mark ?? "" }}</div>
                                </div>
                            </div>
                            <form action="{{ route('mcq.submit') }}" method="POST">
                                @csrf
                            <div class="card-body">
                                <div class="mt-4">
                                    <p class="ml-2 font-weight-bold text-center">MCQ Questions:</p>
                                    <div class="row">
                                        <div class="col-md-4 offset-md-2">
                                            <ol class="question-list" style="list-style-type: none; padding-left: 0;">
                                                @if($detail->questions && $detail->questions->count() > 0)
                                                    @php
                                                        $questions = $detail->questions;
                                                        $halfCount = ceil($questions->count() / 2);
                                                        $leftQuestions = $questions->take($halfCount);
                                                        $serial = 1;  // Starting serial number
                                                    @endphp
                                                    @foreach ($leftQuestions as $question)
                                                        <li>
                                                            <strong>{{ $serial }}. {{ $question->question }}</strong> <!-- Display serial number -->
                                                            <ol class="option-list" style="list-style-type: none; padding-left: 0;">

                                                                @foreach (json_decode($question->options, true) as $optionIndex => $option)
                                                                    <li>
                                                                        <label>
                                                                            <input type="radio" name="answers[{{ $question->id }}]" value="{{ chr(65 + $optionIndex) }}" required>
                                                                            <span class="option-label">{{ chr(65 + $optionIndex) }}.</span> {{ $option }}
                                                                        </label>
                                                                    </li>
                                                                @endforeach
                                                            </ol>
                                                        </li>
                                                        @php $serial++; @endphp <!-- Increment serial number after each question -->
                                                    @endforeach
                                                @else
                                                    <li>No questions available</li>
                                                @endif
                                            </ol>
                                        </div>
                                        <div class="col-md-4 offset-md-2">
                                            <ol class="question-list" style="list-style-type: none; padding-left: 0;">
                                                @if($detail->questions && $detail->questions->count() > 0)
                                                    @php
                                                        $rightQuestions = $questions->slice($halfCount);
                                                    @endphp
                                                    @foreach ($rightQuestions as $question)
                                                        <li>
                                                            <strong>{{ $serial }}. {{ $question->question }}</strong> <!-- Display serial number -->
                                                            <ol class="option-list" style="list-style-type: none; padding-left: 0;">
                                                                @foreach (json_decode($question->options, true) as $optionIndex => $option)
                                                                    <li>
                                                                        <label>
                                                                            <input type="radio" name="answers[{{ $question->id }}]" value="{{ chr(65 + $optionIndex) }}" required>
                                                                            <span class="option-label">{{ chr(65 + $optionIndex) }}.</span> {{ $option }}
                                                                        </label>
                                                                    </li>
                                                                @endforeach
                                                            </ol>

                                                        </li>
                                                        @php $serial++; @endphp <!-- Increment serial number after each question -->
                                                    @endforeach
                                                @else
                                                    <li>No questions available</li>
                                                @endif
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center mt-4">
                                    <button type="submit" class="btn btn-success">Submit Answers</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('css')
    <style>
        .question-list {
            font-size: 16px;
            line-height: 1.6;
        }
        .question-list li {
            margin-bottom: 15px;
        }
        .option-list {
            list-style-type: none;
            padding-left: 20px;
        }
        .option-label {
            font-weight: bold;
            margin-right: 5px;
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
