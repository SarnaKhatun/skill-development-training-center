@extends('admin.layouts.master')
@section('manage-course', 'menu-open')
@section('course', 'active')

@section('main-content')

    <style>
        .append-row {
            display: flex;
            align-items: center;
        }
        .append-row-edit {
            display: flex;
            align-items: center;
        }

        input.form-control.custom_form_control {
            width: 100%;
        }

        .append-row .form-group {
            width: 93%;
            margin-bottom: 0;
        }

        .append-row span {
            width: 45px;
            display: flex;
            height: 48px;
            margin-top: 34px;
            align-items: center;
            justify-content: center;
            margin-left: 10px;
        }
        .append-row-edit .form-group {
            width: 93%;
            margin-bottom: 0;
        }

        .append-row-edit span {
            width: 45px;
            display: flex;
            height: 48px;
            margin-top: 34px;
            align-items: center;
            justify-content: center;
            margin-left: 10px;
        }
    </style>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Course Subject</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Course Subject</li>
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
                                <h3 class="card-title">All Course Subject</h3>
                                <a href="{{ route('admin.board.create') }}" class="btn btn_new_info float-right"
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
                                            <th>Course Name</th>
                                            <th>Subject Title</th>
                                            <th class="text-center">Created Date</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($course_subject->isNotEmpty())
                                            @foreach ($course_subject as $key => $item)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $item->course->name ?? '' }}</td>
                                                    <td>{{ $item->title ?? '' }}</td>
                                                    <td>{{ date('d M Y', strtotime($item->created_at)) }}</td>
                                                    <td class="text-center">
                                                        <span class="action-btn">
                                                            <a
                                                                class=" btn-edit " data-toggle="modal"
                                                                data-target="#editModal{{ $item->id }}">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            <a href="{{ route('admin.course.subject.delete', $item->id) }}"
                                                                class=" btn-delete deleteButton" >
                                                                <i class="fa fa-trash"></i>
                                                            </a>
                                                        </span>
                                                    </td>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="editModal{{ $item->id }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Edit
                                                                        Board</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form
                                                                        action="{{ route('admin.course.subject.update',$item->id) }}"
                                                                        method="post" enctype="multipart/form-data">
                                                                        @csrf
                                                                        <div class="p-3">
                                                                            <div class="row">
                                                                                <div class="col-12">
                                                                                    <div class="form-group">
                                                                                        <label for="">Course<small class="text-danger">*</small></label>
                                                                                        <select name="course_id" class="form-control custom_form_control" id=""
                                                                                            required>
                                                                                            <option value="">Select Course</option>
                                                                                            @foreach ($courses as $course)
                                                                                                <option value="{{ $course->id }}" @if($course->id ==$item->course_id) selected @endif>{{ $course->name }}</option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                        <span class="text-danger">
                                                                                            @error('title')
                                                                                                {{ $message }}
                                                                                            @enderror
                                                                                        </span>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-12">
                                                                                    <div class="form-group">
                                                                                        <label for="">Subject Title<small class="text-danger">*</small></label>
                                                                                        <input type="text" name="title" value="{{ $item->title }}"
                                                                                            class="form-control custom_form_control" id="" required>
                                                                                        <span class="text-danger">
                                                                                            @error('title')
                                                                                                {{ $message }}
                                                                                            @enderror
                                                                                        </span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            @foreach (json_decode($item->item) ?? [] as $key => $value)
                                                                            <div class="append-row-edit">
                                                                                <div class="form-group">
                                                                                    <label for="">Subject Option<small class="text-danger">*</small></label>
                                                                                    <input type="text" name="item[]" value="{{ $value}}"
                                                                                        class="form-control custom_form_control" id="" required>
                                                                                </div>
                                                                                @if ($key == 0)
                                                                                    <span class=" btn btn-info btn-xs" onclick="Editplus(this)"><i class="fas fa-plus"></i></span>
                                                                                @else
                                                                                <span class=" btn btn-danger btn-xs" onclick="removeEditElement(this)"><i class="fas fa-trash"></i></span>
                                                                                @endif
                                                                            </div>
                                                                            @endforeach
                                                                        </div>
                                                                        <div class="modal-footer justify-content-center">
                                                                            <button type="submit" class="btn btn-success">Update</button>
                                                                        </div>
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
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Subject</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.course.sub.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="p-3">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="">Course<small class="text-danger">*</small></label>
                                        <select name="course_id" class="form-control custom_form_control" id=""
                                            required>
                                            <option value="">Select Course</option>
                                            @foreach ($courses as $course)
                                                <option value="{{ $course->id }}">{{ $course->name }}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">
                                            @error('title')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="">Subject Title<small class="text-danger">*</small></label>
                                        <input type="text" name="title" value="{{ old('title') }}"
                                            class="form-control custom_form_control" id="" required>
                                        <span class="text-danger">
                                            @error('title')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="append-row">
                                <div class="form-group">
                                    <label for="">Subject Option<small class="text-danger">*</small></label>
                                    <input type="text" name="item[]" value="{{ old('item[]') }}"
                                        class="form-control custom_form_control" id="" required>
                                </div>
                                <span class="add-row btn btn-info btn-xs" onclick="plus()"><i
                                        class="fas fa-plus"></i></span>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-center">
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        function plus() {
            $(".append-row:last").after(`
                <div class="append-row">
                    <div class="form-group">
                        <label for="">Subject Option<small class="text-danger">*</small></label>
                        <input type="text" name="item[]" value="{{ old('item[]') }}"
                            class="form-control custom_form_control" id="" required>

                    </div>
                    <span class="add-row btn btn-danger btn-xs" onclick="removeElement(this)"><i class="fas fa-trash"></i></span>
                </div>

            `);
        }
        function removeElement(button) {
            $(button).closest('.append-row').remove();
        }
    </script>
    <script>
       function Editplus(button) {
    console.log('hi liza');
    var modal = $(button).closest('.modal');
    modal.find(".append-row-edit:last").after(`
        <div class="append-row-edit">
            <div class="form-group">
                <label for="">Subject Option<small class="text-danger">*</small></label>
                <input type="text" name="item[]" class="form-control custom_form_control" required>
            </div>
            <span class="add-row btn btn-danger btn-xs" onclick="removeEditElement(this)"><i class="fas fa-trash"></i></span>
        </div>
    `);
}

        function removeEditElement(button) {
            $(button).closest('.append-row-edit').remove();
        }
    </script>
@endpush