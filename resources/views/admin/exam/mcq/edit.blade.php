@extends('admin.layouts.master')
@section('manage-exam', 'menu-open')
@section('mcq-list', 'active')

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
                            <li class="breadcrumb-item active">MCQ Edit</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Edit MCQ</h3>
                                <a href="{{ route('admin.mcq-exams.index') }}" class="btn btn_new_info float-right">
                                    <i class="fa fa-arrow-left"></i>
                                    Back
                                </a>
                            </div>
                            <!-- /.card-header -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-body">
                                        <form action="{{ route('admin.mcq-exams.update', $exam->id) }}" method="post"
                                              enctype="multipart/form-data">
                                            @csrf
                                            @method('put')
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="">Exam Name <small
                                                                class="text-danger">*</small></label>
                                                        <input type="text" name="exam_name" value="{{ old('exam_name', $exam->exam_name) }}"
                                                               class="form-control custom_form_control" id="">
                                                        <span class="text-danger">
                                                            @error('exam_name')
                                                            {{ $message }}
                                                            @enderror
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="">Batch Select</label>
                                                        @php
                                                            $selected_batches = json_decode($exam->batch_id, true) ?? [];
                                                        @endphp
                                                        <select name="batch_id[]" class="custom_form_control form-control js-example-templating" multiple>
                                                            <option value="" disabled>Select</option>
                                                            @foreach($batches as $batch)
                                                                <option value="{{ $batch->id }}" @if(in_array($batch->id, $selected_batches)) selected @endif>
                                                                    {{ $batch->name }}
                                                                </option>
                                                            @endforeach

                                                        </select>

                                                        <small class="text-danger">
                                                            @error('batch_id')
                                                            {{ $message }}
                                                            @enderror
                                                        </small>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="">Course Select</label>
                                                        <select name="course_id" class="custom_form_control form-control js-example-templating">
                                                            <option value="" selected disabled>Select</option>
                                                            @foreach($courses as $course)
                                                                <option value="{{ $course->id }}" @if($course->id == $exam->course_id) selected @endif>{{ $course->name }}</option>
                                                            @endforeach
                                                        </select>

                                                        <small class="text-danger">
                                                            @error('course_id')
                                                            {{ $message }}
                                                            @enderror
                                                        </small>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="">Exam Title <small
                                                                class="text-danger">*</small></label>
                                                        <input type="text" name="exam_title" value="{{ old('exam_title', $exam->exam_title) }}"
                                                               class="form-control custom_form_control" id="">
                                                        <span class="text-danger">
                                                            @error('exam_title')
                                                            {{ $message }}
                                                            @enderror
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="">Total Mark <small
                                                                class="text-danger">*</small></label>
                                                        <input type="number" name="total_mark" value="{{ old('total_mark', $exam->total_mark) }}"
                                                               class="form-control custom_form_control" id="">
                                                        <span class="text-danger">
                                                            @error('total_mark')
                                                            {{ $message }}
                                                            @enderror
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="">Time <small
                                                                class="text-danger">*</small></label>
                                                        <input type="text" name="time" value="{{ old('time', $exam->time) }}"
                                                               class="form-control custom_form_control" id="">
                                                        <span class="text-danger">
                                                            @error('time')
                                                            {{ $message }}
                                                            @enderror
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="">Date <small
                                                                class="text-danger">*</small></label>
                                                        <input type="date" name="date" value="{{ old('date', $exam->date) }}"
                                                               class="form-control custom_form_control" id="">
                                                        <span class="text-danger">
                                                            @error('date')
                                                            {{ $message }}
                                                            @enderror
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-4">

                                                </div>
                                                <div class="col-12">
                                                    <small class="text-danger" id="max-question-warning" style="display:none;">Maximum 40 questions allowed</small>
                                                </div>

                                                <table id="mcq-container">
                                                    <tbody>
                                                    @foreach($exam->questions as $index => $question)
                                                        <tr class="jsgrid-insert-row pb-4 append-column">
                                                            <td class="jsgrid-cell">
                                                                <input type="text" class="form-control question-input"
                                                                       name="question[{{ $index }}]" maxlength="180" style="width: 700px; margin-left: 10px;"
                                                                       oninput="validateInput(this)" value="{{ $question->question }}" required>
                                                                <small class="text-danger char-count" style="margin-left: 10px; display: none;">Max 180 Characters</small>
                                                            </td>
                                                            <td class="jsgrid-cell">
                                                                <div class="options-container mt-2">
                                                                    @foreach(range(0, 3) as $optionIndex)
                                                                        <input type="text" oninput="validateInputOpt4(this)" maxlength="80" style="width: 350px; margin-left: 5px;"
                                                                               class="form-control option-input"
                                                                               name="options[{{ $index }}][{{ $optionIndex }}]"
                                                                               placeholder="Option {{ chr(65 + $optionIndex) }}"
                                                                               value="{{ $question->options[$optionIndex] ?? '' }}" required>
                                                                        <small class="text-danger char-count-opt4" style="margin-left: 50px; display: none;">Max 80 Characters</small>
                                                                    @endforeach
                                                                </div>
                                                            </td>
                                                            <td class="jsgrid-cell">
                                                                <select class="form-control answer-input" name="answer[{{ $index }}]" required>
                                                                    <option value="A" {{ $question->answer == 'A' ? 'selected' : '' }}>A</option>
                                                                    <option value="B" {{ $question->answer == 'B' ? 'selected' : '' }}>B</option>
                                                                    <option value="C" {{ $question->answer == 'C' ? 'selected' : '' }}>C</option>
                                                                    <option value="D" {{ $question->answer == 'D' ? 'selected' : '' }}>D</option>
                                                                </select>
                                                                <small class="text-danger char-count-opt-ans" style="margin-left: 50px; display: none;">Max 80 Characters</small>
                                                            </td>
                                                            <td class="jsgrid-cell p-3 ml-2">
                                                                @if($loop->first)
                                                                    <a href="#" class="add-row btn btn-sm btn-info btn-xs" onclick="plus(event)">
                                                                        <i class="fas fa-plus"></i>
                                                                    </a>
                                                                @else
                                                                    <a href="#" class="remove-row btn btn-sm btn-danger btn-xs" onclick="removeElement(event, this)">
                                                                        <i class="fas fa-trash"></i>
                                                                    </a>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>



                                                <div class="col-6 offset-md-1">
                                                    <div class="form-group">
                                                        <button type="submit"
                                                                class="btn btn_sub_info float-right">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
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
    <script>
        $(document).ready(function() {

            $(".js-example-templating").select2({
                placeholder: "Select",
                allowClear: true
            });

            $('#imageInput').change(function() {
                var input = this;
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#imagePreview').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            });
        });
    </script>

    <script type="text/javascript">
        function validateInput(input) {
            let maxLength = 180;
            let charCount = input.value.length;
            let counter = $(input).siblings(".char-count");

            if (charCount >= maxLength) {
                counter.text("Max 180 Characters");
                counter.show();
            } else {
                counter.hide();
            }
        }

        function validateInputOpt4(input) {
            let maxLength = 80;
            let charCount = input.value.length;
            let counter = $(input).siblings(".char-count-opt4");

            if (charCount >= maxLength) {
                counter.text("Max 80 Characters");
                counter.show();
            } else {
                counter.hide();
            }
        }

        function validateInputOpts(input) {
            let maxLength = 80;
            let charCount = input.value.length;
            let counter = $(input).siblings(".char-count-opts");

            if (charCount >= maxLength) {
                counter.text("Max 80 Characters");
                counter.show();
            } else {
                counter.hide();
            }
        }

        function validateInputOPt1(input) {
            let maxLength = 80;
            let charCount = input.value.length;
            let counter = $(input).siblings(".char-count-opt1");

            if (charCount >= maxLength) {
                counter.text("Max 80 Characters");
                counter.show();
            } else {
                counter.text("Max 80 Characters");
                counter.hide();
            }
        }

        function validateInputOPt2(input) {
            let maxLength = 80;
            let charCount = input.value.length;
            let counter = $(input).siblings(".char-count-opt2");

            if (charCount >= maxLength) {
                counter.text("Max 80 Characters");
                counter.show();
            } else {
                counter.text("Max 80 Characters");
                counter.hide();
            }
        }

        function validateInputOPt3(input) {
            let maxLength = 80;
            let charCount = input.value.length;
            let counter = $(input).siblings(".char-count-opt3");

            if (charCount >= maxLength) {
                counter.text("Max 80 Characters");
                counter.show();
            } else {
                counter.text("Max 80 Characters");
                counter.hide();
            }
        }

        function validateInputOPtans(input) {
            let maxLength = 80;
            let charCount = input.value.length;
            let counter = $(input).siblings(".char-count-opt-ans");

            if (charCount >= maxLength) {
                counter.text("Max 80 Characters");
                counter.show();
            } else {
                counter.text("Max 80 Characters");
                counter.hide();
            }
        }

        let questionCount = 1;

        function plus(event) {
            event.preventDefault();
            if (questionCount >= 40) {
                document.getElementById('max-question-warning').style.display = 'block';
                return;
            }

            let newIndex1 = questionCount;
            questionCount++;
            let totalRows = $(".append-column").length;
            let newIndex = totalRows;

            $("#mcq-container").append(`
        <tr class="jsgrid-insert-row pb-4 append-column">
            <td class="jsgrid-cell">
                <input type="text" class="form-control question-input"
                       name="question[${newIndex}]" maxlength="180"  style="width: 700px; margin-left: 10px;"  oninput="validateInput(this)" required>
                <small class="text-danger char-count" style="margin-left: 10px; display: none;">Max 180 Characters</small>
            </td>
            <td class="jsgrid-cell">
                <div class="options-container mt-2">
                    <input type="text" oninput="validateInputOpts(this)" maxlength="80" style="width: 350px; margin-left: 5px;" class="form-control option-input"
                           name="options[${newIndex}][0]" placeholder="Option A" required>
                    <small class="text-danger char-count-opts" style="margin-left: 50px; display: none;">Max 80 Characters</small>
                    <input type="text" oninput="validateInputOPt1(this)" maxlength="80" style="width: 350px; margin-left: 5px;" class="form-control option-input"
                           name="options[${newIndex}][1]" placeholder="Option B" required>
                    <small class="text-danger char-count-opt1" style="margin-left: 50px; display: none;">Max 80 Characters</small>

                    <input type="text" oninput="validateInputOPt2(this)" maxlength="80" style="width: 350px; margin-left: 5px;" class="form-control option-input"
                           name="options[${newIndex}][2]" placeholder="Option C" required>
                    <small class="text-danger char-count-opt2" style="margin-left: 50px; display: none;">Max 80 Characters</small>

                    <input type="text" oninput="validateInputOPt3(this)" maxlength="80" style="width: 350px; margin-left: 5px;" class="form-control option-input"
                           name="options[${newIndex}][3]" placeholder="Option D" required>
                    <small class="text-danger char-count-opt3" style="margin-left: 50px; display: none;">Max 80 Characters</small>

                </div>
            </td>
            <td class="jsgrid-cell">
                <select class="form-control answer-input" name="answer[${newIndex}]" required>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                </select>
                <small class="text-danger char-count-opt-ans" style="margin-left: 50px; display: none;">Max 80 Characters</small>
            </td>
            <td class="jsgrid-cell p-3 ml-2">
                <a href="#" class="remove-row btn btn-sm btn-danger btn-xs" onclick="removeElement(event, this)">
                    <i class="fas fa-trash"></i>
                </a>
            </td>
        </tr>
    `);
        }

        function removeElement(event, element) {
            event.preventDefault();
            $(element).closest("tr").remove();
            questionCount--;

            $(".append-column").each(function(index) {
                $(this).find(".question-input").attr("name", `question[${index}]`);
                $(this).find(".answer-input").attr("name", `answer[${index}]`);
                $(this).find(".option-input").each(function(optionIndex) {
                    $(this).attr("name", `options[${index}][${optionIndex}]`);
                });
            });
        }

    </script>

@endpush
