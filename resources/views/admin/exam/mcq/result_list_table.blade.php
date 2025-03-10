<table class="table table-bordered">
    <thead>
    <tr>
        <th>Student Name</th>
        <th>Exam Name</th>
        <th>Course Name</th>
        <th>Date</th>
        <th>Correct Answers</th>
        <th>Total Questions</th>
        <th>Total Marks</th>
        <th>Obtained Marks</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($results as $result)
        <tr>
            <td>{{ $result->student_name }}({{ $result->student_roll }})</td>
            <td>{{ $result->exam_name }}</td>
            <td>{{ $result->course_name }}</td>
            <td>{{ \Illuminate\Support\Carbon::parse($result->created_at)->format('d-m-Y') }}</td>
            <td>{{ $result->correct_answers }}</td>
            <td>{{ $result->total_questions }}</td>
            <td>{{ number_format($result->total_mark, 2) }}</td>
            <td>{{ number_format($result->obtained_marks, 2) }}</td>
            <td>
                <a href="{{ route('admin.mcq.result.details', [Crypt::encryptString($result->mcq_exam_id), $result->student_id]) }}" class="btn btn-info btn-sm">View Details</a>

                <a href="{{ route('admin.mcq.result.delete', ['examId' => $result->mcq_exam_id, 'studentId' => $result->student_id]) }}"
                   class="btn btn-danger btn-sm deleteButton">
                    Delete
                </a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<div class="pagination">
    {{ $results->links() }}
</div>

