<table id="" class="table table-bordered">
    <thead>
        <tr>
            <th>Sl</th>
            <th>Image</th>
            <th>Name</th>
            <th>Information</th>
            <th>Course</th>
            <th>Admission Date</th>
            <!--<th>Fees</th>-->
            <th>Due</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @if ($students->isNotEmpty())
            @foreach ($students as $key => $item)
                <tr>
                    <td>{{$startIndex + $key + 1 }}</td>
                    <td>
                        @if ($item->image)
                            <img src="{{ asset($item->image) }}" class="custom-img-style" alt="No Image">
                        @else
                            <img src="{{ asset('backend/images/no-image.png') }}" class="custom-img-style" alt="No Image">
                        @endif
                    </td>
                    <td>
                        <b>{{ $item->name_en ?? '' }}</b><br>
                        Roll : {{ $item->student_roll ?? '' }}<br>
                        Reg : {{ $item->student_registration_no ?? '' }} <br>
                        Phone : {{ $item->phone ?? '' }}
                    </td>
                    <td>
                      F-name : {{ $item->fathers_name ?? '' }} <br>
                       M-name :  {{ $item->mothers_name ?? '' }} <br>
                      Gurdian-phone : {{ $item->gurdian_phone ?? '' }} <br>
                         {{ $item->present_address ?? '' }}

                    </td>
                    <td>{{ $item->course->name ?? '' }} <br>
                    <span style="font-weight:500">Batch</span> : {{ $item->batch->name ?? '' }}
                    </td>
                    <td>{{ date('d M Y', strtotime($item->admission_date)) }}</td>
                    <!--<td>{{ $item->payable_amount }}</td>-->
                    <td class="text-center">
                       {{$item->due}}
                    </td>
                    <td class="text-center">
                        <span class="action-btn">
                            <a href="{{ route('admin.student.edit', $item->id) }}" class=" btn-edit "
                                title="{{ __('edit') }}">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="{{ route('admin.student.show', $item->id) }}" class=" btn-view"
                                title="{{ __('view') }}">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.admissionPayment.find', $item->id) }}" class=" btn-green"
                                title="{{ __('payment') }}">
                                <i class="fa-solid fa-money-bill"></i>
                            </a>
                            <a href="{{ route('admin.student.delete', $item->id) }}" class=" btn-delete deleteButton"
                                title="{{ __('delete') }}">
                                <i class="fa fa-trash"></i>
                            </a>
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
