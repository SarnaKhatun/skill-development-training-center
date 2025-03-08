<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Batch;
use App\Models\Student;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\Branch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\BatchRequest;
use App\Http\Controllers\Controller;
use App\Repositories\Interface\BatchInterface;

class BatchController extends Controller
{
    protected $batch;
    public function __construct(BatchInterface $batch){
        $this->batch=$batch;
    }
    public function index(){
        $data=[];
        $data['batches']=$this->batch->all();
        return view('admin.batch.index',$data);
    }
      public function closed_batch(){
        $data=[];
        $branch_id=Auth::guard('admin')->user()->branch_id;
        $data['batches']= Batch::where('status',0)->where('branch_id',$branch_id)->Orderby('id','asc')->get();
        return view('admin.batch.closedbatch',$data);
    }

    public function create()
    {
        return view('admin.batch.create');
    }

    public function store(BatchRequest $request){
        try{
            //dd($request);
            $this->batch->store($request->all());
            return redirect()->route('admin.batch.index')->with('success','Batch Created Successfully');
       }catch(Exception $e){
            return back()->with('error','Something went to Wrong');
        }
    }

    public function edit($id){
        try{
            $data=[];
            $data['batch']=$this->batch->get($id);
            return view('admin.batch.create',$data);
        }catch(Exception $e){
            return back()->with('error','Sorry Something went to Wrong');
        }
    }

    public function update(Request $request,$id){
        $request->validate([
            'name' => 'required|string|max:65|unique:batches,name,'.$id,
            'start_time' => 'required',
            'end_time' => 'required',
            'total_sit' => 'required',
            'weekdays' => 'required',
            'description' => ' nullable|string|max:450',
        ]);
        try{
            $this->batch->update($request->all(),$id);
            return redirect()->route('admin.batch.index')->with('success','Batch  Update Successfully');
        }catch(Exception $e){
            return back()->with('error','Sorry Something Went to Wrong');
        }
    }

    public function delete($id)
    {
        try {
            $this->batch->delete($id);
            return redirect()->back()->with('success','Batch Deleted Successfully');
        }catch (Exception $e){
            return redirect()->back()->with('error','Sorry Something Went to Wrong');
        }

    }
    public function statusChange(Request $request ,$id)
     {
        try{
            $batch=Batch::find($id);
            $batch->status=0;
            $batch->save();
            return redirect()->back()->with('success','Batch Closed Successfully');
        }catch (Exception $e){
            return redirect()->back()->with('error','Sorry Something Went to Wrong');
        }
    }

    public function batch_student_download($id){


        ini_set('max_execution_time',3600);
        $data['students']=Student::where('batch_id',$id)->orderby('id','asc')->get();
        $data['batch']=Batch::find($id);
        $data['branch']=Branch::where('id',Auth::user()->branch_id)->first();
        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $options->set('chroot', realpath(''));
        $dompdf = new Dompdf($options);
        $html = view('admin.batch.studentdownload',$data)->render();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        return $dompdf->stream('batch.pdf');

       // return view('admin.batch.studentdownload',$data);
    }
}