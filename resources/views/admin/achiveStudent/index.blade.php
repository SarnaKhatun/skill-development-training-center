@extends('admin.layouts.master')
@section('manage-frontend', 'menu-open')
@section('achiveStudent', 'active')

@section('main-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>achiveStudent</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">achiveStudent</li>
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
                                <h3 class="card-title">All achiveStudent</h3>
                                <a href="{{ route('admin.achiveStudent.create') }}" class="btn btn_new_info float-right"
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
                                            <th>Student Name</th>
                                            <th>Description</th>
                                            <th class="text-center">Date</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($achiveStudents->isNotEmpty())
                                            @foreach ($achiveStudents as $key => $item)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $item->student->name_en ?? '' }}</td>
                                                    <td>{{ $item->description ?? '' }}</td>
                                                    <td>{{ date('d M Y', strtotime($item->created_at)) }}</td>
                                                    <td>
                                                        <span class="action-btn">
                                                            <a href="{{ route('admin.achiveStudent.edit', $item->id) }}"
                                                                class=" btn-edit " data-toggle="modal"
                                                                data-target="#exampleModal{{ $item->id }}">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            <!-- Modal -->
                                                            <div class="modal fade" id="exampleModal{{ $item->id }}"
                                                                tabindex="-1" role="dialog"
                                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                                Modal title</h5>
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form
                                                                                action="{{ route('admin.achiveStudent.update', $item->id) }}"
                                                                                method="post"
                                                                                enctype="multipart/form-data">
                                                                                @csrf
                                                                                <div class="row">
                                                                                    <div class="col-12">
                                                                                        <div class="form-group">
                                                                                            <label for="">Student<small
                                                                                                    class="text-danger">*</small></label>
                                                                                            <select name="student_id"
                                                                                                required
                                                                                                class="form-control custom_form_control">
                                                                                                <option>Select Student
                                                                                                </option>
                                                                                                @foreach ($students as $student)
                                                                                                    <option
                                                                                                        value="{{ $student->id }}" @if($student->id==$item->student_id) selected
                                                                                                        @endif>
                                                                                                        {{ $student->name_en }}
                                                                                                    </option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                            <span class="text-danger">
                                                                                                @error('student_id')
                                                                                                    {{ $message }}
                                                                                                @enderror
                                                                                            </span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-12">
                                                                                        <div class="form-group">
                                                                                            <label
                                                                                                for="">Description <span style="font-size: 12px">(max:140)</span><small
                                                                                                class="text-danger">*</small></label><br>
                                                                                            <textarea name="description" class="form-control " id="" cols="40" rows="8">{{ $item->description }}</textarea>
                                                                                            <span class="text-danger">
                                                                                                @error('description')
                                                                                                    {{ $message }}
                                                                                                @enderror
                                                                                            </span>
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
                                                            {{-- <a href="{{ route('admin.branch.show',$item->id) }}" class=" btn-view">
                                                          <i class="fa fa-eye"></i>
                                                       </a> --}}
                                                            <a href="{{ route('admin.achiveStudent.delete', $item->id) }}"
                                                                class=" btn-delete deleteButton">
                                                                <i class="fa fa-trash"></i>
                                                            </a>
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
    <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add achiveStudent</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.achiveStudent.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Student<small
                                            class="text-danger">*</small></label>
                                    <select name="student_id"
                                        required
                                        class="form-control custom_form_control">
                                        <option>Select Student
                                        </option>
                                        @foreach ($students as $student)
                                            <option
                                                value="{{ $student->id }}">
                                                {{ $student->name_en }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">
                                        @error('student_id')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Description <span style="font-size: 12px">(max:140)</span><small
                                        class="text-danger">*</small></label><br>
                                    <textarea name="description" class="form-control " id="" cols="40" rows="8">{{ old('description') }}</textarea>
                                    <span class="text-danger">
                                        @error('description')
                                            {{ $message }}
                                        @enderror
                                    </span>
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
    <script>
        $(document).ready(function() {
            $('.status').on('switchChange.bootstrapSwitch', function(event, state) {
                var staffId = $(this).data('id');
                $.ajax({
                    type: "get",
                    url: "",
                    data: {
                        id: staffId,
                        // status: state ? 1 : 0,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        toastr.options.positionClass = 'toast-bottom-right';
                        toastr.success('Status updated successfully');
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        toastr.options.positionClass = 'toast-bottom-right';
                        toastr.error('Sorry something went to wrong');
                    }
                });
            });
        });
    </script>
@endpush
