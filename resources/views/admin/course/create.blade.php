@extends('admin.layouts.master')
@section('manage-course', 'menu-open')
@section('course', 'active')

@section('main-content')
    <div class="content-wrapper mb-4">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Course</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Course</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content ">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    @if (!isset($course))
                                        Course Create
                                    @else
                                        Course Edit
                                    @endif
                                </h3>
                                <a href="{{ route('admin.course.index') }}" class="btn btn_new_info float-right"> Back <a>
                            </div>
                            <div class="row">
                                <div class="col-md-10 offset-md-1">
                                    <div class="card-body">
                                        @if (!isset($course))
                                            <form action="{{ route('admin.course.store') }}" method="post"
                                                  enctype="multipart/form-data">
                                                @csrf
                                                <div class="row p-4">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="">Name<span class="text-danger">*</span></label>
                                                            <input type="text" name="name" value="{{ old('name') }}"
                                                                   class="form-control custom_form_control" id="" required>
                                                            <span class="text-danger">
                                                        @error('name')
                                                                {{ $message }}
                                                                @enderror
                                                    </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="">Course Fee<span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" name="course_fee" required
                                                                   value="{{ old('course_fee') }}"
                                                                   class="form-control custom_form_control" id="course_fee"
                                                                   oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                                            <span class="text-danger">
                                                        @error('course_fee')
                                                                {{ $message }}
                                                                @enderror
                                                    </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="">Discount</label>
                                                            <input type="text" name="discount" value="{{ old('discount') }}"
                                                                   class="form-control custom_form_control" id="discount"
                                                                   oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                                            <span class="text-danger">
                                                        @error('discount')
                                                                {{ $message }}
                                                                @enderror
                                                    </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="">Discount Fee</label>
                                                            <input type="text" name="discount_fee" readonly
                                                                   value="{{ old('discount_fee') }}"
                                                                   class="form-control custom_form_control" id="discount_fee"
                                                                   oninput="this.value = this.value.replace(/[^0-9]/g, '')" style="background: transparent">
                                                            <span class="text-danger">
                                                        @error('discount_fee')
                                                                {{ $message }}
                                                                @enderror
                                                    </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="">Admin Fee</label>
                                                            <input type="text" name="admin_fee"
                                                                   value="{{old('admin_fee')}}"
                                                                   class="form-control custom_form_control" id="admin_fee"
                                                                   oninput="this.value = this.value.replace(/[^0-9]/g, '')" style="background: transparent">
                                                            <span class="text-danger">
                                                        @error('admin_fee')
                                                                {{ $message }}
                                                                @enderror
                                                    </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="">Total Video</label>
                                                            <input type="text" name="total_video"
                                                                   value="{{ old('total_video') }}"
                                                                   class="form-control custom_form_control" id=""
                                                                   oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                                            <span class="text-danger">
                                                        @error('total_video')
                                                                {{ $message }}
                                                                @enderror
                                                    </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="">Total Hours</label>
                                                            <input type="text" name="total_hours"
                                                                   value="{{ old('total_hours') }}"
                                                                   class="form-control custom_form_control" id=""
                                                                   oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                                            <span class="text-danger">
                                                        @error('total_hours')
                                                                {{ $message }}
                                                                @enderror
                                                    </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="">Total Sheet</label>
                                                            <input type="text" name="total_sheet"
                                                                   value="{{ old('total_sheet') }}"
                                                                   class="form-control custom_form_control" id=""
                                                                   oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                                            <span class="text-danger">
                                                        @error('total_sheet')
                                                                {{ $message }}
                                                                @enderror
                                                    </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="">Total MCQ</label>
                                                            <input type="text" name="total_mcq" value="{{ old('total_mcq') }}"
                                                                   class="form-control custom_form_control" id=""
                                                                   oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                                            <span class="text-danger">
                                                        @error('total_mcq')
                                                                {{ $message }}
                                                                @enderror
                                                    </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="">Course Duration</label>
                                                            <input type="text" name="course_duration"
                                                                   value="{{ old('course_duration')}}"
                                                                   class="form-control custom_form_control" id=""
                                                                   oninput="">
                                                            <span class="text-danger">
                                                        @error('course_duration')
                                                                {{ $message }}
                                                                @enderror
                                                    </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputFile">Image</label>
                                                            <div class="input-group">
                                                                <div class="custom-file">
                                                                    <input type="file" name="image"
                                                                        class="custom-file-input" id="imageInput">
                                                                    <label class="custom-file-label"
                                                                        for="exampleInputFile">Choose file</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <img src="{{ asset('backend/images/no-image.png') }}"
                                                                id="imagePreview" class="custom-img"
                                                                alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="">Priority</label>
                                                            <input type="number" name="priority" value="{{ old('priority') }}"
                                                                class="form-control custom_form_control" id="">
                                                            <span class="text-danger">
                                                                @error('priority')
                                                                    {{ $message }}
                                                                @enderror
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="">Description<small class="text-danger">(max
                                                                    450)</small></label>
                                                            <textarea name="description" id="summernote" cols="100" rows="3" class="form-control">{{ old('description') }}</textarea>
                                                            <span class="text-danger">
                                                        @error('description')
                                                                {{ $message }}
                                                                @enderror
                                                    </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <div class="card-body">
                                                                    <label class="form-check-label cursor"
                                                                           for="status">Status(Active,Inactive)</label><br>
                                                                    <input type="checkbox" id="" name="status"
                                                                           value="1" class="status" checked
                                                                           data-bootstrap-switch data-off-color="danger"
                                                                           data-on-color="success">
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="card-body">
                                                                    <label class="form-check-label cursor" for="status">Course
                                                                        View
                                                                        (Online,Offline)</label><br>
                                                                    <input type="checkbox" id="" name="course_view"
                                                                           value="1" class="status" checked
                                                                           data-bootstrap-switch data-off-color="danger"
                                                                           data-on-color="success">
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="card-body">
                                                                    <label class="form-check-label cursor" for="status">Course
                                                                        Type(Unpaid,Paid)</label><br>
                                                                    <input type="checkbox" id="" name="course_type"
                                                                           value="1" class="status" checked
                                                                           data-bootstrap-switch data-off-color="danger"
                                                                           data-on-color="success">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <button type="submit"
                                                                class="btn btn_sub_info float-right">Submit</button>
                                                    </div>
                                                </div>
                                            </form>
                                        @else
                                            <form action="{{ route('admin.course.update', $course->id) }}" method="post"
                                                  enctype="multipart/form-data">
                                                @csrf
                                                <div class="row p-4">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="">Name<span class="text-danger">*</span></label>
                                                            <input type="text" name="name" value="{{ $course->name }}"
                                                                   class="form-control custom_form_control" id="" required>
                                                            <span class="text-danger">
                                                        @error('name')
                                                                {{ $message }}
                                                                @enderror
                                                    </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="">Course Fee<span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" name="course_fee" required
                                                                   value="{{ $course->course_fee }}"
                                                                   class="form-control custom_form_control" id="course_fee"
                                                                   oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                                            <span class="text-danger">
                                                        @error('course_fee')
                                                                {{ $message }}
                                                                @enderror
                                                    </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="">Discount</label>
                                                            <input type="text" name="discount"
                                                                   value="{{ $course->discount }}"
                                                                   class="form-control custom_form_control" id="discount"
                                                                   oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                                            <span class="text-danger">
                                                        @error('discount')
                                                                {{ $message }}
                                                                @enderror
                                                    </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="">Discount Fee</label>
                                                            <input type="text" name="discount_fee" readonly
                                                                   value="{{ $course->discount_fee }}"
                                                                   class="form-control custom_form_control" id="discount_fee"
                                                                   oninput="this.value = this.value.replace(/[^0-9]/g, '')" style="background: transparent">
                                                            <span class="text-danger">
                                                        @error('discount_fee')
                                                                {{ $message }}
                                                                @enderror
                                                    </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="">Admin Fee</label>
                                                            <input type="text" name="admin_fee"
                                                                   value="{{ $course->admin_fee }}"
                                                                   class="form-control custom_form_control" id="admin_fee"
                                                                   oninput="this.value = this.value.replace(/[^0-9]/g, '')" style="background: transparent">
                                                            <span class="text-danger">
                                                        @error('admin_fee')
                                                                {{ $message }}
                                                                @enderror
                                                    </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="">Total Video</label>
                                                            <input type="text" name="total_video"
                                                                   value="{{ $course->total_video }}"
                                                                   class="form-control custom_form_control" id=""
                                                                   oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                                            <span class="text-danger">
                                                        @error('total_video')
                                                                {{ $message }}
                                                                @enderror
                                                    </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="">Total Hours</label>
                                                            <input type="text" name="total_hours"
                                                                   value="{{ $course->total_hours }}"
                                                                   class="form-control custom_form_control" id=""
                                                                   oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                                            <span class="text-danger">
                                                        @error('total_hours')
                                                                {{ $message }}
                                                                @enderror
                                                    </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="">Total Sheet</label>
                                                            <input type="text" name="total_sheet"
                                                                   value="{{ $course->total_sheet }}"
                                                                   class="form-control custom_form_control" id=""
                                                                   oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                                            <span class="text-danger">
                                                        @error('total_sheet')
                                                                {{ $message }}
                                                                @enderror
                                                    </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="">Total MCQ</label>
                                                            <input type="text" name="total_mcq"
                                                                   value="{{ $course->total_mcq }}"
                                                                   class="form-control custom_form_control" id=""
                                                                   oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                                            <span class="text-danger">
                                                        @error('total_mcq')
                                                                {{ $message }}
                                                                @enderror
                                                    </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="">Course Duration</label>
                                                            <input type="text" name="course_duration"
                                                                   value="{{ $course->course_duration }}"
                                                                   class="form-control custom_form_control" id=""
                                                                   oninput="">
                                                            <span class="text-danger">
                                                        @error('course_duration')
                                                                {{ $message }}
                                                                @enderror
                                                    </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputFile">Image</label>
                                                            <div class="input-group">
                                                                <div class="custom-file">
                                                                    <input type="file" name="image"
                                                                        class="custom-file-input" id="imageInput">
                                                                    <label class="custom-file-label"
                                                                        for="exampleInputFile">Choose file</label>
                                                                </div>
                                                                @if($course->image)
                                                                    <img  src="{{ asset($course->image) }}" class="custom-img-style mt-3" alt="No Image">
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <img src="{{ asset('backend/images/no-image.png') }}"
                                                                id="imagePreview" class="custom-img"
                                                                alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="">Priority</label>
                                                            <input type="number" name="priority" value="{{ $course->priority }}"
                                                                class="form-control custom_form_control" id="">
                                                            <span class="text-danger">
                                                                @error('priority')
                                                                    {{ $message }}
                                                                @enderror
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="">Description<small class="text-danger">(max
                                                                    450)</small></label>
                                                            <textarea name="description" id="summernote" cols="100" rows="3" class="form-control">{{ $course->description }}</textarea>
                                                            <span class="text-danger">
                                                        @error('description')
                                                                {{ $message }}
                                                                @enderror
                                                    </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <div class="card-body">
                                                                    <label class="form-check-label cursor"
                                                                           for="status">Status(Active,Inactive)</label><br>
                                                                    <input type="checkbox" id=""
                                                                           {{ $course->status == 1 ? 'checked' : '' }} name="status"
                                                                           value="1" class="status" data-bootstrap-switch
                                                                           data-off-color="danger" data-on-color="success">
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="card-body">
                                                                    <label class="form-check-label cursor" for="status">Course
                                                                        View
                                                                        (Online,Offline)</label><br>
                                                                    <input type="checkbox" id=""
                                                                           {{ $course->course_view == 1 ? 'checked' : '' }}
                                                                           name="course_view" value="1" class="status"
                                                                           data-bootstrap-switch data-off-color="danger"
                                                                           data-on-color="success">
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="card-body">
                                                                    <label class="form-check-label cursor" for="status">Course
                                                                        Type(Unpaid,Paid)</label><br>
                                                                    <input type="checkbox" id=""
                                                                           {{ $course->course_type == 1 ? 'checked' : '' }}
                                                                           name="course_type" value="1" class="status"
                                                                           data-bootstrap-switch data-off-color="danger"
                                                                           data-on-color="success">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <button type="submit"
                                                                class="btn btn_sub_info float-right">Update</button>
                                                    </div>
                                                </div>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
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
    <script>
        $(document).on('keyup', '#discount', function() {
            var course_fee = parseFloat($('#course_fee').val()) || 0;
            var value = parseFloat($(this).val()) || 0;
            discount = Math.min(value, course_fee);
            var discount_fee = course_fee - discount;
            if (discount > 0) {
                $('#discount_fee').val(discount_fee) || 0;
            } else {
                $('#discount_fee').val('');
            }
            $('#discount').val(discount) || 0;
        });
        $(document).on('keyup', '#course_fee', function() {
            $('#discount').val('');
            $('#discount_fee').val('');
        });
    </script>
@endpush
