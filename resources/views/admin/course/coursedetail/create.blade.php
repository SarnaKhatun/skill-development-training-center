@extends('admin.layouts.master')
@section('manage-course', 'menu-open')
@section('course', 'active')

@section('main-content')
<style>
    .youtubevideo{
        display: none;
    }
    .uploadvideo{
        display: none;
    }
</style>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>CourseDetail</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">CourseDetail</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-10 mx-auto">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    @if (!isset($coursedetail))
                                        CourseDetail Create
                                    @else
                                       CourseDetail Edit
                                    @endif
                                </h3>
                                <a href="{{ route('admin.coursedetail.index') }}" class="btn btn_new_info float-right">All List<a>
                            </div>
                            <div class="card-body">
                                @if (!isset($coursedetail))
                                    <form action="{{ route('admin.coursedetail.store') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row p-4">
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="">Header Title <span style="font-size:13px">(example:lession-1)</span><span class="text-danger">*</span></label>
                                                    <input type="text" name="header_title" value="{{ old('header_title') }}"
                                                        class="form-control custom_form_control" id="" required>
                                                    <span class="text-danger">
                                                        @error('header_title')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="">Title<span class="text-danger">*</span></label>
                                                    <input type="text" name="title" value="{{ old('title') }}"
                                                        class="form-control custom_form_control" id="" required>
                                                    <span class="text-danger">
                                                        @error('title')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="">Course Name<small class="text-danger">*</small></label>
                                                    <select name="course_id" id="course_id" required class="form-control custom_form_control select2">
                                                        <option value="">Select One</option>
                                                        @foreach ($courses as $course)
                                                           <option value="{{ $course->id }}">{{ $course->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <span class="text-danger">@error('course_id'){{ $message }}@enderror</span>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="">Upload type</label>
                                                    <select name="type" id="type"  class="form-control custom_form_control select2">
                                                        <option value="0">Select One</option>
                                                        <option value="1" >Youtube link</option>
                                                        <option value="2" >Upload Video</option>
                                                    </select>
                                                    <span class="text-danger">@error('type'){{ $message }}@enderror</span>
                                                </div>
                                            </div>
                                            <div class="col-4 uploadvideo">
                                                <div class="form-group">
                                                    <label for="">Upload Video</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" name="upload_video" class="custom-file-input custom_form_control" >
                                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4 youtubevideo">
                                                <div class="form-group">
                                                    <label for="">Youtube link</label>
                                                    <input type="text" name="url_video" value="{{ old('url_video') }}"
                                                        class="form-control custom_form_control" id="">
                                                    <span class="text-danger">
                                                        @error('url_video')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="">PDF</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" name="pdf" class="custom-file-input" >
                                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="">Priority</label>
                                                    <input type="text" name="priority" required
                                                        value="{{ old('priority') }}"
                                                        class="form-control custom_form_control" id="discount_fee"
                                                        oninput="this.value = this.value.replace(/[^0-9]/g, '')">
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
                                                    <textarea name="description" id="summernote" cols="100" rows="10" class="form-control">{{ old('description') }}</textarea>
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
                                    <form action="{{ route('admin.coursedetail.update', $coursedetail->id) }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row p-4">
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="">Header Title<span class="text-danger">*</span></label>
                                                    <input type="text" name="header_title" value="{{$coursedetail->header_title}}"
                                                        class="form-control custom_form_control" id="" required>
                                                    <span class="text-danger">
                                                        @error('header_title')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="">Title<span class="text-danger">*</span></label>
                                                    <input type="text" name="title" value="{{$coursedetail->title }}"
                                                        class="form-control custom_form_control" id="" required>
                                                    <span class="text-danger">
                                                        @error('title')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="">Course Name<small class="text-danger">*</small></label>
                                                    <select name="course_id" id="course_id" required class="form-control custom_form_control select2">
                                                        <option value="">Select One</option>
                                                        @foreach ($courses as $course)
                                                           <option value="{{ $course->id }}" @if($coursedetail->course_id==$course->id) selected @endif>{{ $course->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <span class="text-danger">@error('course_id'){{ $message }}@enderror</span>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="">Upload type</label>
                                                    <select name="type" id="type"  class="form-control custom_form_control select2">
                                                        <option value="0">Select One</option>
                                                        <option value="1" @if($coursedetail->type==1) selected @endif >Youtube link</option>
                                                        <option value="2" @if($coursedetail->type==2) selected @endif>Upload Video</option>
                                                    </select>
                                                    <span class="text-danger">@error('type'){{ $message }}@enderror</span>
                                                </div>
                                            </div>
                                            <div class="col-4 @if($coursedetail->type==1 || $coursedetail->type==0) uploadvideo @endif">
                                                <div class="form-group">
                                                    <label for="">Upload Video</label>
                                                    <div class="custom-file">
                                                        <input type="file" name="upload_video" class="custom-file-input" >
                                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                    </div>
                                                </div>
{{--                                                <video width="150" height="90" controls>--}}
{{--                                                    <source src="{{ asset($coursedetail->upload_video) }}" type="video/mp4">--}}
{{--                                                  </video>--}}
                                            </div>
                                            <div class="col-4 @if($coursedetail->type==2 || $coursedetail->type==0) youtubevideo @endif">
                                                <div class="form-group">
                                                    <label for="">Youtube Link</label>
                                                    <input type="text" name="url_video"
                                                        class="form-control custom_form_control" id="" value="{{ $coursedetail->url_video }}">
                                                    <span class="text-danger">
                                                        @error('url_video')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group pb-2">
                                                    <label for="">PDF</label>
                                                    <div class="custom-file">
                                                        <input type="file" name="pdf" class="custom-file-input" >
                                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                    </div>
                                                </div>
{{--                                                @if($coursedetail->pdf)--}}
{{--                                                  <iframe  src="{{ asset($coursedetail->pdf) }}" width="60%" height="100px" alt="nothing found"></iframe>--}}
{{--                                                @endif--}}
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="">Priority</label>
                                                    <input type="text" name="priority" required
                                                        value="{{ $coursedetail->priority }}"
                                                        class="form-control custom_form_control" id="discount_fee"
                                                        oninput="this.value = this.value.replace(/[^0-9]/g, '')">
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
                                                            1000)</small></label>
                                                    <textarea name="description" id="summernote" cols="100" rows="10" class="form-control">{{ $coursedetail->description }}</textarea>
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
                                                                value="1" class="status"  {{ $coursedetail->status == 1 ? 'checked' : '' }}
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
                                @endif
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
        $(document).on('change', '#type', function() {
            var value = $(this).val();
            if (value == 1) {
                $('.uploadvideo').hide();
                $('.youtubevideo').show();
            } else if (value == 2) {
                $('.uploadvideo').show();
                $('.youtubevideo').hide();
            } else {
                $('.uploadvideo').hide();
                $('.youtubevideo').hide();
            }
        });
    </script>
@endpush
