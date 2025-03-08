<table  class="table table-bordered">
    <thead>
        <tr>
            <th>Sl</th>
            <th class="text-center">Image</th>
            <th>Name,Parents</th>
            <th>Course</th>
            <th>Contact</th>
            <th>Result</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @if ($students->isNotEmpty())
            @foreach ($students as $key => $item)
                <tr>
                    <td>{{$startIndex + $key + 1 }}</td>
                    <td class="text-center">
                        @if ($item->image)
                            <img src="{{ asset($item->image) }}" class="custom-img-style" alt="No Image">
                        @else
                            <img src="{{ asset('backend/images/no-image.png') }}" class="custom-img-style" alt="No Image">
                        @endif
                    </td>
                    <td>
                        <b>{{ $item->name_en ?? '' }}</b><br>
                        Father:{{ $item->fathers_name ?? '' }}<br>
                        Mother:{{ $item->mothers_name ?? '' }}
                    </td>
                    <td><b>{{ $item->course->name ?? '' }}</b><br>
                        Session:{{ $item->session->name ?? '' }} <br>
                        Admission:{{ $item->admission_date ?? '' }} <br>
                        Result Published:{{ $item->result->date ?? '' }}
                    </td>
                    <td> {{ $item->phone }}</td>
                    <td> {{ $item->result->cgpa ?? 0 }}</td>
                    <td>
                        <span class="action-btn">
                            <a href="{{ route('admin.result.resultshow', $item->id) }}" class=" btn-view">
                                <i class="fa fa-sticky-note" aria-hidden="true"></i>
                            </a>

                            <a class=" btn-edit" data-toggle="modal" data-target="#exampleModal{{ $item->id }}">
                                <i class="fa fa-edit"></i>
                            </a>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">
                                                Student Result</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('admin.result.update', $item->result->id) }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-12 pb-4 mx-auto text-center">
                                                        <b>Name: {{ $item->name_en }} , Roll: {{ $item->student_roll }}</b>
                                                    </div>
                                                    <div class="col-12">
                                                        <input type="hidden" name="student_id" value="{{ $item->id }}">
                                                        <div class="form-group">
                                                            <label for="">Result Publish Date<small class="text-danger">*</small></label>
                                                            <input type="date" name="result_date"
                                                                   value="{{ $item->result->date }}"
                                                                   class="form-control custom_form_control" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="">Result (CGPA)</label>
                                                            <select name="cgpa" required class="form-control custom_form_control">
                                                                <option>Select CGPA</option>
                                                                <option value="A+" {{ $item->result->cgpa == 'A+' ? 'selected' : '' }}>A+</option>
                                                                <option value="A" {{ $item->result->cgpa == 'A' ? 'selected' : '' }}>A</option>
                                                                <option value="B" {{ $item->result->cgpa == 'B' ? 'selected' : '' }}>B</option>
                                                                <option value="C" {{ $item->result->cgpa == 'C' ? 'selected' : '' }}>C</option>
                                                                <option value="D" {{ $item->result->cgpa == 'D' ? 'selected' : '' }}>D</option>
                                                                <option value="E" {{ $item->result->cgpa == 'E' ? 'selected' : '' }}>E</option>
                                                                <option value="F" {{ $item->result->cgpa == 'F' ? 'selected' : '' }}>F</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mx-auto text-center">
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </span>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
<div class="pagination">
    {{ $students->links() }}
</div>
