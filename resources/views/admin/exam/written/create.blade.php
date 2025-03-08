@extends('admin.layouts.master')
@section('manage-exam', 'menu-open')
@section('written-exam', 'active')

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
                            <li class="breadcrumb-item active">Exam Create</li>
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
                                <h3 class="card-title">Create Exam</h3>
                                <a href="{{ route('admin.written-exams.index') }}" class="btn btn_new_info float-right">
                                    <i class="fa fa-arrow-left"></i>
                                    Back
                                    </a>
                            </div>
                            <!-- /.card-header -->
                            <div class="row">
                                <div class="col-md-6 offset-md-2">
                                    <div class="card-body">
                                        <form action="{{ route('admin.written-exams.store') }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="">Exam Name <small
                                                                class="text-danger">*</small></label>
                                                        <input type="text" name="exam_name" value="{{ old('exam_name') }}"
                                                            class="form-control custom_form_control" id="">
                                                        <span class="text-danger">
                                                            @error('exam_name')
                                                                {{ $message }}
                                                            @enderror
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="">Batch Select</label>
                                                        <select name="batch_id[]" class="custom_form_control form-control js-example-templating" multiple>
                                                            <option value="" disabled>Select</option>
                                                            @foreach($batches as $batch)
                                                                <option value="{{ $batch->id }}">{{ $batch->name }}</option>
                                                            @endforeach
                                                        </select>

                                                        <small class="text-danger">
                                                            @error('batch_id')
                                                            {{ $message }}
                                                            @enderror
                                                        </small>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="">Course Select</label>
                                                        <select name="course_id" class="custom_form_control form-control js-example-templating">
                                                            <option value="" selected disabled>Select</option>
                                                            @foreach($courses as $course)
                                                                <option value="{{ $course->id }}">{{ $course->name }}</option>
                                                            @endforeach
                                                        </select>

                                                        <small class="text-danger">
                                                            @error('course_id')
                                                            {{ $message }}
                                                            @enderror
                                                        </small>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="">Exam Title <small
                                                                class="text-danger">*</small></label>
                                                        <input type="text" name="exam_title" value="{{ old('exam_title') }}"
                                                               class="form-control custom_form_control" id="">
                                                        <span class="text-danger">
                                                            @error('exam_title')
                                                            {{ $message }}
                                                            @enderror
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="">Question Choose<small
                                                                class="text-danger"></small></label>
                                                        <input type="text" name="question_choose" value="{{ old('question_choose') }}"
                                                               class="form-control custom_form_control" id="">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="">Total Mark <small
                                                                class="text-danger">*</small></label>
                                                        <input type="number" name="total_mark" value="{{ old('total_mark') }}"
                                                               class="form-control custom_form_control" id="">
                                                        <span class="text-danger">
                                                            @error('total_mark')
                                                            {{ $message }}
                                                            @enderror
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="">Time <small
                                                                class="text-danger">*</small></label>
                                                        <input type="text" name="time" value="{{ old('time') }}"
                                                               class="form-control custom_form_control" id="">
                                                        <span class="text-danger">
                                                            @error('time')
                                                            {{ $message }}
                                                            @enderror
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="">Date <small
                                                                class="text-danger">*</small></label>
                                                        <input type="date" name="date" value="{{ old('date') }}"
                                                               class="form-control custom_form_control" id="">
                                                        <span class="text-danger">
                                                            @error('date')
                                                            {{ $message }}
                                                            @enderror
                                                        </span>
                                                    </div>
                                                </div>
                                                <table class="jsgrid-table mb-5">
                                                    <tr class="jsgrid-header-row">
                                                        <th class="text-start" style="width:370px; padding-left: 10px">Question</th>
                                                        <th class=""></th>
                                                    </tr>

                                                    <tr class="jsgrid-insert-row pb-4 append-coloum">
                                                        <td class="jsgrid-cell">
                                                            <input type="text" class="form-control question-input"
                                                                   style="width: 640px; margin-left: 10px;"
                                                                   name="question[]"
                                                                   maxlength="180"
                                                                   oninput="validateInput(this)"
                                                                   required>
                                                            <small class="text-success char-count" style="margin-left: 10px">0 / 180</small>
                                                        </td>
                                                        <td class="jsgrid-cell p-3 ml-2" style="width:50px;">
                                                            <a href="#" class="add-row btn btn-sm btn-info btn-xs" style="margin-bottom: 28px;" onclick="plus(event)">
                                                                <i class="fas fa-plus"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
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
        function plus(event) {
            event.preventDefault();

            $(".append-coloum:last").after(`
        <tr class="jsgrid-insert-row pb-4 append-coloum">
            <td class="jsgrid-cell">
                <input type="text" class="form-control question-input"
                       style="width: 640px; margin-left: 10px;"
                       name="question[]"
                       maxlength="180"
                       oninput="validateInput(this)"
                       required>
                <small class="text-success char-count" style="margin-left: 10px">0 / 180</small>
            </td>
            <td class="jsgrid-cell p-3 ml-2" style="width:50px;">
                <a href="#" class="remove-row btn btn-sm btn-danger btn-xs" style="margin-bottom: 28px;" onclick="removeElement(event, this)">
                    <i class="fas fa-trash"></i>
                </a>
            </td>
        </tr>
    `);
        }


        function removeElement(event, button) {
            event.preventDefault();
            $(button).closest('.append-coloum').remove();
        }


        function validateInput(input) {
            let maxLength = 180;
            let charCount = input.value.length;
            let counter = $(input).siblings(".char-count");

            if (charCount > maxLength) {
                input.value = input.value.substring(0, maxLength);
                charCount = maxLength;
            }

            counter.text(charCount + " / " + maxLength);
        }
    </script>
@endpush
