@extends('student.layouts.master')

@section('main-content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="card p-4 shadow-sm">
                            <div class="card-header">
                                <h5>MCQ Exam Result</h5>
                                <h6 class="text-left">Total Marks: {{ round($totalMarks, 2) }}</h6>
                            </div>
                            <div class="card-body">
                                <p class="ml-2 font-weight-bold text-center">Your Submitted Answers:</p>
                                <div class="row">
                                    @php
                                        $totalQuestions = count($submittedAnswers);
                                        $leftCount = ceil($totalQuestions / 2);
                                        $rightCount = floor($totalQuestions / 2);
                                        $leftQuestions = array_slice($submittedAnswers->toArray(), 0, $leftCount);
                                        $rightQuestions = array_slice($submittedAnswers->toArray(), $leftCount);
                                    @endphp

                                    <div class="col-md-4 offset-md-2">
                                        <ol class="question-list" style="list-style-type: none; padding-left: 0;">
                                            @foreach ($leftQuestions as $index => $submitted)
                                                @php
                                                    $question = $questions[$submitted['question_id']] ?? null;
                                                @endphp
                                                @if ($question)
                                                    <li>
                                                        <strong>{{ $index + 1 }}. {{ $question->question }}</strong>
                                                        <ol class="option-list" style="list-style-type: none; padding-left: 0;">
                                                            @foreach (json_decode($question->options, true) as $optionIndex => $option)
                                                                @php
                                                                    $optionLetter = chr(65 + $optionIndex);
                                                                    $isCorrect = ($optionLetter == $question->answer);
                                                                    $isSelected = ($optionLetter == $submitted['selected_option']);
                                                                @endphp
                                                                <li>
                                                                    <label class="{{ $isCorrect ? 'text-success' : ($isSelected ? 'text-danger' : '') }}">
                                                                        <input type="radio" disabled {{ $isSelected ? 'checked' : '' }}>
                                                                        <span class="option-label">
                                                                            {{ $optionLetter }}.
                                                                        </span>
                                                                        {{ $option }}
                                                                    </label>
                                                                </li>
                                                            @endforeach
                                                        </ol>
                                                        <p class="text-success">
                                                            <strong>Correct Answer:</strong> {{ $question->answer }}
                                                        </p>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ol>
                                    </div>

                                    <div class="col-md-4 offset-md-2">
                                        <ol class="question-list" style="list-style-type: none; padding-left: 0;">
                                            @foreach ($rightQuestions as $index => $submitted)
                                                @php
                                                    $question = $questions[$submitted['question_id']] ?? null;
                                                @endphp
                                                @if ($question)
                                                    <li>
                                                        <strong>{{ $leftCount + $index + 1 }}. {{ $question->question }}</strong>
                                                        <ol class="option-list" style="list-style-type: none; padding-left: 0;">
                                                            @foreach (json_decode($question->options, true) as $optionIndex => $option)
                                                                @php
                                                                    $optionLetter = chr(65 + $optionIndex);
                                                                    $isCorrect = ($optionLetter == $question->answer);
                                                                    $isSelected = ($optionLetter == $submitted['selected_option']);
                                                                @endphp
                                                                <li>
                                                                    <label class="{{ $isCorrect ? 'text-success' : ($isSelected ? 'text-danger' : '') }}">
                                                                        <input type="radio" disabled {{ $isSelected ? 'checked' : '' }}>
                                                                        <span class="option-label">
                                                                            {{ $optionLetter }}.
                                                                        </span>
                                                                        {{ $option }}
                                                                    </label>
                                                                </li>
                                                            @endforeach
                                                        </ol>
                                                        <p class="text-success">
                                                            <strong>Correct Answer:</strong> {{ $question->answer }}
                                                        </p>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ol>
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
