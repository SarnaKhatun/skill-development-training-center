<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\Batch;
use App\Models\Result;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ResultRequest;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Interface\ResultInterface;

class ResultController extends Controller
{
    protected $result;
    public function __construct(ResultInterface $result){
        $this->result=$result;
    }


    public function index(Request $request)
    {
        $resultsdata = Result::all();
        $studentIds = $resultsdata->pluck('student_id')->unique()->toArray();
        $resultQuery = Student::query()->whereIn('id', $studentIds);


        $resultQuery->where('created_by', Auth::user()->branch_id);
        if (!empty($request['searchData'])) {
            $searchTerms = $request['searchData'];
            $resultQuery->where(function ($q) use ($searchTerms) {
                $q->where('name_en', 'LIKE', "%{$searchTerms}%")
                    ->orWhere('name_bn', 'LIKE', "%{$searchTerms}%")
                    ->orWhere('student_roll', 'LIKE', "%{$searchTerms}%")
                    ->orWhere('student_registration_no', 'LIKE', "%{$searchTerms}%")
                    ->orWhere('fathers_name', 'LIKE', "%{$searchTerms}%")
                    ->orWhere('phone', 'LIKE', "%{$searchTerms}%");
            })->orWhereHas('course', function ($query) use ($searchTerms) {
                $query->where('name', 'LIKE', "%{$searchTerms}%");
            });
        }

        $perPage = isset($request['perPage']) ? intval($request['perPage']) : 100;
        $currentPage = max(1, $request->input('page', 1));
        $startIndex = ($currentPage - 1) * $perPage;
        $students =  $resultQuery->whereHas('result')->latest()->paginate($perPage);


        if ($request->ajax()) {
            return view('admin.result.student', compact('students', 'startIndex'))->render();
        } else {
            return view('admin.result.index', compact('students', 'startIndex'));
        }
    }

    public function index1(){
        $data=[];
        $data['students']=$this->result->all();
        return view('admin.result.index',$data);
    }

    public function create(Request $request)
    {
        $batch=$request->batch_id;
         if($batch){
            $results = Result::all();
            $studentIds = $results->pluck('student_id')->unique()->toArray();
            $data['students']=Student::where('batch_id',$batch)->whereNotin('id',$studentIds)->where('student_registration_no', '!=', 0)->get();
            return view('admin.result.create',$data);
        }
        return redirect()->back();

    }

    public function store(ResultRequest $request){
        try{
           // dd($request);
            $this->result->store($request->all());
            return back()->with('success','Result Created Successfully');
        }catch(Exception $e){
            return back()->with('error','Something went to Wrong');
        }
    }

    public function edit($id){
        try{
            $data=[];
            $data['result']=$this->result->get($id);
            return view('admin.result.create',$data);
        }catch(Exception $e){
            return back()->with('error','Sorry Something went to Wrong');
        }
    }

    public function update(ResultRequest  $request,$id){
        try{
            $this->result->update($request->all(),$id);
            return redirect()->back()->with('success','Result  Update Successfully');
        }catch(Exception $e){
            return back()->with('error','Sorry Something Went to Wrong');
        }
    }

    public function show($id)
    {


    }
    public function delete($id)
    {
        try {
            $this->result->delete($id);
            return redirect()->back()->with('success','Result Deleted Successfully');
        }catch (Exception $e){
            return redirect()->back()->with('error','Sorry Something Went to Wrong');
        }

    }

    public function batch_search(){
        $branch_id=Auth::guard('admin')->user()->branch_id;
        $data['batches']=Batch::where('branch_id',$branch_id)->where('status',1)->latest()->get();
        return view('admin.result.batchsearch',$data);
    }

    public function resultshow($id){
        $result = Result::where('student_id', $id)->first();
        if(!$result){
            return redirect()->back()->with('error',' Result not Published Yet !');
        }
       // return view('admin.result.resultShow', compact('result'));
        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $options->set('chroot', realpath(''));
        $dompdf = new Dompdf($options);
        $html = view('admin.result.resultShow', compact('result'))->render();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        return $dompdf->stream('result.pdf');
    }

}
