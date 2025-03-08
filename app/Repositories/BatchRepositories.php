<?php
namespace App\Repositories;
use App\Models\Batch;
use App\Traits\Uploadable;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Interface\BatchInterface;

class BatchRepositories implements BatchInterface
{
    use Uploadable;
    public function all(){
        $branch_id=Auth::guard('admin')->user()->branch_id;
        return Batch::where('branch_id',$branch_id)->where('status',1)->Orderby('id','desc')->get();


    }
    public function store(array $data){
        $batch= new Batch();
        $batch->name=$data['name'];
        $batch->branch_id=Auth::guard('admin')->user()->branch_id;
        $batch->start_time=$data['start_time'];
        $batch->end_time=$data['end_time'];
        $batch->total_sit=$data['total_sit'];
        $batch->weekdays = implode(',', $data['weekdays'] ?? []);
        $batch->status=1;
        $batch->description=$data['description'];
        $batch->save();
    }
    public function get($id){
        if(Auth::guard('admin')->user()->role == '1'){
            return Batch::find($id);
        }else{
            $branch_id=Auth::guard('admin')->user()->branch_id;
            $batch= Batch::find($id);
            if($batch->branch_id==$branch_id){
                return $batch;
            }else{
               return abort(404);
            }
        }

    }
    public function update(array $data,$id){
        $batch=Batch::find($id);
        $batch->name=$data['name'];
        $batch->branch_id=$batch->branch_id;
        $batch->start_time=$data['start_time'];
        $batch->end_time=$data['end_time'];
        $batch->total_sit=$data['total_sit'];
        $batch->weekdays = implode(',', $data['weekdays'] ?? []);
        $batch->status=1;
        $batch->description=$data['description'];
        $batch->save();
    }
    public function delete($id){
        $batch=Batch::find($id);
        if(!empty($batch)){
            $batch->delete();
        }
    }

    public function statusChange(array $data)
    {
        $batch = Batch::find($data['id']);
        if ($batch) {
            $batch->status = $batch->status ? 0 : 1;
            $batch->save();
        }
    }
}
