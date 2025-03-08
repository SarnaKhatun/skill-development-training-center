@extends('admin.layouts.master')
@section('manage-exam', 'menu-open')
@section('mcq-result', 'active')

@section('main-content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="card p-4 shadow-sm">
                            <div class="card-header">
                                <h5>MCQ Exam Result for {{ $student->name }}</h5>
                                <h6>Total Marks: {{ round($exam->total_mark, 2) }}</h6>
                                <h6>Obtained Marks: {{ round($obtainedMarks, 2) }}</h6>
                            </div>
                            <div class="card-body">
                                <p class="ml-2 font-weight-bold text-center">Student's Submitted Answers:</p>

                                @php
                                    $totalQuestions = count($submittedAnswers);
                                    $halfCount = ceil($totalQuestions / 2);
                                    $leftQuestions = $submittedAnswers->slice(0, $halfCount);
                                    $rightQuestions = $submittedAnswers->slice($halfCount);
                                @endphp

                                <div class="row">
                                    <div class="col-md-4 offset-md-2">
                                        <ol class="question-list" style="list-style-type: none; padding-left: 0;">
                                            @foreach ($leftQuestions as $submitted)
                                                @php
                                                    $question = $questions[$submitted->question_id] ?? null;
                                                @endphp
                                                @if ($question)
                                                    <li>
                                                        <strong>{{ $loop->iteration }}. {{ $question->question }}</strong>
                                                        <ol class="option-list" style="list-style-type: none; padding-left: 0;">
                                                            @foreach (json_decode($question->options, true) as $optionIndex => $option)
                                                                @php
                                                                    $optionLetter = chr(65 + $optionIndex);
                                                                    $isCorrect = ($optionLetter == $question->answer);
                                                                    $isSelected = ($optionLetter == $submitted->selected_option);
                                                                @endphp
                                                                <li>
                                                                    <label class="{{ $isCorrect ? 'text-success' : ($isSelected ? 'text-danger' : '') }}">
                                                                        <input type="radio" disabled {{ $isSelected ? 'checked' : '' }}>
                                                                        <span class="option-label">{{ $optionLetter }}.</span> {{ $option }}
                                                                    </label>
                                                                </li>
                                                            @endforeach
                                                        </ol>
                                                        <p class="text-success"><strong>Correct Answer:</strong> {{ $question->answer }}</p>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ol>
                                    </div>

                                    <div class="col-md-4 offset-md-2">
                                        <ol class="question-list" style="list-style-type: none; padding-left: 0;">
                                            @foreach ($rightQuestions as $submitted)
                                                @php
                                                    $question = $questions[$submitted->question_id] ?? null;
                                                @endphp
                                                @if ($question)
                                                    <li>
                                                        <strong>{{ $loop->iteration + $halfCount }}. {{ $question->question }}</strong>
                                                        <ol class="option-list" style="list-style-type: none; padding-left: 0;">
                                                            @foreach (json_decode($question->options, true) as $optionIndex => $option)
                                                                @php
                                                                    $optionLetter = chr(65 + $optionIndex);
                                                                    $isCorrect = ($optionLetter == $question->answer);
                                                                    $isSelected = ($optionLetter == $submitted->selected_option);
                                                                @endphp
                                                                <li>
                                                                    <label class="{{ $isCorrect ? 'text-success' : ($isSelected ? 'text-danger' : '') }}">
                                                                        <input type="radio" disabled {{ $isSelected ? 'checked' : '' }}>
                                                                        <span class="option-label">{{ $optionLetter }}.</span> {{ $option }}
                                                                    </label>
                                                                </li>
                                                            @endforeach
                                                        </ol>
                                                        <p class="text-success"><strong>Correct Answer:</strong> {{ $question->answer }}</p>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ol>
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer">
                                <a href="{{ route('admin.mcq.result.list') }}" class="btn btn-primary">Back to Results</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
