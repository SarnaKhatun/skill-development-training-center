<table id="" class="table table-bordered mt-2">
    <thead>
        <tr>
            <th><input type="checkbox" id="select_all_ids"></th>
            <th>Sl</th>
            <th class="text-center">Image</th>
            <th>Name</th>
            <th>Roll</th>
            <th>Registration</th>
            <th>Course</th>
            <th>Result</th>
        </tr>
    </thead>
    <tbody>
        @if ($students->isNotEmpty())
            @foreach ($students as $key => $item)
                <tr id="order_ids{{ $item->id }}">
                    <td><input type="checkbox" class="check_ids" name="ids"
                            value="{{ $item->id }}"></td>
                    <td>{{ $startIndex + $key + 1 }}</td>
                    <td class="text-center">
                        @if ($item->image)
                            <img src="{{ asset($item->image) }}"
                                class="custom-img-style" alt="No Image">
                        @else
                            <img src="{{ asset('backend/images/no-image.png') }}"
                                class="custom-img-style" alt="No Image">
                        @endif
                    </td>
                    <td>
                        {{ $item->name_en ?? '' }}
                    </td>
                    <td>
                        {{ $item->student_roll ?? '' }}
                    </td>
                    <td>
                        {{ $item->student_registration_no ?? '' }}
                    </td>
                    <td>{{ $item->course->name ?? '' }}
                    </td>
                    <td> {{ $item->result->cgpa }}</td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
<div class="pagination">
    {{ $students->links() }}
</div>
