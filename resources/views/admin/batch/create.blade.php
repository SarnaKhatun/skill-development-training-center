@extends('admin.layouts.master')
@section('manage-batch', 'menu-open')
@section('batch', 'active')

@section('main-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Batch</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Batch</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-8 mx-auto">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">@if(!isset($batch)) Batch Create @else Batch Edit @endif</h3>
                                <a href="{{ route('admin.batch.index') }}" class="btn btn_new_info float-right" data-toggle="modal" data-target="#create">
                                     Back <a>
                            </div>
                            <div class="card-body">
                                @if(!isset($batch))
                                <form action="{{ route('admin.batch.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row p-4">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="">Name<span
                                                    class="text-danger">*</span></label>
                                                <input type="text" name="name"
                                                    value="{{ old('name') }}"
                                                    class="form-control custom_form_control"
                                                    id="" >
                                                <span class="text-danger">
                                                    @error('name')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="">Start Time<span
                                                        class="text-danger">*</span></label>
                                                <input type="time" name="start_time"
                                                    value="{{ old('start_time') }}"
                                                    class="form-control custom_form_control"
                                                    id="" required>
                                                <span class="text-danger">
                                                    @error('start_time')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="">End Time<span
                                                        class="text-danger">*</span></label>
                                                <input type="time" name="end_time"
                                                    value="{{ old('end_time') }}"
                                                    class="form-control custom_form_control"
                                                    id="" required>
                                                <span class="text-danger">
                                                    @error('end_time')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="exampleFormControlInput3" class="form-label">Week days<span
                                                    class="text-danger">*</span></label><br>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="weekdays[]" type="checkbox" id="" value="Sat">
                                                <label class="form-check-label" for="">Sat</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="weekdays[]" type="checkbox" id="" value="Sun">
                                                <label class="form-check-label" for="">Sun</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="weekdays[]" type="checkbox" id="" value="Mon">
                                                <label class="form-check-label" for="">Mon</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="weekdays[]" type="checkbox" id="" value="Tue">
                                                <label class="form-check-label" for="">Tue</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="weekdays[]" type="checkbox" id="" value="Wed">
                                                <label class="form-check-label" for="">Wed</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="weekdays[]" type="checkbox" id="" value="Thu">
                                                <label class="form-check-label" for="">Thu</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="weekdays[]" type="checkbox" id="" value="Fri">
                                                <label class="form-check-label" for="">Fri</label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="">Total Sit<span
                                                        class="text-danger">*</span></label>
                                                <input type="number" name="total_sit" min="1"
                                                    value="{{ old('total_sit') }}"
                                                    class="form-control custom_form_control"
                                                    id="" required>
                                                <span class="text-danger">
                                                    @error('total_sit')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="">Description<small
                                                        class="text-danger">(max 450)</small></label>
                                                <textarea name="description" id="" cols="100" rows="5" class="form-control">{{ old('description') }}</textarea>
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
                                            <button type="submit" class="btn btn_sub_info float-right">Submit</button>
                                        </div>
                                    </div>
                                </form>
                                @else
                                <form action="{{ route('admin.batch.update',$batch->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row p-4">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="">Name<span
                                                    class="text-danger">*</span></label>
                                                <input type="text" name="name"
                                                    value="{{$batch->name }}"
                                                    class="form-control custom_form_control"
                                                    id="" >
                                                <span class="text-danger">
                                                    @error('name')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="">Start Time<span
                                                        class="text-danger">*</span></label>
                                                <input type="time" name="start_time"
                                                    value="{{ $batch->start_time  }}"
                                                    class="form-control custom_form_control"
                                                    id="" required>
                                                <span class="text-danger">
                                                    @error('start_time')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="">End Time<span
                                                        class="text-danger">*</span></label>
                                                <input type="time" name="end_time"
                                                    value="{{$batch->end_time  }}"
                                                    class="form-control custom_form_control"
                                                    id="" required>
                                                <span class="text-danger">
                                                    @error('end_time')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="exampleFormControlInput3"
                                                class="form-label">Week days<span
                                                    class="text-danger">*</span></label><br>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input"
                                                    name="weekdays[]" type="checkbox"
                                                    id="sat_checkbox" value="Sat" {{
                                                    in_array('Sat', explode(',',
                                                    $batch->weekdays)) ? 'checked' : ''
                                                }}>
                                                <label class="form-check-label"
                                                    for="sat_checkbox">Sat</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input"
                                                    name="weekdays[]" type="checkbox"
                                                    id="sun_checkbox" value="Sun" {{
                                                    in_array('Sun', explode(',',
                                                    $batch->weekdays)) ? 'checked' : ''
                                                }}>
                                                <label class="form-check-label"
                                                    for="sun_checkbox">Sun</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input"
                                                    name="weekdays[]" type="checkbox"
                                                    id="mon_checkbox" value="Mon" {{
                                                    in_array('Mon', explode(',',
                                                    $batch->weekdays)) ? 'checked' : ''
                                                }}>
                                                <label class="form-check-label"
                                                    for="mon_checkbox">Mon</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input"
                                                    name="weekdays[]" type="checkbox"
                                                    id="" value="Tue" {{ in_array('Tue',
                                                    explode(',', $batch->weekdays)) ?
                                                'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="">Tue</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input"
                                                    name="weekdays[]" type="checkbox"
                                                    id="" value="Wed" {{ in_array('Wed',
                                                    explode(',', $batch->weekdays)) ?
                                                'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="">Wed</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input"
                                                    name="weekdays[]" type="checkbox"
                                                    id="" value="Thu" {{ in_array('Thu',
                                                    explode(',', $batch->weekdays)) ?
                                                'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="">Thu</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input"
                                                    name="weekdays[]" type="checkbox"
                                                    id="" value="Fri" {{ in_array('Fri',
                                                    explode(',', $batch->weekdays)) ?
                                                'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="">Fri</label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="">Total Sit<span
                                                        class="text-danger">*</span></label>
                                                <input type="number" name="total_sit" min="1"
                                                    value="{{$batch->total_sit  }}"
                                                    class="form-control custom_form_control"
                                                    id="" required>
                                                <span class="text-danger">
                                                    @error('total_sit')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="">Description<small
                                                        class="text-danger">(max 450)</small></label>
                                                <textarea name="description" id="" cols="100" rows="5" class="form-control">{{ $batch->description  }}</textarea>
                                                <span class="text-danger">
                                                    @error('description')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn_sub_info float-right">Submit</button>
                                        </div>
                                    </div>
                                </form>
                                @endif
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


