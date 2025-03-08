<?php

namespace App\Http\Controllers\Admin;


use Exception;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\Batch;
use App\Models\Board;
use App\Models\Branch;
use App\Models\Course;
use App\Models\Result;
use App\Models\Session;
use App\Models\Student;
use App\Models\Examination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StudentRequest;
use App\Repositories\Interface\StudentInterface;

class StudentController extends Controller
{
    protected $student;
    public function __construct(StudentInterface $student)
    {
        $this->student = $student;
    }


    public function index(Request $request)
    {
        $branch_id=Auth::guard('admin')->user()->branch_id;
        if(Auth::guard('admin')->user()->role == '1'){
            $studentsQuery = Student::query();

            if (!empty($request['searchData'])) {
                $searchTerms = $request['searchData'];
                $studentsQuery->where(function ($q) use ($searchTerms) {
                    $q->where('name_en', 'LIKE', "%{$searchTerms}%")
                        ->orWhere('name_bn', 'LIKE', "%{$searchTerms}%")
                        ->orWhere('student_roll', 'LIKE', "%{$searchTerms}%")
                        ->orWhere('student_registration_no', 'LIKE', "%{$searchTerms}%")
                        ->orWhere('fathers_name', 'LIKE', "%{$searchTerms}%")
                        ->orWhere('phone', 'LIKE', "%{$searchTerms}%");
                })->orWhereHas('course', function ($query) use ($searchTerms) {
                    $query->where('name', 'LIKE', "%{$searchTerms}%");
                })->orWhereHas('batch', function ($query) use ($searchTerms) {
                    $query->where('name', 'LIKE', "%{$searchTerms}%");
                });
            }

            $perPage = isset($request['perPage']) ? intval($request['perPage']) : 100;
            $currentPage = max(1, $request->input('page', 1));
            $startIndex = ($currentPage - 1) * $perPage;
            $students =  $studentsQuery->latest()->paginate($perPage);


            if ($request->ajax()) {
                return view('admin.student.student', compact('students', 'startIndex'))->render();
            } else {
                return view('admin.student.index', compact('students', 'startIndex'));
            }
        }else{
            $studentsQuery = Student::query();

            $studentsQuery->where('created_by',$branch_id);

            if (!empty($request['searchData'])) {
                $searchTerms = $request['searchData'];
                $studentsQuery->where(function ($q) use ($searchTerms) {
                    $q->where('name_en', 'LIKE', "%{$searchTerms}%")
                        ->orWhere('name_bn', 'LIKE', "%{$searchTerms}%")
                        ->orWhere('student_roll', 'LIKE', "%{$searchTerms}%")
                        ->orWhere('student_registration_no', 'LIKE', "%{$searchTerms}%")
                        ->orWhere('fathers_name', 'LIKE', "%{$searchTerms}%")
                        ->orWhere('phone', 'LIKE', "%{$searchTerms}%");
                })->orWhereHas('course', function ($query) use ($searchTerms) {
                    $query->where('name', 'LIKE', "%{$searchTerms}%");
                })->orWhereHas('batch', function ($query) use ($searchTerms) {
                    $query->where('name', 'LIKE', "%{$searchTerms}%");
                });
            }

            $perPage = isset($request['perPage']) ? intval($request['perPage']) : 100;
            $currentPage = max(1, $request->input('page', 1));
            $startIndex = ($currentPage - 1) * $perPage;
            $students =  $studentsQuery->latest()->paginate($perPage);


            if ($request->ajax()) {
                return view('admin.student.student', compact('students', 'startIndex'))->render();
            } else {
                return view('admin.student.index', compact('students', 'startIndex'));
            }
        }
    }


