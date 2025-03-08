@extends('admin.layouts.master')
@section('manage-sms', 'menu-open')
@section('group_sms', 'active')

@section('main-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    </div>
                    <div class="col-sm-6">

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
                                <h3 class="card-title">All SMS Group</h3>
                                <a class="btn btn_new_info float-right" data-toggle="modal" data-target="#create">
                                    <i class="fa fa-plus"></i>
                                    Create
                                    <a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sl</th>
                                            <th>Name</th>
                                            <th>Total Member</th>
                                            <th>Description</th>
                                            <th class="text-center">Created Date</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($groups->isNotEmpty())
                                            @foreach ($groups as $key => $item)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $item->name ?? '' }}</td>
                                                    <td>{{ $item->total_member ?? '' }}</td>
                                                    <td>{{ $item->description ?? '' }}</td>
                                                    <td>{{ date('d M Y', strtotime($item->created_at)) }}</td>
                                                    <td class="text-center">
                                                        <span class="action-btn ">
                                                            <a href="{{ route('admin.smsgroup.show', $item->id) }}"
                                                                class=" btn-view">
                                                                <i class="fa fa-eye"></i>
                                                            </a>
                                                            <a class=" btn-edit " data-toggle="modal"
                                                                data-target="#exampleModal{{ $item->id }}">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            <a href="{{ route('admin.smsgroup.delete', $item->id) }}"
                                                                class=" btn-delete deleteButton" id="deleteButton">
                                                                <i class="fa fa-trash"></i>
                                                            </a>
                                                        </span>
                                                    </td>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModal{{ $item->id }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                                        Group Update</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form
                                                                        action="{{ route('admin.smsgroup.update', $item->id) }}"
                                                                        method="post" enctype="multipart/form-data">
                                                                        @csrf
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <div class="form-group">
                                                                                    <label for="">Name<small
                                                                                            class="text-danger">*</small></label>
                                                                                    <input type="text" name="name"
                                                                                        value="{{ $item->name }}"
                                                                                        class="form-control custom_form_control"
                                                                                        id="" required>
                                                                                    <span class="text-danger">
                                                                                        @error('name')
                                                                                            {{ $message }}
                                                                                        @enderror
                                                                                    </span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12">
                                                                                <div class="form-group">
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            for="email">Description<small
                                                                                                class="text-danger">*</small></label>
                                                                                        <textarea name="description" id="" cols="30" rows="10" required class="form-control"
                                                                                            placeholder="Write description here ... ">{{ $item->description }}</textarea>
                                                                                        <span class="text-danger">
                                                                                            @error('description')
                                                                                                {{ $message }}
                                                                                            @enderror
                                                                                        </span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Update</button>
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
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

    <!-- Modal -->
    <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Group</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.smsgroup.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Name<small class="text-danger">*</small></label>
                                    <input type="text" name="name" value="{{ old('name') }}"
                                        class="form-control custom_form_control" id="" required>
                                    <span class="text-danger">
                                        @error('name')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="email">Description<small class="text-danger">*</small></label>
                                        <textarea name="description" id="" cols="30" rows="10" required class="form-control"
                                            placeholder="Write description here ... ">{{ old('description') }}</textarea>
                                        <span class="text-danger">
                                            @error('description')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('js')
@endpush