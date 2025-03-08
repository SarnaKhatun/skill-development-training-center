<?php

namespace App\Http\Controllers\Frontend;

use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\Branch;
use App\Models\Event;
use App\Models\Course;
use App\Models\Counter;
use App\Models\Gallery;
use App\Models\Service;
use App\Models\Student;
use App\Models\Result;
use Illuminate\Http\Request;
use App\Models\AchiveStudent;
use App\Models\BannerSection;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{

   public function index(){
    $data['services']=Service::OrderBy('priority','asc')->take(3)->get();
    $data['courses']=Course::where('status',1)->where('course_view',1)->OrderBy('priority','asc')->take(4)->get();
    $data['counter']=Counter::latest()->first();
    $data['achive_student']=AchiveStudent::latest()->take(12)->get();
    $data['bannerSection']=BannerSection::latest()->first();
    return view('frontend.pages.home',$data);
   }

   public function gallaryPage(){
    $data['galleries']=Gallery::latest()->get();
    return view('frontend.pages.gallery',$data);
   }

   public function coursePage(){
    $data['courses']=Course::where('status',1)->where('course_view',1)->latest()->get();
    return view('frontend.pages.course',$data);
   }

   public function courseDetails($slug){
    $data['courses']=Course::where('status',1)->where('course_view',1)->latest()->take(4)->get();
    $data['course']=Course::where('slug',$slug)->first();
    return view('frontend.pages.courseDetails',$data);
   }

   public function eventPage(){
    $data['events']=Event::latest()->get();
    return view('frontend.pages.events',$data);
   }

   public function eventDetails($slug){
    $data['events']=Event::latest()->take(4)->get();
    $data['event']=Event::where('slug',$slug)->first();
    return view('frontend.pages.eventDetails',$data);
   }

   public function contactPage(){
    return view('frontend.pages.contact');
   }

   public function aboutPage(){
    $data['branches']=Branch::where('status',1)->orderBy('id','asc')->get();
    return view('frontend.pages.about',$data);
   }

  public function certificate_verify($roll){
    $student=Student::where('student_roll',$roll)->first();
    return view('frontend.certificate_verify.info',compact('student'));
   }

   public function result_download(Request $request){
     $student=Student::where('student_roll',$request->student_roll)->first();
     if(!$student){
        return redirect()->back()->with('error','Student not Found !');
    }
     $result = Result::where('student_id', $student->id)->first();
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