@foreach ($students as $key => $item)
<tr id="order_ids{{ $item->id }}">
    <td><input type="checkbox" class="check_ids" name="ids"
            value="{{ $item->id }}"></td>
    <td>
        {{ $item->name_en ?? '' }} <br>
        roll: {{ $item->student_roll ?? '' }} <br>
        reg : {{ $item->student_registration_no ?? '' }}
    </td>
    <td>{{ $item->course->name ?? '' }}
    <td>{{ $item->session->name ?? '' }}
    </td>
    <td class="text-center">
        @if ($item->image)
            <img src="{{ asset($item->image) }}" class="custom-img-style"
                alt="No Image">
        @else
            <img src="{{ asset('backend/images/no-image.png') }}"
                class="custom-img-style" alt="No Image">
        @endif
    </td>
</tr>
@endforeach
