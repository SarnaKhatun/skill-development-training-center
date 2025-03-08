@if($results2->count() > 0)
    <table class="table table-bordered">
        <tr>
            <th>Student Name</th>
            <th>Exam Name</th>
            <th>Course Name</th>
            <th>Date</th>
            <th>Total Marks</th>
            <th>Obtained Marks</th>
        </tr>
        @foreach($results2 as $result)
            <tr>
                <td>{{ $result->student_name }} ({{ $result->student_roll }})</td>
                <td>{{ $result->exam_name }}</td>
                <td>{{ $result->course_name }}</td>
                <td>{{ \Illuminate\Support\Carbon::parse($result->created_at)->format('d-m-Y') }}</td>
                <td>{{ $result->total_mark }}</td>
                <td>{{ number_format($result->obtained_marks, 2) }}</td>
            </tr>
        @endforeach
    </table>
    <div class="pagination-links">
        {!! $results2->links() !!}
    </div>
@else
    <p>No Written results found.</p>
@endif
