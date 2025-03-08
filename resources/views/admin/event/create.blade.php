@extends('admin.layouts.master')
@section('manage-frontend', 'menu-open')
@section('event', 'active')

@section('main-content')
    <div class="content-wrapper mb-4">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Event</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Event</li>
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
                                    @if (!isset($event))
                                        Event Create
                                    @else
                                        Event Edit
                                    @endif
                                </h3>
                                <a href="{{ route('admin.event.index') }}" class="btn btn_new_info float-right"> Back <a>
                            </div>
                            <div class="row">
                                <div class="col-md-10 offset-md-1">
                                    <div class="card-body">
                                        @if (!isset($event))
                                            <form action="{{ route('admin.event.store') }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="row p-4">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="">Title<span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" name="title" required
                                                                value="{{ old('title') }}"
                                                                class="form-control custom_form_control" id=""
                                                                required>
                                                            <span class="text-danger">
                                                                @error('title')
                                                                    {{ $message }}
                                                                @enderror
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="">Event Date<span
                                                                    class="text-danger">*</span></label>
                                                            <input type="date" name="date" required
                                                                value="{{ old('date') }}"
                                                                class="form-control custom_form_control" id="date">
                                                            <span class="text-danger">
                                                                @error('date')
                                                                    {{ $message }}
                                                                @enderror
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="">Event Time<span
                                                                    class="text-danger">*</span></label>
                                                            <input type="time" name="time" required
                                                                value="{{ old('time') }}"
                                                                class="form-control custom_form_control" id="time">
                                                            <span class="text-danger">
                                                                @error('time')
                                                                    {{ $message }}
                                                                @enderror
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="">Location<span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" name="location" required
                                                                value="{{ old('location') }}"
                                                                class="form-control custom_form_control" id="location">
                                                            <span class="text-danger">
                                                                @error('location')
                                                                    {{ $message }}
                                                                @enderror
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="">Short Description<span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" name="short_description" required
                                                                value="{{ old('short_description') }}"
                                                                class="form-control custom_form_control" id="">
                                                            <span class="text-danger">
                                                                @error('short_description')
                                                                    {{ $message }}
                                                                @enderror
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputFile">Image<span
                                                                    class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <div class="custom-file">
                                                                    <input type="file" name="image" required
                                                                        class="custom-file-input" id="imageInput">
                                                                    <label class="custom-file-label"
                                                                        for="exampleInputFile">Choose file</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <img src="{{ asset('backend/images/no-image.png') }}"
                                                                id="imagePreview" class="custom-img" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="">Description<span
                                                                    class="text-danger">*</span><small
                                                                    class="text-danger"></small></label>
                                                            <textarea name="description" id="summernote" cols="100" rows="10" class="form-control" required>{{ old('description') }}</textarea>
                                                            <span class="text-danger">
                                                                @error('description')
                                                                    {{ $message }}
                                                                @enderror
                                                            </span>
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
                                            <form action="{{ route('admin.event.update', $event->id) }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="row p-4">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="">Title<span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" name="title" required
                                                                value="{{ $event->title }}"
                                                                class="form-control custom_form_control" id=""
                                                                required>
                                                            <span class="text-danger">
                                                                @error('title')
                                                                    {{ $message }}
                                                                @enderror
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="">Event Date<span
                                                                    class="text-danger">*</span></label>
                                                            <input type="date" name="date" required
                                                                value="{{ $event->date }}"
                                                                class="form-control custom_form_control" id="date">
                                                            <span class="text-danger">
                                                                @error('date')
                                                                    {{ $message }}
                                                                @enderror
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="">Event Time<span
                                                                    class="text-danger">*</span></label>
                                                            <input type="time" name="time" required
                                                                value="{{ $event->time }}"
                                                                class="form-control custom_form_control" id="time">
                                                            <span class="text-danger">
                                                                @error('time')
                                                                    {{ $message }}
                                                                @enderror
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="">Location<span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" name="location" required
                                                                value="{{ $event->location }}"
                                                                class="form-control custom_form_control" id="location">
                                                            <span class="text-danger">
                                                                @error('location')
                                                                    {{ $message }}
                                                                @enderror
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="">Short Description<span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" name="short_description" required
                                                                value="{{ $event->short_description }}"
                                                                class="form-control custom_form_control" id="">
                                                            <span class="text-danger">
                                                                @error('short_description')
                                                                    {{ $message }}
                                                                @enderror
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputFile">Image<span
                                                                    class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <div class="custom-file">
                                                                    <input type="file" name="image"
                                                                        class="custom-file-input" id="imageInput">
                                                                    <label class="custom-file-label"
                                                                        for="exampleInputFile">Choose file</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <img src="{{ asset($event->image) }}"
                                                                id="imagePreview" class="custom-img" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="">Description<span
                                                                    class="text-danger">*</span><small
                                                                    class="text-danger"></small></label>
                                                            <textarea name="description" id="summernote" cols="100" rows="10" class="form-control" required>{{ $event->description }}</textarea>
                                                            <span class="text-danger">
                                                                @error('description')
                                                                    {{ $message }}
                                                                @enderror
                                                            </span>
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
@endpush
