@extends('frontend.layouts.index')
@section('frontend')
    {{--  student info start  --}}
    <section>
        <div class="container my-8">
            <table class="border w-full md:w-3/4 lg:w-1/2 mx-auto">

                <tr>
                    <th colspan="2" class="text-center text-4xl text-teal-500 pt-2">Certificate Verification.</th>
                </tr>
                <tr class="border-b-2">
                    <td colspan="2" class="p-4 "><img src="{{ asset($student->image) }}" class="m-auto rounded-full" alt="" style="width: 150px; height: 150px;">
                    </td>
                </tr>
                <tr class="border-b-2">
                    <td class="w-1/4 border-r-2 p-2 text-start font-medium">Roll Number</td>
                    <td class="w-3/4 p-2">{{ $student->student_roll }}</td>
                </tr>
                <tr class="border-b-2">
                    <td class="w-1/4 border-r-2 p-2 text-start font-medium">Registration Number</td>
                    <td class="w-3/4 p-2">{{ $student->student_registration_no }}</td>
                </tr>
                <tr class="border-b-2">
                    <td class="w-1/4 border-r-2 p-2 text-start font-medium">Student Name</td>
                    <td class="w-3/4 p-2">{{ $student->name_en }}</td>
                </tr>
                <tr class="border-b-2">
                    <td class="w-1/4 border-r-2 p-2 text-start font-medium">Father's Name</td>
                    <td class="w-3/4 p-2">{{ $student->fathers_name }}</td>
                </tr>
                <tr class="border-b-2">
                    <td class="w-1/4 border-r-2 p-2 text-start font-medium">Mother's Name</td>
                    <td class="w-3/4 p-2">{{ $student->mothers_name }}</td>
                </tr>
                <tr class="border-b-2">
                    <td class="w-1/4 border-r-2 p-2 text-start font-medium">Course</td>
                    <td class="w-3/4 p-2">{{ $student->course->name }}</td>
                </tr>
                <tr class="border-b-2">
                    <td class="w-1/4 border-r-2 p-2 text-start font-medium">Session</td>
                    <td class="w-3/4 p-2">{{ \Carbon\Carbon::parse($student->session_start)->format('F y') }} to {{ \Carbon\Carbon::parse($student->session_end)->format(' F y') }}</td>
                </tr>
                <tr class="border-b-2">
                    <td class="w-1/4 border-r-2 p-2 text-start font-medium">Result</td>
                    <td class="w-3/4 p-2">{{ $student->result->cgpa }}</td>
                </tr>
                <tr>
                    <th colspan="2" class="text-center text-2xl p-4 text-teal-500">SYDT CENTER</th>
                </tr>
            </table>
        </div>
    </section>
    {{--  student info end  --}}
@endsection
