<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\Branch;
use App\Models\Course;
use App\Models\Student;
use App\Models\Register;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{

    public function index(Request $request)
    {
        $registersQuery = Register::query();

        $registersQuery->where('branch_id', Auth::user()->branch_id);
        if (!empty($request['searchData'])) {
            $searchTerms = $request['searchData'];
            $registersQuery->where(function ($q) use ($searchTerms) {
                $q->where('register_number', 'LIKE', "%{$searchTerms}%");
            })->orWhereHas('student', function ($query) use ($searchTerms) {
                $query->where('name_en', 'LIKE', "%{$searchTerms}%");
            });
        }

        $perPage = isset($request['perPage']) ? intval($request['perPage']) : 100;
        $currentPage = max(1, $request->input('page', 1));
        $startIndex = ($currentPage - 1) * $perPage;
        $registers =  $registersQuery->latest()->paginate($perPage);


        if ($request->ajax()) {
            return view('admin.register.student', compact('registers', 'startIndex'))->render();
        } else {
            return view('admin.register.index', compact('registers', 'startIndex'));
        }
    }


    public function create()
    {
        // $registered_std=Register::pluck('student_id');
        $branch_id = Auth::guard('admin')->user()->branch_id;
        $data['students'] = Student::where('created_by', $branch_id)->where('student_registration_no', '==', 0)->where('due',0)->orderBy('id', 'desc')->get();
        return view('admin.register.create', $data);
    }

    public function store(Request $request)
    {
        $ids = $request->ids;
        $students = Student::whereIn('id', $ids)->get();
        $exam_date = $request->exam_date;
        $total_std = $students->count();
        //dd($total_std);
        $branch_id = Auth::guard('admin')->user()->branch_id;
        if ($branch_id != 1) {
            $branch = Branch::find($branch_id);
            $admin=Branch::where('id',1)->first();
            foreach ($students as $student) {
                $lastReg = Register::orderBy('id','desc')->first();
                $lastRegNumber = $lastReg ? $lastReg->register_number : '24000000';
                $nextRegNumber = intval($lastRegNumber) + 1;
                $register_no = str_pad($nextRegNumber, 8, '0', STR_PAD_LEFT);
                $course = Course::find($student->course_id);
                if ($course->admin_fee > $branch->registration_balance) {
                    return response()->json(['error' => 'Insufficient Balance']);
                }else{
                    $register = new Register;
                    $register->student_id = $student->id;
                    $register->register_number = $register_no;
                    $register->register_amount = $course->admin_fee;
                    $register->branch_id = Auth::user()->branch_id;
                     $register->exam_date = $exam_date;
                    $register->save();
                    $student->student_registration_no = $register->register_number;
                    $student->save();
                    $branch->registration_balance -= $course->admin_fee;
                    $branch->save();
                    $admin->registration_balance += $course->admin_fee;
                    $admin->save();
                }
            }
            return response()->json([
                'success' => 'Student Registration Complete',
            ]);
        } else {
            foreach ($students as $student) {
                $lastReg = Register::orderBy('id','desc')->first();
                $lastRegNumber = $lastReg ? $lastReg->register_number : '24000000';
                $nextRegNumber = intval($lastRegNumber) + 1;
                $register_no = str_pad($nextRegNumber, 8, '0', STR_PAD_LEFT);
                $register = new Register;
                $register->student_id = $student->id;
                $register->register_number = $register_no;
                 $register->exam_date = $exam_date;
                $register->register_amount = 0.00;
                $register->branch_id = Auth::user()->branch_id;
                $register->save();
                $student->student_registration_no = $register->register_number;
                $student->save();
            }
            return response()->json([
                'success' => 'Student Registration Complete',
            ]);
        }
        //$register_data = Register::orderBy('id', 'desc')->first();
        return response()->json([
            'error' => 'Something Went Wrong',
        ]);
    }

     public function update_date(Request $request){
        $exam_date = $request->exam_date;
        $ids = explode(',', $request->ids);
        Register::whereIn('id', $ids)->update(['exam_date' => $exam_date]);
        return redirect()->back()->with('success', 'Exam Date Changed');
    }

      public function admitcard($id)
    {
        $register = Register::where('id', $id)->first();
       // return view('admin.register.admitcard', compact('register'));
        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $options->set('chroot', realpath(''));
        $dompdf = new Dompdf($options);
        $html = view('admin.register.admitcard', compact('register'))->render();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        return $dompdf->stream('admitcard.pdf');
    }
}
