@extends('admin.layouts.master')
@section('manage-certificate', 'menu-open')
@section('certificate_setting', 'active')

@section('main-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Setting</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Setting</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            {{-- <h3 class="card-title text-center"> setting</h3> --}}
                        </div>
                        <!-- /.card-header -->
                        <div class="row">
                            <div class="card-body">
                                <h4 style="text-align:center">Certificate Settings Option</h4>
                                <form action="{{ route('admin.certificate.setting.update',$setting->id) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-10 p-4 mx-auto">
                                            <div class="card p-4">
                                                <h4 class="pb-2 text-center" style="font-weight: bold;">Certificate
                                                    Settings</h4>
                                                <div class="row pb-5">
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="exampleInputFile">Courier Amount<span
                                                                    class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <div class="custom-file">
                                                                    <input type="hidden" name="type[]" id=""
                                                                        value="curier_amount">
                                                                    <input type="text" oninput="this.value=this.value.replace(/[^0-9]/g,'')" name="curier_amount" value="{{ get_setting('curier_amount')->value ?? '' }}"  class="form-control custom_form_control" id="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="exampleInputFile">Chairman Signature<span
                                                                    class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <div class="custom-file">
                                                                    <input type="hidden" name="type[]" id=""
                                                                        value="chairman_signature">
                                                                    <input type="file" name="chairman_signature"
                                                                        class="custom-file-input" id="imageInput2">
                                                                    <label class="custom-file-label"
                                                                        for="exampleInputFile">Choose file</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <img src=" {{ asset( get_setting('chairman_signature')->value) }}"
                                                                id="imagePreview2" class="custom-img" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="exampleInputFile">Director Signature<span
                                                                    class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <div class="custom-file">
                                                                    <input type="hidden" name="type[]" id=""
                                                                        value="director_signature">

                                                                    <input type="file" name="director_signature"
                                                                        class="custom-file-input" id="imageInput3">
                                                                    <label class="custom-file-label"
                                                                        for="exampleInputFile">Choose file</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <img  src=" {{ asset( get_setting('director_signature')->value) }}"
                                                                id="imagePreview3" class="custom-img" alt="">
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="form-group m-auto">
                                                    <button type="submit" style="width:300px"
                                                        class="btn btn_sub_info float-right">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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
        $('#imageInput2').change(function() {
            var input = this;
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#imagePreview2').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        });
        $('#imageInput3').change(function() {
            var input = this;
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#imagePreview3').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        });
    });
</script>

@endpush
