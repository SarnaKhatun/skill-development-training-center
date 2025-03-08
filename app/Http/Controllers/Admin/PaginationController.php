<?php

namespace App\Http\Controllers\Admin;

use App\Models\Result;
use App\Models\Student;
use App\Models\Register;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PaginationController extends Controller
{
    protected $students, $registers, $results;
    public function __construct()
    {
        $this->students = Student::query();
        $this->registers = Register::query();
        $resultsdata = Result::all();
        $studentIds = $resultsdata->pluck('student_id')->unique()->toArray();
        $this->results = Student::query()->whereIn('id', $studentIds);
        //$this->results =$allresults;
    }
    public function data_search(Request $request)
    {
        //dd($request->all());
        $data = $request->search;
        $type = $request->type;
        if ($type == 'students') {
            if (Auth::user()->branch_id == 1) {
                $query = $this->students;
            } else {
                $query = $this->students->where('created_by', Auth::user()->branch_id);
            }
            if ($data) {
                $query->where(function ($q) use ($data) {
                    $q->where('name_en', 'LIKE', '%' . $data . '%')
                        ->orwhere('name_bn', 'LIKE', '%' . $data . '%')
                        ->orwhere('student_roll', 'LIKE', '%' . $data . '%')
                        ->orWhere('student_registration_no', 'LIKE', '%' . $data . '%')
                        ->orWhere('fathers_name', 'LIKE', '%' . $data . '%')
                        ->orWhere('phone', 'LIKE', '%' . $data . '%');
                });
                $query->orWhereHas('course', function ($q) use ($data) {
                    $q->where('name', 'LIKE', '%' . $data . '%');
                });
                $query->orWhereHas('batch', function ($q) use ($data) {
                    $q->where('name', 'LIKE', '%' . $data . '%');
                });
            }
            $students = $query->orderBy('id', 'desc')->paginate(100);
            return view('admin.student.student', compact('students', 'data'))->render();
        }elseif ($type == 'duestudents') {
            $query = $this->students->where('created_by', Auth::user()->branch_id)->where('due','>',0);
            if ($data) {
                $query->where(function ($q) use ($data) {
                    $q->where('name_en', 'LIKE', '%' . $data . '%')
                        ->orwhere('name_bn', 'LIKE', '%' . $data . '%')
                        ->orwhere('student_roll', 'LIKE', '%' . $data . '%')
                        ->orWhere('student_registration_no', 'LIKE', '%' . $data . '%')
                        ->orWhere('fathers_name', 'LIKE', '%' . $data . '%')
                        ->orWhere('phone', 'LIKE', '%' . $data . '%');
                });
                $query->orWhereHas('course', function ($q) use ($data) {
                    $q->where('name', 'LIKE', '%' . $data . '%');
                });
                $query->orWhereHas('batch', function ($q) use ($data) {
                    $q->where('name', 'LIKE', '%' . $data . '%');
                });
            }
            $students = $query->orderBy('id', 'desc')->paginate(100);
            return view('admin.student.duestudent', compact('students', 'data'))->render();
        } elseif ($type == 'registers') {
            $query =  $this->registers->where('branch_id', Auth::user()->branch_id);
            if ($data) {
                $query->where(function ($q) use ($data) {
                    $q->where('id', 'LIKE', '%' . $data . '%')
                        ->orwhere('register_number', 'LIKE', '%' . $data . '%');
                });
                $query->orWhereHas('student', function ($q) use ($data) {
                    $q->where('name_en', 'LIKE', '%' . $data . '%');
                });
            }
            $registers = $query->orderBy('id', 'desc')->paginate(100);
            return view('admin.register.student', compact('registers'))->render();
        } else {
            $query = $this->results->where('created_by', Auth::user()->branch_id);
            if ($data) {
                $query->where(function ($q) use ($data) {
                    $q->where('name_en', 'LIKE', '%' . $data . '%')
                        ->orwhere('name_bn', 'LIKE', '%' . $data . '%')
                        ->orwhere('student_roll', 'LIKE', '%' . $data . '%')
                        ->orWhere('student_registration_no', 'LIKE', '%' . $data . '%')
                        ->orWhere('fathers_name', 'LIKE', '%' . $data . '%')
                        ->orWhere('phone', 'LIKE', '%' . $data . '%');
                });
                $query->orWhereHas('course', function ($q) use ($data) {
                    $q->where('name', 'LIKE', '%' . $data . '%');
                });
            }
            $students = $query->Orderby('id', 'desc')->paginate(100);
            return view('admin.result.student', compact('students'))->render();
        }
    }

    public function data_pagination(Request $request)
    {
        if ($request->ajax()) {
            //dd($request->all());
            $condition = $request->get('condition');
            $data = $request->search;
            if ($condition == 'students') {
                $query = $this->students;
                if ($data) {
                    $query->where(function ($q) use ($data) {
                        $q->where('name_en', 'LIKE', '%' . $data . '%')
                            ->orwhere('name_bn', 'LIKE', '%' . $data . '%')
                            ->orwhere('student_roll', 'LIKE', '%' . $data . '%')
                            ->orWhere('student_registration_no', 'LIKE', '%' . $data . '%')
                            ->orWhere('fathers_name', 'LIKE', '%' . $data . '%')
                            ->orWhere('phone', 'LIKE', '%' . $data . '%');
                    })
                        ->orWhereHas('course', function ($q) use ($data) {
                            $q->where('name', 'LIKE', '%' . $data . '%');
                        })
                        ->orWhereHas('batch', function ($q) use ($data) {
                            $q->where('name', 'LIKE', '%' . $data . '%');
                        });
                }

                if (Auth::user()->branch_id != 1) {
                    $query->where('created_by', Auth::user()->branch_id);
                }
                $students = $query->orderBy('id', 'desc')->paginate(100);
                return view('admin.student.student', compact('students'))->render();
            }elseif ($condition == 'duestudents') {
                 $query = $this->students->where('due','>',0);
                
                if ($data) {
                    $query->where(function ($q) use ($data) {
                        $q->where('name_en', 'LIKE', '%' . $data . '%')
                            ->orwhere('name_bn', 'LIKE', '%' . $data . '%')
                            ->orwhere('student_roll', 'LIKE', '%' . $data . '%')
                            ->orWhere('student_registration_no', 'LIKE', '%' . $data . '%')
                            ->orWhere('fathers_name', 'LIKE', '%' . $data . '%')
                            ->orWhere('phone', 'LIKE', '%' . $data . '%');
                    })
                        ->orWhereHas('course', function ($q) use ($data) {
                            $q->where('name', 'LIKE', '%' . $data . '%');
                        })
                        ->orWhereHas('batch', function ($q) use ($data) {
                            $q->where('name', 'LIKE', '%' . $data . '%');
                        });
                }
                $query = $this->students->where('created_by', Auth::user()->branch_id);
                $students = $query->orderBy('id', 'desc')->paginate(100);
                return view('admin.student.duestudent', compact('students'))->render();
            }elseif ($condition == 'registers') {
                $query = $this->registers->where('branch_id', Auth::user()->branch_id);
                if ($data) {
                    $query->where(function ($q) use ($data) {
                        $q->where('id', 'LIKE', '%' . $data . '%')
                            ->orwhere('register_number', 'LIKE', '%' . $data . '%');
                    });
                    $query->orWhereHas('student', function ($q) use ($data) {
                        $q->where('name_en', 'LIKE', '%' . $data . '%');
                    });
                }
                $registers =  $query->orderBy('id', 'desc')->paginate(100);
                return view('admin.register.student', compact('registers'))->render();
            } else {
                $query = $this->results->where('created_by', Auth::user()->branch_id);
                if ($data) {
                    $query->where(function ($q) use ($data) {
                        $q->where('name_en', 'LIKE', '%' . $data . '%')
                            ->orwhere('name_bn', 'LIKE', '%' . $data . '%')
                            ->orwhere('student_roll', 'LIKE', '%' . $data . '%')
                            ->orWhere('student_registration_no', 'LIKE', '%' . $data . '%')
                            ->orWhere('fathers_name', 'LIKE', '%' . $data . '%')
                            ->orWhere('phone', 'LIKE', '%' . $data . '%');
                    });
                    $query->orWhereHas('course', function ($q) use ($data) {
                        $q->where('name', 'LIKE', '%' . $data . '%');
                    });
                }
                $students = $query->Orderby('id', 'desc')->paginate(100);
                return view('admin.result.student', compact('students'))->render();
            }
        }
    }
}