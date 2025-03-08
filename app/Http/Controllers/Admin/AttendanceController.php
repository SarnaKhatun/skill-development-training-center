<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Batch;
use App\Models\Student;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $branch_id=Auth::guard('admin')->user()->branch_id;
        $batches = Batch::where('branch_id',$branch_id)->Orderby('id','desc')->get();
        return view('admin.attendance.index', compact('batches'));
    }



    public function getBatchStudents(Request $request)
    {
        $batchId = $request->batch_id;

        if (!$batchId) {
            return response()->json(['error' => 'Batch ID not provided']);
        }

        $students = Student::where('batch_id', $batchId)->get();
        if ($students->isEmpty()) {
            return response()->json(['students' => [], 'dates' => [], 'attendance' => []]);
        }

        $today = today();
        $dates = [];


        for ($i = 1; $i <= $today->daysInMonth; ++$i) {
            $dates[] = Carbon::createFromDate($today->year, $today->month, $i)->toDateString();
        }

        $attendanceRecords = Attendance::whereIn('student_id', $students->pluck('id'))
            ->whereIn('attendance_date', $dates)
            ->get();

        $attendance = [];

        foreach ($attendanceRecords as $record) {

            $attendanceDate = Carbon::parse($record->attendance_date)->toDateString();
            $attendanceKey = "{$record->student_id}_{$attendanceDate}";


            $statuses = array_filter(explode(',', $record->status), fn($status) => !empty($status));


            $attendance[$attendanceKey] = array_values($statuses);
        }

        return response()->json([
            'students' => $students,
            'dates' => $dates,
            'attendance' => $attendance
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $branch_id=Auth::guard('admin')->user()->branch_id;
        $batches = Batch::where('branch_id',$branch_id)->where('status',1)->Orderby('id','desc')->get();
        $today = Carbon::now();

        return view('admin.attendance.create', compact('batches', 'today'));
    }

    /**
     * Store a newly created resource in storage.
     */


    public function store(Request $request)
    {
        if (!$request->has('attendances')) {
            return redirect()->back()->with('error', 'No attendance data submitted.');
        }

        $attendances = $request->attendances;

        foreach ($attendances as $studentId => $dates) {
            if (!is_array($dates)) continue;

            foreach ($dates as $date => $statuses) {
                if (!is_array($statuses)) {
                    $statuses = [$statuses];
                }


                \Log::info("Storing Attendance:", [
                    'student_id' => $studentId,
                    'date' => $date,
                    'status' => implode(',', $statuses)
                ]);

                Attendance::updateOrCreate(
                    ['student_id' => $studentId, 'attendance_date' => $date],
                    ['status' => implode(',', $statuses)]
                );
            }
        }

        return redirect()->route('admin.attendances.index')->with('success', 'Attendance recorded successfully.');
    }




    public function getBatchAttendance(Request $request)
    {
        $request->validate([
            'batch_id' => 'required|exists:batches,id',
            'month' => 'required|date_format:Y-m',
        ]);

        $batchId = $request->batch_id;
        $month = $request->month;


        $startOfMonth = Carbon::parse($month)->startOfMonth();
        $endOfMonth = Carbon::parse($month)->endOfMonth();


        $students = Student::where('batch_id', $batchId)
            ->with(['attendances' => function ($query) use ($startOfMonth, $endOfMonth) {
                $query->whereBetween('attendance_date', [$startOfMonth, $endOfMonth]);
            }])
            ->get();

        $formattedAttendance = [];
        foreach ($students as $student) {
            foreach ($student->attendances as $record) {

                if (is_array($record->status)) {
                    $statusArray = array_filter($record->status, fn($value) => !is_null($value) && $value !== '');
                } else {
                    $statusArray = array_filter(explode(',', trim((string) $record->status)), fn($value) => !is_null($value) && $value !== '');
                }


                $status = !empty($statusArray) ? implode(', ', array_map('ucfirst', $statusArray)) : '-';


                $formattedAttendance[$student->id][] = [
                    'date' => $record->attendance_date->toDateString(),
                    'status' => $status,
                ];
            }
        }


        $dates = collect(CarbonPeriod::create($startOfMonth, $endOfMonth))
            ->map(fn($date) => $date->toDateString())
            ->toArray();

        return response()->json([
            'students' => $students,
            'attendanceData' => $formattedAttendance,
            'dates' => $dates,
        ]);
    }




    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
