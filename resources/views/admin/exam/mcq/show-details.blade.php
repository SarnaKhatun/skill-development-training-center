@extends('admin.layouts.master')
@section('manage-exam', 'menu-open')
@section('mcq-list', 'active')

@section('main-content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="card p-4 shadow-sm">
                            <div class="text-right">
                                <button class="btn btn-info btn-sm print-btn" onclick="printExam()">Print</button>
                            </div>
                            <div class="card-header text-center">
                                <h6>{{ $detail->exam_name ?? '' }}</h6>
                                <h6>{{ $detail->course->name ?? '' }}</h6>
                                <h6>
                                    @php
                                        $batchIds = json_decode($detail->batch_id, true) ?? [];
                                        $batches = \App\Models\Batch::whereIn('id', $batchIds)
                                            ->pluck('name')
                                            ->toArray();
                                    @endphp
                                    {{ implode(', ', $batches) }}
                                </h6>
                                <h6>Date: {{ \Illuminate\Support\Carbon::parse($detail->date)->format('d-m-Y') ?? '' }}</h6>
                                <div class="d-flex justify-content-between mt-2">
                                    <div>Time: {{ $detail->time ?? '' }}</div>
                                    <div>Marks: {{ $detail->total_mark ?? '' }}</div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="mt-4">
                                    <p class="ml-2 font-weight-bold text-center">MCQ Questions:</p>
                                    <div class="row">
                                        <div class="col-md-4 offset-md-2">
                                            <ol class="question-list" style="list-style-type: none; padding-left: 0;">
                                                @if ($detail->questions && $detail->questions->count() > 0)
                                                    @php
                                                        $questions = $detail->questions;
                                                        $halfCount = ceil($questions->count() / 2);
                                                        $leftQuestions = $questions->take($halfCount);
                                                        $serial = 1;
                                                    @endphp
                                                    @foreach ($leftQuestions as $question)
                                                        <li>
                                                            <strong>{{ $serial }}. {{ $question->question }}</strong>
                                                            <ol class="option-list">
                                                                @php
                                                                    $options = json_decode($question->options, true);
                                                                @endphp
                                                                @if (is_array($options))
                                                                    @foreach ($options as $index => $option)
                                                                        <li>
                                                                            <span
                                                                                class="option-label">{{ chr(65 + $index) }}.</span>
                                                                            {{ $option }}
                                                                        </li>
                                                                    @endforeach
                                                                @else
                                                                    <li>No options available</li>
                                                                @endif
                                                            </ol>
                                                            <strong class="answer">Answer:</strong>
                                                            <span class="answer-text">{{ $question->answer }}</span>
                                                        </li>
                                                        @php $serial++; @endphp
                                                    @endforeach
                                                @else
                                                    <li>No questions available</li>
                                                @endif
                                            </ol>
                                        </div>
                                        <div class="col-md-4 offset-md-2">
                                            <ol class="question-list" style="list-style-type: none; padding-left: 0;">
                                                @if ($detail->questions && $detail->questions->count() > 0)
                                                    @php
                                                        $rightQuestions = $questions->slice($halfCount);
                                                    @endphp
                                                    @foreach ($rightQuestions as $question)
                                                        <li>
                                                            <strong>{{ $serial }}.
                                                                {{ $question->question }}</strong>
                                                            <ol class="option-list">
                                                                @php
                                                                    $options = json_decode($question->options, true);
                                                                @endphp
                                                                @if (is_array($options))
                                                                    @foreach ($options as $index => $option)
                                                                        <li>
                                                                            <span
                                                                                class="option-label">{{ chr(65 + $index) }}.</span>
                                                                            {{ $option }}
                                                                        </li>
                                                                    @endforeach
                                                                @else
                                                                    <li>No options available</li>
                                                                @endif
                                                            </ol>
                                                            <strong class="answer">Answer:</strong>
                                                            <span class="answer-text">{{ $question->answer }}</span>
                                                        </li>
                                                        @php $serial++; @endphp
                                                    @endforeach
                                                @else
                                                    <li>No questions available</li>
                                                @endif
                                            </ol>
                                        </div>
                                    </div>
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
        .question-list {
            font-size: 16px;
            line-height: 1.6;
        }

        .question-list li {
            font-size: 12px;
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

            .answer,
            .answer-text {
                display: none !important;
            }

            .print-btn {
                display: none !important;
            }

            .answer,
            .answer-text {
                display: none !important;
            }

            .row {
                display: flex !important;
                flex-wrap: nowrap !important;
            }

            .col-md-4 {
                flex: 1 !important;
                max-width: 50% !important;
            }

            .offset-md-2 {
                margin-left: 0 !important;
            }
        }
    </style>
@endpush

@push('js')
    <script>
        function printExam() {
            document.querySelectorAll('.answer, .answer-text').forEach(element => {
                element.style.display = 'none';
            });

            var printContents = document.querySelector('.card').innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            location.reload();
        }
    </script>
@endpush
