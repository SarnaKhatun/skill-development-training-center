<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Carbon\Carbon;
use App\Models\Branch;
use App\Models\Course;
use App\Models\Message;
use App\Models\Session;
use App\Models\Student;
use App\Models\GroupMember;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SMSController;

class MessageController extends Controller
{
    protected $smsController;

    public function __construct(SmsController $smsController)
    {
        $this->smsController = $smsController;
    }

    public function quick()
    {
        return view('admin.message.quick');
    }

    public function quick_send(Request $request)
    {

        $request->validate([
            'phone' => 'required|digits:11',
            'message' => 'required|max:800'
        ]);
      // try {
            // dd($request);
            $branch_id = Branch::where('id', Auth::user()->branch_id)->first();
            if ($branch_id->sms ==0) {
                return back()->with('error', 'Not Enough SMS');
            }
            $phoneWithPrefix = '88' . $request->phone;
            $this->smsController->sendSMS($phoneWithPrefix, $request->message);
            $message = new Message();
            $message->phone = $request->phone;
            $message->message = $request->message;
            $message->branch_id = Auth::user()->branch_id;
            $message->type = 1;
            $message->save();
            $branch_id->sms -= 1;
            $branch_id->save();
            return redirect()->back()->with('success', 'Message Send Successfully');
     /*  } catch (Exception $e) {
            return back()->with('error', 'Something went to Wrong');
        }*/
    }

    public function birthday()
    {
        $data = [];
        $date = Carbon::now()->format('m-d'); // Format the current date to match the format of the DOB in the database
        $data['students'] = Student::whereRaw('DATE_FORMAT(dob, "%m-%d") = ?', [$date])->where('created_by',Auth::user()->branch_id)->get();
        return view('admin.message.birthday', $data);
    }
    public function birthday_send(Request $request)
    {
        $request->validate([
            'message' => 'required|max:1200'
        ]);
        try {
            $ids = explode(',', $request->ids);
            $students = Student::whereIn('id', $ids)->get();
            $branch_id = Branch::where('id', Auth::user()->branch_id)->first();

            if ($students->count() > 0) {
                if ($branch_id->sms < $students->count()) {
                    return back()->with('error', 'Not Enough SMS');
                }
                foreach ($students as $item) {
                    $message = new Message();
                    $message->phone = $item->phone;
                    $message->message = $request->message;
                    $message->branch_id = $branch_id->id;
                    $message->type = 3;
                    $phoneWithPrefix = '88' . $item->phone;
                    $this->smsController->sendSMS($phoneWithPrefix, $request->message);
                    $message->save();
                }
                $branch_id->sms= $branch_id->sms - $students->count();
                $branch_id->save();
                return redirect()->back()->with('success', 'Message Send Successfully');
            } else {
                return back()->with('error', 'Student Not Select');
            }
        } catch (Exception $e) {
            return back()->with('error', 'Something went to Wrong');
        }
    }
    public function batch()
    {
        $data['students'] = [];
        $data['courses'] = Course::get();
        $data['sessions'] = Session::get();
        return view('admin.message.batch', $data);
    }
    public function batch_send(Request $request)
    {
        $request->validate([
            'message' => 'required|max:1200'
        ]);

       try {
            $ids = explode(',', $request->ids);
            $students = Student::whereIn('id', $ids)->get();
            $branch_id = Branch::where('id', Auth::user()->branch_id)->first();

            if ($students->count() > 0) {
                if ($branch_id->sms < $students->count()) {
                    return back()->with('error', 'Not Enough SMS');
                }
                foreach ($students as $item) {
                    $message = new Message();
                    $message->phone = $item->phone;
                    $message->message = $request->message;
                    $message->branch_id = $branch_id->id;
                    $message->type = 3;
                    $phoneWithPrefix = '88' . $item->phone;
                    $this->smsController->sendSMS($phoneWithPrefix, $request->message);
                    $message->save();
                }
                $branch_id->sms= $branch_id->sms - $students->count();
                $branch_id->save();
                return redirect()->back()->with('success', 'Message Send Successfully');
            } else {
                return back()->with('error', 'Student Not Select');
            }
        } catch (Exception $e) {
            return back()->with('error', 'Something went to Wrong');
        }
    }
    public function student_select(Request $request)
    {
        //

        $course_id = $request->course_id;
        $session_id = $request->session_id;
        $year = $request->year;
        //dd($request->all());
        if ($course_id && $session_id && $year) {
            $data['students'] = Student::where('course_id', $course_id)->where('session_id', $session_id)->where('session_year',$year)->where('created_by',Auth::user()->branch_id)->get();
            //dd($data['students']);
        } else {
            $data['students'] = [];
        }
        //dd($data['students']);
        return view('admin.message.select_student', $data);
    }


    public function group_send(Request $request)
    {
        $request->validate([
            'message' => 'required|max:1200'
        ]);

       try {
            $ids = explode(',', $request->ids);
           // dd($ids);
            $members = GroupMember::whereIn('id', $ids)->get();
            //return $members;
            $branch_id = Branch::where('id', Auth::user()->branch_id)->first();

            if ($members->count() > 0) {
                if ($branch_id->sms < $members->count()) {
                    return back()->with('error', 'Not Enough SMS');
                }
                foreach ($members as $item) {
                    $message = new Message();
                    $message->phone = $item->phone;
                    $message->message = $request->message;
                    $message->branch_id = $branch_id->id;
                    $message->type = 4;
                    $phoneWithPrefix = '88' . $item->phone;
                    $this->smsController->sendSMS($phoneWithPrefix, $request->message);
                    $message->save();
                }
                $branch_id->sms= $branch_id->sms - $members->count();
                $branch_id->save();
                return redirect()->back()->with('success', 'Message Send Successfully');
            } else {
                return back()->with('error', 'Member Not Select');
            }
        } catch (Exception $e) {
            return back()->with('error', 'Something went to Wrong');
        }
    }
}