<table class="table table-bordered">
    <thead>
        <tr>
            <th><input type="checkbox" id="select_all_ids"></th>
            <th>Sl</th>
            <th>Name</th>
            <th>Roll</th>
            <th>Reg No</th>
            <th>Registration Date</th>
            <th>Image</th>
            <th class="text-center">Profile</th>
        </tr>
    </thead>
    <tbody>
        @if ($registers->isNotEmpty())
            @foreach ($registers as $key => $item)
                <tr id="order_ids{{ $item->id }}">
                    <td><input type="checkbox" class="check_ids" name="ids" value="{{ $item->id }}"></td>
                    <td>{{$startIndex + $key + 1 }}</td>
                    <td>
                        <b>{{ $item->student->name_en ?? '' }}</b>
                    </td>
                    <td>{{ $item->student->student_roll ?? '' }}</td>
                    <td>{{ $item->student->student_registration_no ?? '' }}</td>
                    <td>{{ date('d M Y', strtotime($item->created_at)) }}</td>
                    <td>
                        @if ($item->student && $item->student->image)
                            <img src="{{ asset($item->student->image) }}" class="custom-img-style" alt="No Image">
                        @else
                            <img src="{{ asset('backend/images/no-image.png') }}" class="custom-img-style"
                                alt="No Image">
                        @endif
                    </td>
                    <td class="text-center">
                        <span class="action-btn">
                            <a href="{{ route('admin.student.show', $item->student_id) }}" class=" btn-view">
                                <i class="fa fa-user"></i>
                            </a>
                            <a href="{{ route('admin.register.admitcard', $item->id) }}" class=" btn-delete">
                                <i class="fa fa-address-card-o"></i>
                            </a>
                        </span>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
<div class="pagination">
    {{ $registers->links() }}
</div>
