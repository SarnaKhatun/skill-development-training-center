<?php
namespace App\Repositories;
use App\Models\Course;
use App\Traits\Uploadable;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Interface\CourseInterface;

class CourseRepositories implements CourseInterface
{
    use Uploadable;
    public function all(){
        return Course::Orderby('priority','asc')->get();
    }
    public function store(array $data){
        $course= new Course();
        $filename = "";
        $status = 1;
        $course_type = 1;
        $course_view = 1;
        if (array_key_exists('image', $data)){
            $filename = $this->uploadOne($data['image'], 1010, 500, 'backend/images/course/', true);
        }
        if (array_key_exists('status', $data)) {
            if ($data['status'] === null) {
                $status = 0;
            }
        } else {
            $status = 0;
        }
        if (array_key_exists('course_type', $data)) {
            if ($data['course_type'] === null) {
                $course_type = 0;
            }
        } else {
            $course_type = 0;
        }
        if (array_key_exists('course_view', $data)) {
            if ($data['course_view'] === null) {
                $course_view = 0;
            }
        } else {
            $course_view = 0;
        }

        $course->name=$data['name'];
        $course->slug=Str::slug($data['name']);
        //$course->branch_id=$data['branch_id'];
        $course->image=$filename;
        $course->priority=$data['priority'];
        $course->course_fee=$data['course_fee'];
        $course->discount=$data['discount'];
        $course->discount_fee=$data['discount_fee'];
        $course->admin_fee=$data['admin_fee'];
        $course->total_video=$data['total_video'];
        $course->total_hours=$data['total_hours'];
        $course->total_sheet=$data['total_sheet'];
        $course->total_mcq=$data['total_mcq'];
        $course->course_duration=$data['course_duration'];
       // $course->teacher_id=$data['teacher_id'];
        $course->course_view=$course_view;
        $course->course_type=$course_type;
        $course->status=$status;
        $course->description=$data['description'];
        $course->save();
    }
    public function get($id){
        return Course::find($id);
    }
    public function update(array $data,$id){
        $course=Course::find($id);
        $filename = "";
        $status = 1;
        $course_type = 1;
        $course_view = 1;
        if (array_key_exists('image', $data)){
            $this->deleteOne($course->image);
            $filename = $this->uploadOne($data['image'], 1010, 500, 'backend/images/course/', true);
        }else{
            $filename=$course->image;
        }
        if (array_key_exists('status', $data)) {
            if ($data['status'] === null) {
                $status = 0;
            }
        } else {
            $status = 0;
        }
        if (array_key_exists('course_type', $data)) {
            if ($data['course_type'] === null) {
                $course_type = 0;
            }
        } else {
            $course_type = 0;
        }
        if (array_key_exists('course_view', $data)) {
            if ($data['course_view'] === null) {
                $course_view = 0;
            }
        } else {
            $course_view = 0;
        }

        $course->name=$data['name'];
        $course->slug=Str::slug($data['name']);;
        //$course->branch_id=$data['branch_id'];
        $course->image=$filename;
        $course->priority=$data['priority'];
        $course->course_fee=$data['course_fee'];
        $course->discount=$data['discount'];
        $course->discount_fee=$data['discount_fee'];
        $course->admin_fee=$data['admin_fee'];
        $course->total_video=$data['total_video'];
        $course->total_hours=$data['total_hours'];
        $course->total_sheet=$data['total_sheet'];
        $course->total_mcq=$data['total_mcq'];
        $course->course_duration=$data['course_duration'];
       // $course->teacher_id=$data['teacher_id'];
        $course->course_view=$course_view;
        $course->course_type=$course_type;
        $course->status=$status;
        $course->description=$data['description'];
        $course->save();
    }
    public function delete($id){
        $course=Course::find($id);
        if(!empty($course)){
            $this->deleteOne($course->image);
            $course->delete();
        }
    }
    public function statusChange(array $data)
    {
        $course = Course::find($data['id']);
        if ($course) {
            $course->status = $course->status ? 0 : 1;
            $course->save();
        }
    }
}
