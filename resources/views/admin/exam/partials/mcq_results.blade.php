@if($results1->count() > 0)
    <table class="table table-bordered">
        <tr>
            <th>Student Name</th>
            <th>Exam Name</th>
            <th>Course Name</th>
            <th>Date</th>
            <th>Correct Answers</th>
            <th>Total Questions</th>
            <th>Total Marks</th>
            <th>Obtained Marks</th>
        </tr>
        @foreach($results1 as $result)
            <tr>
                <td>{{ $result->student_name }}</td>
                <td>{{ $result->exam_name }}</td>
                <td>{{ $result->course_name }}</td>
                <td>{{ \Illuminate\Support\Carbon::parse($result->created_at)->format('d-m-Y') }}</td>
                <td>{{ $result->correct_answers }}</td>
                <td>{{ $result->total_questions }}</td>
                <td>{{ number_format($result->total_mark, 2) }}</td>
                <td>{{ number_format($result->obtained_marks, 2) }}</td>
            </tr>
        @endforeach
    </table>
    <div class="pagination-links">
        {!! $results1->links() !!}
    </div>
@else
    <p>No MCQ results found.</p>
@endif

