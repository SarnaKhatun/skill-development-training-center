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
                        <h1>Upazilla</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Upazilla</li>
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
                                <h3 class="card-title">All Upazilla</h3>
                                <a href="{{ route('admin.upazilla.create') }}" class="btn btn_new_info float-right"
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
                                            <th>Division</th>
                                            <th>District</th>
                                            <th>Status</th>
                                            <th class="text-center">Date</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($upazillas->isNotEmpty())
                                            @foreach ($upazillas as $key => $item)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $item->name ?? '' }}</td>
                                                    {{-- <td>{{ $item->priority ?? '' }}</td> --}}
                                                    <td>{{ $item->division->name ?? '' }}</td>
                                                    <td>{{ $item->district->name ?? '' }}</td>
                                                    <td>
                                                        @if ($item->status == 1)
                                                            <a href="{{ route('admin.upazilla.statusChange', $item->id) }}"><span
                                                                    class="badge bg-primary">Active</span></a>
                                                        @else
                                                            <a href="{{ route('admin.upazilla.statusChange', $item->id) }}"><span
                                                                    class="badge bg-danger">Inactive</span></a>
                                                        @endif
                                                    </td>
                                                    <td>{{ date('d M Y', strtotime($item->created_at)) }}</td>
                                                    <td class="text-center">
                                                        <span class="action-btn">
                                                            <a href="{{ route('admin.upazilla.edit', $item->id) }}"
                                                                class=" btn-edit " data-toggle="modal"
                                                                data-target="#exampleModal{{ $item->id }}">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                        </span>
                                                    </td>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModal{{ $item->id }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">upazilla
                                                                        Edit</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form
                                                                        action="{{ route('admin.upazilla.update', $item->id) }}"
                                                                        method="post" enctype="multipart/form-data">
                                                                        @csrf
                                                                        <div class="row">
                                                                            <div class="col-6">
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
                                                                                <div class="form-group">
                                                                                    <label for="email">Division<small
                                                                                            class="text-danger">*</small></label>
                                                                                    <select name="division_id" required
                                                                                        class="form-control custom_form_control">
                                                                                        <option>Select Division</option>
                                                                                        @foreach (get_divisions() as $division)
                                                                                            <option
                                                                                                value="{{ $division->id }}"
                                                                                                @if ($division->id == $item->division_id) selected @endif>
                                                                                                {{ $division->name }}
                                                                                            </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    <span class="text-danger">
                                                                                        @error('division_id')
                                                                                            {{ $message }}
                                                                                        @enderror
                                                                                    </span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <div class="form-group">
                                                                                    <label for="email">District<small
                                                                                            class="text-danger">*</small></label>
                                                                                    <select name="district_id" required
                                                                                        class="form-control custom_form_control">
                                                                                        <option>Select District</option>
                                                                                        @foreach (get_district_by_division_id($item->division_id) as $district)
                                                                                            <option
                                                                                                value="{{ $district->id }}"
                                                                                                @if ($district->id == $item->district_id) selected @endif>
                                                                                                {{ $district->name }}
                                                                                            </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    <span class="text-danger">
                                                                                        @error('district_id')
                                                                                            {{ $message }}
                                                                                        @enderror
                                                                                    </span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-6"></div>
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
                    <h5 class="modal-title" id="exampleModalLabel">Add upazilla</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.upazilla.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-6">
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
                                <div class="form-group">
                                    <label for="email">Division<small class="text-danger">*</small></label>
                                    <select name="division_id" required class="form-control custom_form_control">
                                        <option>Select Division</option>
                                        @foreach (get_divisions() as $division)
                                            <option value="{{ $division->id }}">{{ $division->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">
                                        @error('division_id')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="email">District<small class="text-danger">*</small></label>
                                    <select name="district_id" required class="form-control custom_form_control">
                                        <option>Select District</option>
                                    </select>
                                    <span class="text-danger">
                                        @error('district_id')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-6">
                            </div>
                            <div class="col-6">
                                <div class="card-body">
                                    <input type="checkbox"
                                        class="form-check-input me-2 cursor"
                                        name="status" id="status"
                                        value="1">
                                    <label class="form-check-label cursor"
                                        for="status">Status</label>
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
    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="division_id"]').on('change', function() {
                var division_id = $(this).val();
                if (division_id) {
                    $.ajax({
                        url: "{{ url('admin/get-district/ajax') }}/" + division_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            console.log(data)
                            $('select[name="district_id"]').html(
                                '<option value="" >Select District</option>'
                            );
                            $.each(data, function(key, value) {
                                console.log(value)
                                $('select[name="district_id"]').append(
                                    '<option value="' + value.id + '">' +
                                    capitalizeFirstLetter(value.name) +
                                    '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });

            function capitalizeFirstLetter(string) {
                return string.charAt(0).toUpperCase() + string.slice(1);
            }
        });
    </script>
@endpush