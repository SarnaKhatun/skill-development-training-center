<?php
namespace App\Repositories;
use App\Models\CourseDetails;
use App\Traits\Uploadable;
use App\Repositories\Interface\CourseDetailsInterface;

class CourseDetailsRepositories implements CourseDetailsInterface
{
    use Uploadable;
    public function all(){
        return CourseDetails::Orderby('priority','asc')->get();
    }
    public function store(array $data){
        $coursedetail= new CourseDetails();
        $video = "";
        $pdf = "";
        $status=1;
        if (array_key_exists('status', $data)) {
            if ($data['status'] === null) {
                $status = 0;
            }
        } else {
            $status = 0;
        }
       /* if (array_key_exists('upload_video', $data)){
            $video = $this->uploadOne($data['upload_video'], 400, 300, 'backend/images/coursevideo/', true);
        }*/
        if (array_key_exists('upload_video', $data)){
            $video = time() . '.' . $data['upload_video']->getclientOriginalExtension();
            $data['upload_video']->move(public_path('backend/videos/coursevideo/'), $video);
            $video = "backend/videos/coursevideo/".$video;
        }
        if (array_key_exists('pdf', $data)){
            $pdf = time() . '.' . $data['pdf']->getclientOriginalExtension();
            $data['pdf']->move(public_path('backend/pdf/coursepdf/'), $pdf);
            $pdf = "backend/pdf/coursepdf/".$pdf;
        }
        $coursedetail->header_title=$data['header_title'];
        $coursedetail->title=$data['title'];
        $coursedetail->course_id=$data['course_id'];
        $coursedetail->type=$data['type'];
        $coursedetail->url_video=$data['url_video'];
        $coursedetail->upload_video=$video;
        $coursedetail->pdf=$pdf;
        $coursedetail->priority=$data['priority'];
        $coursedetail->status=$status;
        $coursedetail->description=$data['description'];
        $coursedetail->save();
    }
    public function get($id){
        return CourseDetails::find($id);
    }
    public function update(array $data,$id){
        $coursedetail=CourseDetails::find($id);
        $video = "";
        $pdf = "";
        $status=1;
        if (array_key_exists('status', $data)) {
            if ($data['status'] === null) {
                $status = 0;
            }
        } else {
            $status = 0;
        }
        if (array_key_exists('upload_video', $data)){
            $video = time() . '.' . $data['upload_video']->getclientOriginalExtension();
            $data['upload_video']->move(public_path('backend/videos/coursevideo/'), $video);
            $video = "backend/videos/coursevideo/".$video;
        }else{
            $video=$coursedetail->upload_video;
        }
        if (array_key_exists('pdf', $data)){
            $pdf = time() . '.' . $data['pdf']->getclientOriginalExtension();
            $data['pdf']->move(public_path('backend/pdf/coursepdf/'), $pdf);
            $pdf = "backend/pdf/coursepdf/".$pdf;
        }else{
            $pdf=$coursedetail->pdf;
        }
        $coursedetail->header_title=$data['header_title'];
        $coursedetail->title=$data['title'];
        $coursedetail->course_id=$data['course_id'];
        $coursedetail->type=$data['type'];
        $coursedetail->url_video=$data['url_video'];
        $coursedetail->upload_video=$video;
        $coursedetail->pdf=$pdf;
        $coursedetail->status=$status;
        $coursedetail->priority=$data['priority'];
        $coursedetail->description=$data['description'];
        $coursedetail->save();
    }
    public function delete($id){
        $coursedetail=CourseDetails::find($id);
        if(!empty($coursedetail)){
            $this->deleteOne($coursedetail->upload_video);
            $this->deleteOne($coursedetail->pdf);
            $coursedetail->delete();
        }
    }
    public function statusChange(array $data)
    {
        $coursedetail = Coursedetails::find($data['id']);
        if ($coursedetail) {
            $coursedetail->status = $coursedetail->status ? 0 : 1;
            $coursedetail->save();
        }
    }
}