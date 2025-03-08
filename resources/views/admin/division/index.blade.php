@extends('admin.layouts.master')
@section('manage-address', 'menu-open')
@section('address', 'active')

@section('main-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Division</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Division</li>
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
                                <h3 class="card-title">All Division</h3>
                                <a href="{{ route('admin.division.create') }}" class="btn btn_new_info float-right"
                                    data-toggle="modal" data-target="#create">
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
                                            {{-- <th>Priority</th> --}}
                                            <th>Status</th>
                                            <th class="text-center">Date</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($divisions->isNotEmpty())
                                            @foreach ($divisions as $key => $item)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $item->name ?? '' }}</td>
                                                    {{-- <td>{{ $item->priority ?? '' }}</td> --}}
                                                    <td>
                                                        @if ($item->status == 1)
                                                            <a href="{{ route('admin.division.statusChange', $item->id) }}"><span
                                                                    class="badge bg-primary">Active</span></a>
                                                        @else
                                                            <a href="{{ route('admin.division.statusChange', $item->id) }}"><span
                                                                    class="badge bg-danger">Inactive</span></a>
                                                        @endif
                                                    </td>
                                                    <td>{{ date('d M Y', strtotime($item->created_at)) }}</td>
                                                    <td class="text-center">
                                                        <span class="action-btn ">
                                                            <a href="{{ route('admin.division.edit', $item->id) }}"
                                                                class=" btn-edit " data-toggle="modal"
                                                                data-target="#exampleModal{{ $item->id }}">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            {{-- <a href="{{ route('admin.branch.show',$item->id) }}" class=" btn-view">
                                                          <i class="fa fa-eye"></i>
                                                       </a> --}}
                                                            {{-- <a href="{{ route('admin.division.delete', $item->id) }}"
                                                                class=" btn-delete deleteButton">
                                                                <i class="fa fa-trash"></i>
                                                            </a> --}}
                                                        </span>
                                                    </td>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModal{{ $item->id }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                                        Edit Division </h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form
                                                                        action="{{ route('admin.division.update', $item->id) }}"
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
                                                                            <div class="col-6">
                                                                                <div class="card-body">
                                                                                    <input type="checkbox"
                                                                                        class="form-check-input me-2 cursor"
                                                                                        name="status" id="status"
                                                                                        {{ $item->status == 1 ? 'checked' : '' }}
                                                                                        value="1">
                                                                                    <label class="form-check-label cursor"
                                                                                        for="status">Status</label>
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
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Division</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.division.store') }}" method="post" enctype="multipart/form-data">
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
                            <div class="col-6">
                                <div class="card-body">
                                    <input type="checkbox" class="form-check-input me-2 cursor" name="status"
                                        id="status" value="1">
                                    <label class="form-check-label cursor" for="status">Status</label>
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