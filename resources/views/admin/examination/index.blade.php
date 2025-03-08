@extends('admin.layouts.master')
@section('manage-student', 'menu-open')
@section('examination', 'active')

@section('main-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Examination</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashexamination</a></li>
                            <li class="breadcrumb-item active">Examination</li>
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
                                <h3 class="card-title">All Examination</h3>
                                <a href="{{ route('admin.examination.create') }}" class="btn btn_new_info float-right" data-toggle="modal" data-target="#create">
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
                                            <th class="text-center">Date</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                        <tbody>
                                        @if($examinations->isNotEmpty())
                                            @foreach($examinations as $key=>$item)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $item->name ?? "" }}</td>
                                                    <td>{{ date('d M Y',strtotime($item->created_at)) }}</td>
                                                    <td class="text-center">
                                                   <span class="action-btn">
                                                       <a href="{{ route('admin.examination.edit',$item->id) }}" class=" btn-edit " data-toggle="modal" data-target="#exampleModal{{ $item->id }}">
                                                          <i class="fa fa-edit"></i>
                                                       </a>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit examination</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('admin.examination.update',$item->id) }}" method="post" enctype="multipart/form-data">
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
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary">Update</button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                        </div>
                                                    </div>
                                                       {{-- <a href="{{ route('admin.branch.show',$item->id) }}" class=" btn-view">
                                                          <i class="fa fa-eye"></i>
                                                       </a> --}}
                                                       {{-- <a href="{{ route('admin.examination.delete',$item->id) }}" class=" btn-delete deleteButton" >
                                                          <i class="fa fa-trash"></i>
                                                       </a> --}}
                                                   </span>
                                                    </td>
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
  <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add examination</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('admin.examination.store') }}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="">Name<small
                                class="text-danger">*</small></label>
                        <input type="text" name="name"
                            value="{{ old('name') }}"
                            class="form-control custom_form_control"
                            id="" required>
                        <span class="text-danger">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
        </form>
      </div>
    </div>
  </div>
@endsection
@push('js')
@endpush
