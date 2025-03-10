<table id="" class="table table-bordered">
    <thead>
    <tr>
        <th>Sl</th>
        <th>Exam Name</th>
        <th>Batch Name</th>
        <th>Course Name</th>
        <th>Exam Title</th>
        <th>Date</th>
        @if(\Illuminate\Support\Facades\Auth::user()->role == 1)
            <th>Created By</th>
        @endif
        @if(\Illuminate\Support\Facades\Auth::user()->role == 1)
            <th>Status</th>
        @endif
        <th class="text-center">Action</th>
    </tr>
    </thead>
    <tbody>
    @if ($written_exams->isNotEmpty())
        @foreach($written_exams as $key => $exam)
            <tr>
                <td>{{$startIndex + $key + 1 }}</td>
                <td>{{ $exam->exam_name }}</td>
                @php
                    $batch = json_decode($exam->batch_id, true) ?? [];
                @endphp
                <td>
                    {{ implode(', ', array_map(function ($head) {
                        return \App\Models\Batch::find($head)?->name ?? '';
                    }, $batch)) }}
                </td>
                <td>{{ $exam->course->name }}</td>
                <td>{{ $exam->exam_title }}</td>


                <td>{{ \Illuminate\Support\Carbon::parse($exam->date)->format('d-m-Y') }}</td>

                @if(\Illuminate\Support\Facades\Auth::user()->role == 1)
                    <td>{{ $exam->added_by->name }}</td>
                @endif
                @if(\Illuminate\Support\Facades\Auth::user()->role == 1)
                    <td>
                     <span class="action-btn">
                         <a href="{{ route('admin.written-exams.changeStatus', $exam->id) }}"
                            class="btn btn-{{ $exam->status == 1 ? 'success' : 'danger' }}">
                             {{ $exam->status == 1 ? 'Active' : 'Inactive' }}
                         </a>
                     </span>
                    </td>
                @endif
                <td>

                    <span class="action-btn">
                        <a href="{{ route('admin.written-exams.show',$exam->id) }}"
                           class=" btn-view">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.written-exams.edit', $exam->id) }}"
                           class=" btn-edit ">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="{{ route('admin.written-exams.delete', $exam->id) }}"
                           class=" btn-delete deleteButton">
                            <i class="fa fa-trash"></i>
                        </a>
                        <a href="{{ route('admin.written-exams.given-marks', $exam->id) }}"
                           class=" btn-edit ">
                            <i class="fa fa-marker"></i>
                        </a>

                        <a href="{{ route('admin.written-exams.get-marks', $exam->id) }}"
                           class="btn btn-edit">
                            <i class="fa fa-square-poll-horizontal"></i>
                        </a>
                    </span>
                </td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>
<div class="pagination">
    {{ $written_exams->links() }}
</div>