    public function create()
    {
        $data['sessions'] = Session::where('status',1)->latest()->get();
        $data['boards'] = Board::latest()->get();
        $data['examinations'] = Examination::latest()->get();
        $data['courses'] = Course::where('status',1)->latest()->get();
        $branch_id=Auth::guard('admin')->user()->branch_id;
        $data['batches'] =Batch::where('branch_id',$branch_id)->where('status',1)->Orderby('id','desc')->get();
        return view('admin.student.create', $data);
    }
    public function store(StudentRequest $request)
    {
        $branch_id = Auth::guard('admin')->user()->branch_id;
        if ($branch_id != 1) {
            $branch = Branch::find($branch_id);
            if (100 > $branch->registration_balance) {
                return back()->with('error', 'Insufficient Balance');
            }
        }
        $students = Student::where('batch_id',$request->batch_id)->count();
        $batch = Batch::where('id',$request->batch_id)->first();
        if($batch->total_sit < $students){
            return back()->with('error', 'There Is No Sit In This Batch');
        }else{
            try {
                $this->student->store($request->all());
                return redirect()->route('admin.student.index')->with('success', 'Student Created Successfully');
          } catch (Exception $e) {
                return back()->with('error', 'Something went to Wrong');
            }
        }
    }
    public function edit($id)
    {
        $data = [];
        $data['student'] = $this->student->get($id);
        $data['sessions'] = Session::where('status',1)->latest()->get();
        $data['boards'] = Board::latest()->get();
        $data['examinations'] = Examination::latest()->get();
        $data['courses'] = Course::where('status',1)->latest()->get();
        $branch_id=Auth::guard('admin')->user()->branch_id;
        $data['batches'] =Batch::where('branch_id',$branch_id)->where('status',1)->Orderby('id','desc')->get();
        return view('admin.student.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name_en' => 'required|max:100',
            'name_bn' => 'required|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|dimensions:width=108,height=137',
            'document_image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'fathers_name' => 'required|max:100',
            'mothers_name' => 'required|max:100',
            'phone' => 'required|digits:11|unique:students,phone,' . $id,
            'email' => 'required|email',
            'gurdian_phone' => 'required|digits:11|unique:students,gurdian_phone,' . $id,
            'present_address' => 'required|max:100',
            'premanent_address' => 'required|max:100',
            'dob' => 'required',
            'blood_group' => 'required',
            'gender' => 'required',
            'religion' => 'required',
            'exam_id' => 'required',
            'board_id' => 'required',
            'roll' => 'required',
            'registration' => 'required',
            'exam_year' => 'required',
            'admission_date' => 'required',
            'session_id' => 'required',
            'session_year' => 'required',
            'session_start' => 'required',
            'session_end' => 'required',
            'course_id' => 'required',
            'batch_id' => 'required',
            'admission_fee' => 'required',
            'payable_amount' => 'required',
        ]);
         try{
        $this->student->update($request->all(), $id);
        return redirect()->route('admin.student.index')->with('success', 'Student  Update Successfully');
        }catch(Exception $e){
            return back()->with('error','Sorry Something Went to Wrong');
        }
    }

    public function show($id)
    {
        try {
            $data = [];
            $data['student'] = $this->student->get($id);
            return view('admin.student.show', $data);
        } catch (Exception $e) {
            return back()->with('error', 'Sorry Something went wrong');
        }
    }
    public function delete($id)
    {
        try {
            $this->student->delete($id);

            return redirect()->back()->with('success', 'Student Deleted Successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Sorry Something Went to Wrong');
        }
    }
    public function statusChange(Request $request)
    {
        try {
            $this->student->statusChange($request->all());
            return response()->json(['success' => true, 'message' => 'Status updated successfully']);
        } catch (Exception $e) {
            return response()->json(['error' => true, 'message' => 'Sorry Something went to wrong']);
        }
    }

    public function download_search()
    {
        if (Auth::guard('admin')->user()->role == '1') {
            $data['branches']=Branch::where('status',1)->latest()->get();
        }else{
            $branch_id=Auth::guard('admin')->user()->branch_id;
            $data['branches']=Branch::where('id',$branch_id)->latest()->get();
        }
        return view('admin.student.download_search',$data);
    }

    public function download(Request $request)
    {
        if($request->branch_id==0){
            $data['branch']=Branch::where('id',Auth::user()->branch_id)->first();
            $data['students'] =Student::where('session_year',$request->year)->orderby('id','asc')->get();
        }else{
            $data['branch']=Branch::where('id',$request->branch_id)->first();
            $data['students'] =Student::where('created_by',$request->branch_id)->where('session_year',$request->year)->orderby('id','asc')->get();
        }
         //return view('admin.student.download', $data);
         $options = new Options();
         $options->set('isRemoteEnabled', true);
         $options->set('chroot', realpath(''));
         $dompdf = new Dompdf($options);
         $html = view('admin.student.download',$data)->render();
         $dompdf->loadHtml($html);
         $dompdf->setPaper('A4', 'portrait');
         $dompdf->render();
        return $dompdf->stream('students.pdf');
    }
    public function duelist(Request $request)
    {
        $studentsQuery = Student::query();

        $studentsQuery->where('created_by', Auth::guard('admin')->user()->branch_id)->where('due','>',0);
        if (!empty($request['searchData'])) {
            $searchTerms = $request['searchData'];
            $studentsQuery->where(function ($q) use ($searchTerms) {
                $q->where('name_en', 'LIKE', "%{$searchTerms}%")
                    ->orWhere('name_bn', 'LIKE', "%{$searchTerms}%")
                    ->orWhere('student_roll', 'LIKE', "%{$searchTerms}%")
                    ->orWhere('student_registration_no', 'LIKE', "%{$searchTerms}%")
                    ->orWhere('fathers_name', 'LIKE', "%{$searchTerms}%")
                    ->orWhere('phone', 'LIKE', "%{$searchTerms}%");
            })->orWhereHas('course', function ($query) use ($searchTerms) {
                $query->where('name', 'LIKE', "%{$searchTerms}%");
            })->orWhereHas('batch', function ($query) use ($searchTerms) {
                $query->where('name', 'LIKE', "%{$searchTerms}%");
            });
        }

        $perPage = isset($request['perPage']) ? intval($request['perPage']) : 100;
        $currentPage = max(1, $request->input('page', 1));
        $startIndex = ($currentPage - 1) * $perPage;
        $students =  $studentsQuery->latest()->paginate($perPage);


        if ($request->ajax()) {
            return view('admin.student.duestudent', compact('students', 'startIndex'))->render();
        } else {
            return view('admin.student.duelist', compact('students', 'startIndex'));
        }
    }



    public function due_search()
    {

        $branch_id=Auth::guard('admin')->user()->branch_id;
        $data['batches']=Batch::where('branch_id',$branch_id)->where('status',1)->latest()->get();
        return view('admin.student.due_searchpage',$data);
    }
    public function due_pdf_download(Request $request)
    {
        //ini_set('max_execution_time',3600);

        $batch_id=$request->batch_id;
        $data['branch']=Branch::where('id',Auth::user()->branch_id)->latest()->first();
        if($batch_id== 0){
            $data['batch']='All Batch';
            $data['students']=Student::where('created_by',Auth::user()->branch_id)->where('due','>',0)->latest()->get();
        }else{
            $branch=Batch::where('id',$batch_id)->first();
            $data['batch']=$branch->name;
            $data['students']=Student::where('batch_id',$batch_id)->where('due','>',0)->latest()->get();
        }
        //return view('admin.student.due_download',$data);
        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $options->set('chroot', realpath(''));
        $dompdf = new Dompdf($options);
        $html = view('admin.student.due_download',$data)->render();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        return $dompdf->stream('dueStudents.pdf');
    }

    public function certified(Request $request){
       $id=$request->id;
       if($id){

        $result=Result::Where('id',$id)->first();
        //dd('yes',$result);
        $result->certified=1;
        $result->save();
        return response()->json(['success' => true, 'message' => 'Status updated successfully']);
       }else{
        return response()->json(['error' => true, 'message' => 'Sorry Something went to wrong']);
       }
    }

     public function job_info($id){
        try {
            $data = [];
            $data['student'] = $this->student->get($id);
            return view('admin.student.job_info',$data);
        } catch (Exception $e) {
            return back()->with('error', 'Sorry Something went wrong');
        }

    }
    public function job_update(Request $request ,$id){
        try {
            $student=Student::find($id);
            $student->company_name=$request->company_name;
            $student->job_title=$request->job_title;
            $student->job_status = $request->job_status ? 1 : 0;
            $student->save();
            return redirect()->back()->with('success', 'Job Information Update Successfully');
        } catch (Exception $e) {
            return back()->with('error', 'Sorry Something went wrong');
        }

    }

     public function change_password(Request $request){

        $std_id=$request->std_id;
        if($std_id){
          $student=Student::where('id',$std_id)->first();
          $student->password=Hash::make($request->password);
          $student->save();
          return redirect()->back()->with('success','Student Password Update Successfully');
        }
    }


    public function idCard($id)
    {
        $student = Student::where('id', $id)->first();
        // return view('admin.register.admitcard', compact('register'));
        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $options->set('chroot', realpath(''));
        $dompdf = new Dompdf($options);
        $html = view('admin.student.idcard', compact('student'))->render();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        return $dompdf->stream('id-card.pdf');
    }
}
