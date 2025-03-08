@extends('admin.layouts.master')
@section('manage-setting', 'menu-open')
@section('setting', 'active')

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
                                     <h4 style="text-align:center">Settings Option</h4>
                                    @if(!isset($setting))
                                        <form action="{{ route('admin.setting.store') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-6 p-4">
                                                    <div class="card p-4">

                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="">Site Name: <small class="text-danger">*</small></label>
                                                                    <input type="hidden" name="type[]" id="" value="site_name">
                                                                    <input type="text" name="site_name" value="{{ old('site_name') }}" required class="form-control custom_form_control" id="">
                                                                    <span class="text-danger">@error('site_name'){{ $message }} @enderror</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="username">Email<small class="text-danger">*</small></label>
                                                                    <input type="hidden" name="type[]" id="" value="email">
                                                                    <input type="email" name="email" value="{{ old('email') }}" required class="form-control custom_form_control" id="">
                                                                    <span class="text-danger">@error('email'){{ $message }} @enderror</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="email">Phone<small class="text-danger">*</small></label>
                                                                    <input type="hidden" name="type[]" id="" value="phone">
                                                                    <input type="text" name="phone" value="{{ old('phone') }}"  class="form-control custom_form_control" id="">
                                                                    <span class="text-danger">@error('phone'){{ $message }} @enderror</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="email">Open & Close Hour<small class="text-danger">*</small></label>
                                                                    <input type="hidden" name="type[]" id="" value="open_hour">
                                                                    <input type="text" name="open_hour" value="{{ old('open_hour') }}"  class="form-control custom_form_control" id="">
                                                                    <span class="text-danger">@error('open_hour'){{ $message }} @enderror</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="email">Whats up</label>
                                                                    <input type="hidden" name="type[]" id="" value="whats_up">
                                                                    <input type="text" name="whats_up" oninput="this.value=this.value.replace(/[^0-9]/g,'')"  value="{{ old('whats_up') }}"  class="form-control custom_form_control" id="">
                                                                    <span class="text-danger">@error('whats_up'){{ $message }} @enderror</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="email">Address<small class="text-danger">*</small></label>
                                                                    <input type="hidden" name="type[]" id="" value="address">
                                                                    <input type="text" name="address" value="{{ old('address') }}"  class="form-control custom_form_control" id="">
                                                                    <span class="text-danger">@error('address'){{ $message }} @enderror</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6 p-4">
                                                    <div class="card p-4">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="">Facebook:</label>
                                                                    <input type="hidden" name="type[]" id="" value="facebook_link">
                                                                    <input type="text" name="facebook_link" value="{{ old('facebook_link') }}" required class="form-control custom_form_control" id="">
                                                                    <span class="text-danger">@error('facebook_link'){{ $message }} @enderror</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="">You Tube:</label>
                                                                    <input type="hidden" name="type[]" id="" value="youtube_link">
                                                                    <input type="text" name="youtube_link" value="{{ old('youtube_link') }}" required class="form-control custom_form_control" id="">
                                                                    <span class="text-danger">@error('youtube_link'){{ $message }} @enderror</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="">LinkedIn:</label>
                                                                    <input type="hidden" name="type[]" id="" value="linkedin">
                                                                    <input type="text" name="linkedin" value="{{ old('linkedin') }}" required class="form-control custom_form_control" id="">
                                                                    <span class="text-danger">@error('linkedin'){{ $message }} @enderror</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="">Pintarest:</label>
                                                                    <input type="hidden" name="type[]" id="" value="pintarest">
                                                                    <input type="text" name="pintarest" value="{{ old('pintarest') }}" required class="form-control custom_form_control" id="">
                                                                    <span class="text-danger">@error('pintarest'){{ $message }} @enderror</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="">Instagram: <small class="text-danger">*</small></label>
                                                                    <input type="hidden" name="type[]" id="" value="instagram">
                                                                    <input type="text" name="instagram" value="{{ old('instagram') }}" required class="form-control custom_form_control" id="">
                                                                    <span class="text-danger">@error('instagram'){{ $message }} @enderror</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-8 p-4 mx-auto">
                                                    <div class="card p-4">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="exampleInputFile">Header Logo<span
                                                                            class="text-danger">*</span></label>
                                                                    <div class="input-group">
                                                                        <div class="custom-file">
                                                                            <input type="hidden" name="type[]" id="" value="header_logo">
                                                                            <input type="file" name="header_logo" required
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
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="exampleInputFile">Footer Logo<span
                                                                            class="text-danger">*</span></label>
                                                                    <div class="input-group">
                                                                        <div class="custom-file">
                                                                            <input type="hidden" name="type[]" id="" value="footer_logo">
                                                                            <input type="file" name="footer_logo" required
                                                                                class="custom-file-input" id="imageInput2">
                                                                            <label class="custom-file-label"
                                                                                for="exampleInputFile">Choose file</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                    <div class="form-group">
                                                                        <img src="{{ asset('backend/images/no-image.png') }}"
                                                                            id="imagePreview2" class="custom-img" alt="">
                                                                    </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="exampleInputFile">Fav Icon<span
                                                                            class="text-danger">*</span></label>
                                                                    <div class="input-group">
                                                                        <div class="custom-file">
                                                                            <input type="hidden" name="type[]" id="" value="fav_icon">

                                                                            <input type="file" name="fav_icon" required
                                                                                class="custom-file-input" id="imageInput3">
                                                                            <label class="custom-file-label"
                                                                                for="exampleInputFile">Choose file</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                    <div class="form-group">
                                                                        <img src="{{ asset('backend/images/no-image.png') }}"
                                                                            id="imagePreview3" class="custom-img" alt="">
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 p-4 ">
                                                    <div class="card p-4">
                                                        <h4 class="pb-2 text-center" style="font-weight: bold;">Notice Settings</h4>
                                                        <div class="row pb-5">
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="email">Website Notice<small class="text-danger">*</small></label>
                                                                    <input type="hidden" name="type[]" id="" value="notice">
                                                                    <textarea name="notice" id="notice" class="form-control" maxlength="500" cols="30" rows="4">{{ get_setting('notice')->value ?? 'Null' }}</textarea>                      <span class="text-danger">@error('notice'){{ $message }} @enderror</span>
                                                                    <small id="notice-count">0/500</small>
                                                                    <span class="text-danger">@error('notice'){{ $message }} @enderror</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="email">Branch Notice<small class="text-danger">*</small></label>
                                                                    <input type="hidden" name="type[]" id="" value="branch_notice">
                                                                    <textarea name="branch_notice" id="branch_notice" class="form-control" maxlength="500" cols="30" rows="4">{{ get_setting('branch_notice')->value ?? 'Null' }}</textarea>                                                                    <span class="text-danger">@error('notice'){{ $message }} @enderror</span>
                                                                    <small id="branch_notice-count">0/500</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group m-auto">
                                                            <button type="submit" style="width:300px" class="btn btn_sub_info float-right">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    @else
                                        <form action="{{ route('admin.setting.update',$setting->id) }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-6 p-4">
                                                    <div class="card p-4">
                                                            <h4 class="pb-2 text-center" style="font-weight: bold;">Application Settings</h4>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="">Site Name edit: <small class="text-danger">*</small></label>
                                                                    <input type="hidden" name="type[]" id="" value="site_name">
                                                                    <input type="text" name="site_name" value="{{ get_setting('site_name')->value ?? 'Null' }}" required class="form-control custom_form_control" id="">
                                                                    <span class="text-danger">@error('site_name'){{ $message }} @enderror</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="username">Email<small class="text-danger">*</small></label>
                                                                    <input type="hidden" name="type[]" id="" value="email">
                                                                    <input type="email" name="email" value="{{ get_setting('email')->value ?? 'Null' }}" required class="form-control custom_form_control" id="">
                                                                    <span class="text-danger">@error('email'){{ $message }} @enderror</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="email">Phone<small class="text-danger">*</small></label>
                                                                    <input type="hidden" name="type[]" id="" value="phone">
                                                                    <input type="text" oninput="this.value=this.value.replace(/[^0-9]/g,'')" name="phone" value="{{ get_setting('phone')->value ?? 'Null' }}"  class="form-control custom_form_control" id="">
                                                                    <span class="text-danger">@error('phone'){{ $message }} @enderror</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="email">Open & Close Hour<small class="text-danger">*</small></label>
                                                                    <input type="hidden" name="type[]" id="" value="open_hour">
                                                                    <input type="text" name="open_hour" value="{{ get_setting('open_hour')->value ?? 'Null' }}"  class="form-control custom_form_control" id="">
                                                                    <span class="text-danger">@error('open_hour'){{ $message }} @enderror</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="email">Whats up</label>
                                                                    <input type="hidden" name="type[]" id="" value="whats_up">
                                                                    <input type="text" name="whats_up" oninput="this.value=this.value.replace(/[^0-9]/g,'')" value="{{ get_setting('whats_up')->value ?? 'Null' }}"  class="form-control custom_form_control" id="">
                                                                    <span class="text-danger">@error('whats_up'){{ $message }} @enderror</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="email">Address<small class="text-danger">*</small></label>
                                                                    <input type="hidden" name="type[]" id="" value="address">
                                                                    <input type="text" name="address" value="{{ get_setting('address')->value ?? 'Null' }}"  class="form-control custom_form_control" id="">
                                                                    <span class="text-danger">@error('address'){{ $message }} @enderror</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6 p-4">
                                                    <div class="card p-4">
                                                        <h4 class="pb-2 text-center" style="font-weight: bold;">Social Link Settings</h4>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="">Facebook:</label>
                                                                    <input type="hidden" name="type[]" id="" value="facebook_link">
                                                                    <input type="text" name="facebook_link" value="{{ get_setting('facebook_link')->value ?? 'Null' }}" required class="form-control custom_form_control" id="">
                                                                    <span class="text-danger">@error('facebook_link'){{ $message }} @enderror</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="">You Tube:</label>
                                                                    <input type="hidden" name="type[]" id="" value="youtube_link">
                                                                    <input type="text" name="youtube_link" value="{{ get_setting('youtube_link')->value ?? 'Null' }}" required class="form-control custom_form_control" id="">
                                                                    <span class="text-danger">@error('youtube_link'){{ $message }} @enderror</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="">LinkedIn:</label>
                                                                    <input type="hidden" name="type[]" id="" value="linkedin">
                                                                    <input type="text" name="linkedin" value="{{ get_setting('linkedin')->value ?? 'Null' }}" required class="form-control custom_form_control" id="">
                                                                    <span class="text-danger">@error('linkedin'){{ $message }} @enderror</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="">Pintarest:</label>
                                                                    <input type="hidden" name="type[]" id="" value="pintarest">
                                                                    <input type="text" name="pintarest" value="{{ get_setting('pintarest')->value ?? 'Null' }}" required class="form-control custom_form_control" id="">
                                                                    <span class="text-danger">@error('pintarest'){{ $message }} @enderror</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="">Instagram: <small class="text-danger">*</small></label>
                                                                    <input type="hidden" name="type[]" id="" value="instagram">
                                                                    <input type="text" name="instagram" value="{{ get_setting('instagram')->value ?? 'Null' }}" required class="form-control custom_form_control" id="">
                                                                    <span class="text-danger">@error('instagram'){{ $message }} @enderror</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12 p-4 ">
                                                    <div class="card p-4">
                                                        <h4 class="pb-2 text-center" style="font-weight: bold;">Logo Settings</h4>
                                                        <div class="row pb-5">
                                                            <div class="col-4">
                                                                <div class="form-group">
                                                                    <label for="exampleInputFile">Header Logo<span
                                                                            class="text-danger">*</span></label>
                                                                    <div class="input-group">
                                                                        <div class="custom-file">
                                                                            <input type="hidden" name="type[]" id="" value="header_logo">
                                                                            <input type="file" name="header_logo" header_logo
                                                                                class="custom-file-input" id="imageInput">
                                                                            <label class="custom-file-label"
                                                                                for="exampleInputFile">Choose file</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <img src="{{ asset( get_setting('header_logo')->value) }}"
                                                                        id="imagePreview" class="custom-img" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="form-group">
                                                                    <label for="exampleInputFile">Footer Logo<span
                                                                            class="text-danger">*</span></label>
                                                                    <div class="input-group">
                                                                        <div class="custom-file">
                                                                            <input type="hidden" name="type[]" id="" value="footer_logo">
                                                                            <input type="file" name="footer_logo"
                                                                                class="custom-file-input" id="imageInput2">
                                                                            <label class="custom-file-label"
                                                                                for="exampleInputFile">Choose file</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                    <div class="form-group">
                                                                        <img src="{{ asset( get_setting('footer_logo')->value) }}"
                                                                            id="imagePreview2" class="custom-img" alt="">
                                                                    </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="form-group">
                                                                    <label for="exampleInputFile">Fav Icon<span
                                                                            class="text-danger">*</span></label>
                                                                    <div class="input-group">
                                                                        <div class="custom-file">
                                                                            <input type="hidden" name="type[]" id="" value="fav_icon">

                                                                            <input type="file" name="fav_icon"
                                                                                class="custom-file-input" id="imageInput3">
                                                                            <label class="custom-file-label"
                                                                                for="exampleInputFile">Choose file</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                    <div class="form-group">
                                                                        <img src="{{ asset( get_setting('fav_icon')->value) }}"
                                                                            id="imagePreview3" class="custom-img" alt="">
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 p-4 ">
                                                    <div class="card p-4">
                                                        <h4 class="pb-2 text-center" style="font-weight: bold;">Notice Settings</h4>
                                                        <div class="row pb-5">
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="email">Website Notice<small class="text-danger">*</small></label>
                                                                    <input type="hidden" name="type[]" id="" value="notice">
                                                                    <textarea name="notice" id="notice" class="form-control" maxlength="500" cols="30" rows="4">{{ get_setting('notice')->value ?? 'Null' }}</textarea>                        <span class="text-danger">@error('notice'){{ $message }} @enderror</span>
                                                                    <small id="notice-count">0/500</small>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="email">Branch Notice<small class="text-danger">*</small></label>
                                                                    <input type="hidden" name="type[]" id="" value="branch_notice">
                                                                    <textarea name="branch_notice" id="branch_notice" class="form-control" maxlength="500" cols="30" rows="4">{{ get_setting('branch_notice')->value ?? 'Null' }}</textarea>                                                                    <span class="text-danger">@error('notice'){{ $message }} @enderror</span>
                                                                    <small id="branch_notice-count">0/500</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group m-auto">
                                                            <button type="submit" style="width:300px" class="btn btn_sub_info float-right">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    @endif
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
<script>
    document.getElementById('notice').addEventListener('input', function() {
        var maxLength = 500;
        var currentLength = this.value.length;
        var remainingLength = maxLength - currentLength;
        var countElement = document.getElementById('notice-count');
        countElement.textContent = currentLength + '/' + maxLength;
        if (remainingLength < 0) {
            countElement.classList.add('text-danger');
        } else {
            countElement.classList.remove('text-danger');
        }
    });
</script>

@endpush