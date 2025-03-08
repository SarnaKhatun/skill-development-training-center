<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\Branch;
use App\Models\Result;
use App\Models\Setting;
use App\Models\Student;
use App\Traits\Uploadable;
use App\Models\Certificate;
use Illuminate\Http\Request;
use App\Models\CourseSubject;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CertificateController extends Controller
{
    use Uploadable;
     protected $students, $results;
    public function __construct()
    {
        $this->students = Student::query();
        $resultsdata = Result::query();
        $studentIds = $resultsdata->pluck('student_id')->unique()->toArray();
        $this->results =  $this->students->whereIn('id', $studentIds);
    }
    public function index(){
        if(Auth::user()->branch_id==1){
            $certificates=Certificate::orderBy('id','asc')->get();
        }else{
            $certificates=Certificate::where('branch_id',Auth::user()->branch_id)->orderBy('id','asc')->get();
        }

        return view('admin.certificate.index',compact('certificates'));
    }
    public function create(){
        if (Auth::guard('admin')->user()->branch_id == 1){
            abort('404');
        }
       return view('admin.certificate.create');
    }
    public function store(Request $request){
        $request->validate([
            'total_student' => 'required',
            'message' => 'required',
        ]);

        try{
            $certificate= new Certificate();
            $certificate->total_student=$request->total_student;
            $certificate->message=$request->message;
            $certificate->courier_address=$request->courier_address;
            $certificate->branch_id=Auth::user()->branch_id;
            $certificate->status=0;
            $certificate->save();
            return back()->with('success','Certificate Delivery Request Successfully Done');
        }catch(Exception $e){
            return back()->with('error','Sorry Something went wrong');
        }
    }
    public function status($id){
         $certificate=Certificate::find($id);
         $existingSetting = Setting::where('name', 'curier_amount')->first();
         $admin=Branch::where('id',1)->first();
         if($certificate){
            $branch=Branch::where('id',$certificate->branch_id)->first();
            if($existingSetting->value >$branch->registration_balance){
                return back()->with('error','Insufficient Balance');
            }
            $branch->registration_balance -=$existingSetting->value;
            $branch->save();
            $admin->registration_balance +=$existingSetting->value;
            $admin->save();
            $certificate->status=1;
            $certificate->save();
            return back()->with('success',' Delivery Successfully Approved');
         }else{
            return back()->with('error','Sorry Something went wrong');
         }
    }
    public function branch_search()
    {
        if (Auth::guard('admin')->user()->role == '1') {
            $data['branches']=Branch::orderBy('id','asc')->latest()->get();
            return view('admin.certificate.search',$data);
        }else{
            abort('404');
        }

    }

    public function branch_student(Request $request)
    {
        if (Auth::guard('admin')->user()->role != '1') {
            abort('404');
        }
        $resultQuery = $this->results;

        $id=$request->branch_id;

        //$resultQuery->where('created_by', Auth::user()->branch_id);
        if (!empty($request['searchData'])) {
            $searchTerms = $request['searchData'];
            $resultQuery->where(function ($q) use ($searchTerms) {
                $q->where('name_en', 'LIKE', "%{$searchTerms}%")
                    ->orWhere('name_bn', 'LIKE', "%{$searchTerms}%")
                    ->orWhere('student_roll', 'LIKE', "%{$searchTerms}%")
                    ->orWhere('student_registration_no', 'LIKE', "%{$searchTerms}%")
                    ->orWhere('phone', 'LIKE', "%{$searchTerms}%");
            })->orWhereHas('course', function ($query) use ($searchTerms) {
                $query->where('name', 'LIKE', "%{$searchTerms}%");
            });
        }

        $perPage = isset($request['perPage']) ? intval($request['perPage']) : 100;
        $currentPage = max(1, $request->input('page', 1));
        $startIndex = ($currentPage - 1) * $perPage;
        $branch_id = $id;
        $students =  $resultQuery->whereHas('result')->where('created_by', $id)->latest()->paginate($perPage);


        if ($request->ajax()) {
            return view('admin.certificate.studenttable', compact('students', 'startIndex', 'branch_id'))->render();
        } else {
            return view('admin.certificate.student', compact('students', 'startIndex', 'branch_id'));
        }
    }

     public function branch_student1(Request $request)
    {
        if (Auth::guard('admin')->user()->role != '1') {
            abort('404');
        }
        $id=$request->branch_id;
        $data['students'] = $this->results->where('created_by', $id)->orderBy('id', 'desc')->paginate(100);
        $data['branch_id']=$id;
        $data['startIndex'] = 0;
        return view('admin.certificate.student',$data);
    }

   /* public function download(Request $request){
        $ids = $request->ids;

        $data = Student::whereIn('id', $ids)->get();
        //dd( $data);
        //return view('admin.student.download', $data);
         $options = new Options();
         $options->set('isRemoteEnabled', true);
         $options->set('chroot', realpath(''));
         $dompdf = new Dompdf($options);
         $html = view('admin.student.download',$data)->render();
         $dompdf->loadHtml($html);
         $dompdf->setPaper([0, 0, 900, 725]);
         //$dompdf->setPaper('A4', 'portrait');
         $dompdf->render();
        return $dompdf->stream('students.pdf');
    }*/
    public function download(Request $request){
        $issue_date = $request->issue_date;
        $ids = explode(',', $request->ids);
       // $director_signature = Setting::where('name', 'director_signature')->first();
       // $chairman_signature = Setting::where('name', 'chairman_signature')->first();
        $students = $this->students->whereIn('id', $ids)->get();

        if ($students->isNotEmpty()) {
            foreach ($students as $student) {
                $student->status = 1;
                $student->save();
            }
        }

       // return view('admin.certificate.download', compact('students','issue_date','director_signature','chairman_signature'));
        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $options->set('chroot', realpath(''));
        $dompdf = new Dompdf($options);
        $html = view('admin.certificate.download', compact('students','issue_date'))->render();
        $dompdf->loadHtml($html);
        $dompdf->setPaper([0, 0, 792, 612]);
        $dompdf->render();
        return $dompdf->stream('certificate.pdf');
    }

    public function certificate_setting(){
        $data=[];
        $data['setting']=Setting::first();
        return view('admin.certificate.setting',$data);
    }
    public function setting_update(Request $data){
        //$data=[];
        $data['setting']=Setting::first();
        if (isset($data['type'])) {
            foreach ($data['type'] as $type) {
                if (isset($data[$type])) {
                    $value = $data[$type];
                    $existingSetting = Setting::where('name', $type)->first();
                    $existingSetting->value = $value;
                    $existingSetting->save();
                }
            }
        }
        if ($data->has('chairman_signature')) {
            $chairman_signature = $this->uploadOne($data['chairman_signature'], 80,40, 'backend/images/setting/', true);
            $existingSetting = Setting::where('name', 'chairman_signature')->first();
            if ($existingSetting) {
                $this->deleteOne($existingSetting->value);
                $existingSetting->value = $chairman_signature;
                $existingSetting->save();
            }
        } else {
            $setting = Setting::where('name', 'chairman_signature')->first();
            if ($setting) {
                $setting->value = $setting->value;
                $setting->save();
            }
        }
        if ($data->has('director_signature')) {
            $director_signature = $this->uploadOne($data['director_signature'], 80,40, 'backend/images/setting/', true);
            $existingSetting = Setting::where('name', 'director_signature')->first();
            if ($existingSetting) {
                $this->deleteOne($existingSetting->value);
                $existingSetting->value = $director_signature;
                $existingSetting->save();
            }
        } else {
            $setting = Setting::where('name', 'director_signature')->first();
            if ($setting) {
                $setting->value = $setting->value;
                $setting->save();
            }
        }
        return back();
    }

       public function certificate_pagination(Request $request)
    {
        if ($request->ajax()) {
            $branch_id = $request->branch_id;
            $data = $request->search;
            $query = $this->results->where('created_by', $branch_id);
            if ($data) {
                $query->where(function ($q) use ($data) {
                    $q->where('name_en', 'LIKE', '%' . $data . '%')
                        ->orwhere('name_bn', 'LIKE', '%' . $data . '%')
                        ->orwhere('student_roll', 'LIKE', '%' . $data . '%')
                        ->orWhere('student_registration_no', 'LIKE', '%' . $data . '%')
                        ->orWhere('phone', 'LIKE', '%' . $data . '%');
                });
                $query->orWhereHas('course', function ($q) use ($data) {
                    $q->where('name', 'LIKE', '%' . $data . '%');
                });
            }
            $students = $query->Orderby('id', 'desc')->paginate(100);
            $page = $request->input('page', 1);
            $startIndex = ($page - 1) * 100;
            return view('admin.certificate.studenttable', compact('students','startIndex'))->render();
        }
    }

    public function certificate_search(Request $request)
    {
        $data = $request->search;
        $branch_id = $request->branch_id;
        $query = $this->results->where('created_by', $branch_id);
        if ($data) {
            $query->where(function ($q) use ($data) {
                $q->where('name_en', 'LIKE', '%' . $data . '%')
                    ->orwhere('name_bn', 'LIKE', '%' . $data . '%')
                    ->orwhere('student_roll', 'LIKE', '%' . $data . '%')
                    ->orWhere('student_registration_no', 'LIKE', '%' . $data . '%')
                    ->orWhere('phone', 'LIKE', '%' . $data . '%');
            });
            $query->orWhereHas('course', function ($q) use ($data) {
                $q->where('name', 'LIKE', '%' . $data . '%');
            });
        }
        $students = $query->Orderby('id', 'desc')->paginate(100);
        $page = $request->input('page', 1);
        $startIndex = ($page - 1) * 100;
        return view('admin.certificate.studenttable', compact('students','startIndex'))->render();
    }
}
