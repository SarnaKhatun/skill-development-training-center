<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BatchController;
use App\Http\Controllers\Admin\BoardController;
use App\Http\Controllers\Admin\EventController;
use \App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\ResultController;
use App\Http\Controllers\Admin\CounterController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SessionController;
use App\Http\Controllers\Admin\SettingController;
use \App\Http\Controllers\Admin\GalleryController;
use \App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\DistrictController;
use App\Http\Controllers\Admin\DivisionController;
use App\Http\Controllers\Admin\NoteFileController;
use App\Http\Controllers\Admin\RegisterController;
use App\Http\Controllers\Admin\SmsGroupController;
use App\Http\Controllers\Admin\UpazillaController;
use \App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PaginationController;
use \App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\CertificateController;
use App\Http\Controllers\Admin\ExaminationController;
use App\Http\Controllers\Admin\AchiveStudentController;
use App\Http\Controllers\Admin\BannerSectionController;
use App\Http\Controllers\Admin\CourseDetailsController;
use App\Http\Controllers\Admin\BranchBallanceController;
use App\Http\Controllers\Admin\AdmissionPaymentController;
use App\Http\Controllers\Frontend\NearByRequestController;
use App\Http\Controllers\Admin\WrittenExamController;
use App\Http\Controllers\Admin\MCQQuizController;
use App\Http\Controllers\Admin\AttendanceController;

//Admin Route
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [LoginController::class, 'login'])->name('login');
    Route::post('/check-login', [LoginController::class, 'checkLogin'])->name('check.login');


    //Route::middleware(['auth:admin'])->group(function (){
    Route::middleware(['auth:admin', 'check.role:1,2,3'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
        Route::post('/logout', [DashboardController::class, 'logout'])->name('logout');

        Route::get('/get-district/ajax/{division_id}', [DistrictController::class, 'getdistrict'])->name('district.ajax');
        Route::get('/get-upazilla/ajax/{district_id}', [UpazillaController::class, 'getupazilla'])->name('upazilla.ajax');

          //pagination
        Route::get('data_search', [PaginationController::class, 'data_search'])->name('data.search');
        Route::get('data/pagination', [PaginationController::class, 'data_pagination'])->name('data.pagination');

        //student
        Route::prefix('students')->name('student.')->group(function () {
            Route::get('/', [StudentController::class, 'index'])->name('index');
            Route::get('/create', [StudentController::class, 'create'])->name('create');
            Route::post('/store', [StudentController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [StudentController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [StudentController::class, 'update'])->name('update');
            Route::get('/show/{id}', [StudentController::class, 'show'])->name('show');
            Route::get('/delete/{id}', [StudentController::class, 'delete'])->name('delete');
            Route::get('/job_info/{id}', [StudentController::class, 'job_info'])->name('job_info');
            Route::post('/job_update/{id}', [StudentController::class, 'job_update'])->name('job_update');
            Route::get('/download-search', [StudentController::class, 'download_search'])->name('download.search');
            Route::get('/download', [StudentController::class, 'download'])->name('download');
            Route::get('/pdf/download', [StudentController::class, 'pdf_download'])->name('pdf.download');
            Route::get('/duelist', [StudentController::class, 'duelist'])->name('duelist');
            Route::get('/due/download', [StudentController::class, 'due_search'])->name('due.search');
            Route::get('/due/pdf/download', [StudentController::class, 'due_pdf_download'])->name('due.download');
            Route::get('/certified', [StudentController::class, 'certified'])->name('certified');
            Route::post('/password', [StudentController::class, 'change_password'])->name('password');
            Route::get('/id-card/{id}', [StudentController::class, 'idCard'])->name('id-card');

        });

        //admissionPayment
        Route::prefix('admissionPayment')->name('admissionPayment.')->group(function () {
            Route::get('/', [AdmissionPaymentController::class, 'index'])->name('index');
            Route::post('/store', [AdmissionPaymentController::class, 'store'])->name('store');
            Route::get('/find/{id}', [AdmissionPaymentController::class, 'find'])->name('find');
            Route::get('/admissionpayment/student', [AdmissionPaymentController::class, 'admissionpayment_student'])->name('student');
            Route::get('/admissionpayment/search', [AdmissionPaymentController::class, 'admissionpayment_search'])->name('search');
        });

        //notefile
        Route::prefix('file')->name('file.')->group(function () {
            Route::get('/', [NoteFileController::class, 'index'])->name('index');
            Route::get('/branchfile', [NoteFileController::class, 'branchfile'])->name('branchfile');
            Route::get('/create', [NoteFileController::class, 'create'])->name('create');
            Route::post('/store', [NoteFileController::class, 'store'])->name('store');
            Route::get('/delete/{id}', [NoteFileController::class, 'destroy'])->name('destroy');
            Route::get('/download/{id}', [NoteFileController::class, 'download'])->name('download');
            Route::get('/charge', [NoteFileController::class, 'charge'])->name('charge');
            Route::get('/courses/fees', [NoteFileController::class, 'courses_fees'])->name('courses.fees');
        });

        //attendance
        Route::resource('attendances', AttendanceController::class);
        Route::get('/attendance/getBatchStudents', [AttendanceController::class, 'getBatchStudents'])->name('attendance.getBatchStudents');

        Route::get('/attendance/batch', [AttendanceController::class, 'getBatchAttendance'])
            ->name('attendance.getBatchAttendance');


        //exam question
        Route::resource('written-exams', WrittenExamController::class);
        //Route::get('/written-exam-delete/{id}', [WrittenExamController::class, 'destroy'])->name('written-exams.delete');
        Route::get('/written-exams/change-status/{id}', [WrittenExamController::class, 'changeStatus'])->name('written-exams.changeStatus');

        Route::get('/written-exams/{examId}/give-marks', [WrittenExamController::class, 'givenMarks'])->name('written-exams.given-marks');
        Route::post('/written-exams/{examId}/save-marks', [WrittenExamController::class, 'saveMarks'])->name('written-exams.save-marks');


        Route::get('/written-exam/get-marks/{examId}', [WrittenExamController::class, 'getMarks'])->name('written-exams.get-marks');
        Route::get('/all-exam/result', [WrittenExamController::class, 'allResult'])->name('all-exam.result.list');



        Route::resource('mcq-exams', MCQQuizController::class);
        //Route::get('/mcq-exam-delete/{id}', [MCQQuizController::class, 'destroy'])->name('mcq-exams.delete');
        Route::get('/mcq-exams/change-status/{id}', [MCQQuizController::class, 'changeStatus'])->name('mcq-exams.changeStatus');
        Route::get('/mcq-results', [MCQQuizController::class, 'allStudentResults'])->name('mcq.result.list');
        Route::get('/mcq-result/{mcq_exam_id}/{student_id}', [MCQQuizController::class, 'studentResultDetails'])->name('mcq.result.details');

    });
    Route::middleware(['auth:admin', 'check.role:1,2'])->group(function () {
        Route::get('/change-password', [DashboardController::class, 'Password_page'])->name('password.page');
        Route::post('/update-password/{id}', [DashboardController::class, 'updatePassword'])->name('update.password');
        Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
        Route::get('/profile-update', [AdminController::class, 'profileUpdate'])->name('profile.update');





        //Staff
        Route::prefix('staff')->name('staff.')->group(function () {
            Route::get('/', [AdminController::class, 'index'])->name('index');
            Route::get('/create', [AdminController::class, 'create'])->name('create');
            Route::post('/store', [AdminController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [AdminController::class, 'update'])->name('update');
            Route::get('/delete/{id}', [AdminController::class, 'delete'])->name('delete');
            Route::get('/status-change/{id}', [AdminController::class, 'statusChange'])->name('statusChange');
        });
        //Branch
        Route::prefix('branch')->name('branch.')->group(function () {
            Route::get('/', [BranchController::class, 'index'])->name('index');
            Route::get('/create', [BranchController::class, 'create'])->name('create');
            Route::post('/store', [BranchController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [BranchController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [BranchController::class, 'update'])->name('update');
            Route::get('/show/{id}', [BranchController::class, 'show'])->name('show');
            Route::get('/delete/{id}', [BranchController::class, 'delete'])->name('delete');
            Route::get('/status-change/{id}', [BranchController::class, 'statusChange'])->name('statusChange');
            Route::post('/password', [BranchController::class, 'change_password'])->name('password');
        });
        //division
        Route::prefix('division')->name('division.')->group(function () {
            Route::get('/', [DivisionController::class, 'index'])->name('index');
            Route::get('/create', [DivisionController::class, 'create'])->name('create');
            Route::post('/store', [DivisionController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [DivisionController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [DivisionController::class, 'update'])->name('update');
            Route::get('/delete/{id}', [DivisionController::class, 'delete'])->name('delete');
            Route::get('/status-change/{id}', [DivisionController::class, 'statusChange'])->name('statusChange');
        });
        //district
        Route::prefix('district')->name('district.')->group(function () {
            Route::get('/', [DistrictController::class, 'index'])->name('index');
            Route::get('/create', [DistrictController::class, 'create'])->name('create');
            Route::post('/store', [DistrictController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [DistrictController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [DistrictController::class, 'update'])->name('update');
            Route::get('/delete/{id}', [DistrictController::class, 'delete'])->name('delete');
            Route::get('/status-change/{id}', [DistrictController::class, 'statusChange'])->name('statusChange');
        });
        //upazilla
        Route::prefix('upazilla')->name('upazilla.')->group(function () {
            Route::get('/', [UpazillaController::class, 'index'])->name('index');
            Route::get('/create', [UpazillaController::class, 'create'])->name('create');
            Route::post('/store', [UpazillaController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [UpazillaController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [UpazillaController::class, 'update'])->name('update');
            Route::get('/delete/{id}', [UpazillaController::class, 'delete'])->name('delete');
            Route::get('/status-change/{id}', [UpazillaController::class, 'statusChange'])->name('statusChange');
        });
        //batch
        Route::prefix('batch')->name('batch.')->group(function () {
            Route::get('/', [BatchController::class, 'index'])->name('index');
            Route::get('/closed', [BatchController::class, 'closed_batch'])->name('closed');
            Route::get('/create', [BatchController::class, 'create'])->name('create');
            Route::post('/store', [BatchController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [BatchController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [BatchController::class, 'update'])->name('update');
            Route::get('/delete/{id}', [BatchController::class, 'delete'])->name('delete');
            Route::get('/status-change/{id}', [BatchController::class, 'statusChange'])->name('statusChange');
            Route::get('/batch/student/download/{id}', [BatchController::class, 'batch_student_download'])->name('download.student.batch');
        });

        //Gallery
        Route::prefix('galleries')->name('gallery.')->group(function () {
            Route::get('/', [GalleryController::class, 'index'])->name('index');
            Route::get('/create', [GalleryController::class, 'create'])->name('create');
            Route::post('/store', [GalleryController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [GalleryController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [GalleryController::class, 'update'])->name('update');
            Route::get('/delete/{id}', [GalleryController::class, 'delete'])->name('delete');
        });

        //Student Admission


        //Student Register
        Route::prefix('register')->name('register.')->group(function () {
            Route::get('/', [RegisterController::class, 'index'])->name('index');
            Route::get('/create', [RegisterController::class, 'create'])->name('create');
            Route::get('/store', [RegisterController::class, 'store'])->name('store');
            Route::get('/update/date', [RegisterController::class, 'update_date'])->name('update_date');
            Route::get('/admitcard/{id}', [RegisterController::class, 'admitcard'])->name('admitcard');
        });

        //Course
        Route::prefix('course')->name('course.')->group(function () {
            Route::get('/', [CourseController::class, 'index'])->name('index');
            Route::get('/create', [CourseController::class, 'create'])->name('create');
            Route::post('/store', [CourseController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [CourseController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [CourseController::class, 'update'])->name('update');
            Route::get('/show/{id}', [CourseController::class, 'show'])->name('show');
            Route::get('/delete/{id}', [CourseController::class, 'delete'])->name('delete');
            Route::get('/status-change/{id}', [CourseController::class, 'statusChange'])->name('statusChange');
            Route::get('/subject/show', [CourseController::class, 'subject_show'])->name('subject.show');
            Route::post('/course/sub/store', [CourseController::class, 'course_sub_store'])->name('sub.store');
            Route::post('/course/sub/store/{id}', [CourseController::class, 'course_subject_update'])->name('subject.update');
            Route::get('/course/sub/delete/{id}', [CourseController::class, 'course_subject_delete'])->name('subject.delete');
        });
        //Coursedetail
        Route::prefix('course-details')->name('coursedetail.')->group(function () {
            Route::get('/', [CourseDetailsController::class, 'index'])->name('index');
            Route::get('/create', [CourseDetailsController::class, 'create'])->name('create');
            Route::post('/store', [CourseDetailsController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [CourseDetailsController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [CourseDetailsController::class, 'update'])->name('update');
            Route::get('/delete/{id}', [CourseDetailsController::class, 'delete'])->name('delete');
            Route::get('/details/{id}', [CourseDetailsController::class, 'details'])->name('all_details');
            Route::get('/status-change/{id}', [CourseDetailsController::class, 'statusChange'])->name('statusChange');
        });
        //board
        Route::prefix('board')->name('board.')->group(function () {
            Route::get('/', [BoardController::class, 'index'])->name('index');
            Route::get('/create', [BoardController::class, 'create'])->name('create');
            Route::post('/store', [BoardController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [BoardController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [BoardController::class, 'update'])->name('update');
            Route::get('/delete/{id}', [BoardController::class, 'delete'])->name('delete');
        });
        //session
        Route::prefix('session')->name('session.')->group(function () {
            Route::get('/', [SessionController::class, 'index'])->name('index');
            Route::get('/create', [SessionController::class, 'create'])->name('create');
            Route::post('/store', [SessionController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [SessionController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [SessionController::class, 'update'])->name('update');
            Route::get('/delete/{id}', [SessionController::class, 'delete'])->name('delete');
            Route::get('/status-change/{id}', [SessionController::class, 'statusChange'])->name('statusChange');
        });
        //examination
        Route::prefix('examination')->name('examination.')->group(function () {
            Route::get('/', [ExaminationController::class, 'index'])->name('index');
            Route::get('/create', [ExaminationController::class, 'create'])->name('create');
            Route::post('/store', [ExaminationController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [ExaminationController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [ExaminationController::class, 'update'])->name('update');
            Route::get('/delete/{id}', [ExaminationController::class, 'delete'])->name('delete');
        });
        //service
        Route::prefix('service')->name('service.')->group(function () {
            Route::get('/', [ServiceController::class, 'index'])->name('index');
            Route::get('/create', [ServiceController::class, 'create'])->name('create');
            Route::post('/store', [ServiceController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [ServiceController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [ServiceController::class, 'update'])->name('update');
            Route::get('/delete/{id}', [ServiceController::class, 'delete'])->name('delete');
        });
        //counter
        Route::prefix('counter')->name('counter.')->group(function () {
            Route::get('/', [CounterController::class, 'index'])->name('index');
            Route::post('/store', [CounterController::class, 'store'])->name('store');
            Route::post('/update/{id}', [CounterController::class, 'update'])->name('update');
        });
        //achiveStudent
        Route::prefix('achiveStudent')->name('achiveStudent.')->group(function () {
            Route::get('/', [AchiveStudentController::class, 'index'])->name('index');
            Route::get('/create', [AchiveStudentController::class, 'create'])->name('create');
            Route::post('/store', [AchiveStudentController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [AchiveStudentController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [AchiveStudentController::class, 'update'])->name('update');
            Route::get('/delete/{id}', [AchiveStudentController::class, 'delete'])->name('delete');
        });
        //event
        Route::prefix('event')->name('event.')->group(function () {
            Route::get('/', [EventController::class, 'index'])->name('index');
            Route::get('/create', [EventController::class, 'create'])->name('create');
            Route::post('/store', [EventController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [EventController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [EventController::class, 'update'])->name('update');
            Route::get('/delete/{id}', [EventController::class, 'delete'])->name('delete');
        });
        //bannerSection
        Route::prefix('bannerSection')->name('bannerSection.')->group(function () {
            Route::get('/', [BannerSectionController::class, 'index'])->name('index');
            Route::get('/create', [BannerSectionController::class, 'create'])->name('create');
            Route::post('/store', [BannerSectionController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [BannerSectionController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [BannerSectionController::class, 'update'])->name('update');
            Route::get('/delete/{id}', [BannerSectionController::class, 'delete'])->name('delete');
        });
        //setting
        Route::prefix('setting')->name('setting.')->group(function () {
            Route::get('/', [SettingController::class, 'index'])->name('index');
            Route::get('/create', [SettingController::class, 'create'])->name('create');
            Route::post('/store', [SettingController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [SettingController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [SettingController::class, 'update'])->name('update');
            Route::get('/delete/{id}', [SettingController::class, 'delete'])->name('delete');
        });
        //result
        Route::prefix('result')->name('result.')->group(function () {
            Route::get('/', [ResultController::class, 'index'])->name('index');
            Route::get('/create', [ResultController::class, 'create'])->name('create');
            Route::post('/store', [ResultController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [ResultController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [ResultController::class, 'update'])->name('update');
            Route::get('/delete/{id}', [ResultController::class, 'delete'])->name('delete');
            Route::get('/resultshow/{id}', [ResultController::class, 'resultshow'])->name('resultshow');
            Route::get('/batch/search', [ResultController::class, 'batch_search'])->name('batch.search');
        });
        //BranchBallance
        Route::prefix('branchbalance')->name('branchbalance.')->group(function () {
            Route::get('/', [BranchBallanceController::class, 'index'])->name('index');
            Route::get('/create', [BranchBallanceController::class, 'create'])->name('create');
            Route::post('/store', [BranchBallanceController::class, 'store'])->name('store');
            Route::get('/status/{id}', [BranchBallanceController::class, 'status'])->name('status');
            Route::get('/charge', [BranchBallanceController::class, 'charge'])->name('charge');
            Route::get('/courses/fees', [BranchBallanceController::class, 'courses_fees'])->name('courses.fees');
            Route::get('/recharge-message', [BranchBallanceController::class, 'message_rechrge'])->name('recharge.message');
            Route::post('/message-rechrge/store', [BranchBallanceController::class, 'message_rechrge_store'])->name('message_rechrge.store');
            Route::get('/message-rechrge/history', [BranchBallanceController::class, 'message_re_history'])->name('message.recharge.history');
            Route::get('/message-rechrge/status/{id}', [BranchBallanceController::class, 'message_recharge_status'])->name('message.recharge.status');
            Route::post('/message-admin/store', [BranchBallanceController::class, 'message_rechrge_admin'])->name('message_rechrge.admin');
        });
        //certificate
        Route::prefix('certificate')->name('certificate.')->group(function () {
            Route::get('/', [CertificateController::class, 'index'])->name('index');
            Route::get('/create', [CertificateController::class, 'create'])->name('create');
            Route::post('/store', [CertificateController::class, 'store'])->name('store');
            Route::get('/status/{id}', [CertificateController::class, 'status'])->name('status');
            Route::get('/charge', [CertificateController::class, 'charge'])->name('charge');
            Route::get('/branchSearch', [CertificateController::class, 'branch_search'])->name('branch.search');
            Route::get('/branch/Student', [CertificateController::class, 'branch_Student'])->name('branch.student');
            Route::get('/download', [CertificateController::class, 'download'])->name('download');
            Route::get('/setting', [CertificateController::class, 'certificate_setting'])->name('setting');
            Route::post('/setting_update', [CertificateController::class, 'setting_update'])->name('setting.update');
            Route::get('search', [CertificateController::class, 'certificate_search'])->name('search');
            Route::get('pagination', [CertificateController::class, 'certificate_pagination'])->name('pagination');
        });



        //message
        Route::prefix('message')->name('message.')->group(function () {
            Route::get('/', [MessageController::class, 'index'])->name('index');
            Route::get('/quick', [MessageController::class, 'quick'])->name('quick');
            Route::post('/quick/send', [MessageController::class, 'quick_send'])->name('quick.send');
            Route::get('/birthday', [MessageController::class, 'birthday'])->name('birthday');
            Route::post('/birthday/send', [MessageController::class, 'birthday_send'])->name('birthday.send');
            Route::get('/batch', [MessageController::class, 'batch'])->name('batch');
            Route::post('/batch/send', [MessageController::class, 'batch_send'])->name('batch.send');
            Route::get('/student_select', [MessageController::class, 'student_select'])->name('student.select');
            //Route::get('/group',[MessageController::class,'group'])->name('group');
            Route::post('/group/send', [MessageController::class, 'group_send'])->name('group.send');
        });
        //message group
        Route::prefix('message-group')->name('smsgroup.')->group(function () {
            Route::get('/', [SmsGroupController::class, 'index'])->name('index');
            Route::post('/store', [SmsGroupController::class, 'store'])->name('store');
            Route::post('/update/{id}', [SmsGroupController::class, 'update'])->name('update');
            Route::get('/delete/{id}', [SmsGroupController::class, 'delete'])->name('delete');
            Route::get('/show/{id}', [SmsGroupController::class, 'show'])->name('show');
            Route::post('/member/store', [SmsGroupController::class, 'member_store'])->name('member.store');
            Route::get('/member/delete/{id}', [SmsGroupController::class, 'member_delete'])->name('member.delete');
        });
        //nearBy-Request
        Route::prefix('nearBy-Request')->name('nearbyRequest.')->group(function () {
            Route::get('/', [NearByRequestController::class, 'index'])->name('index');
            Route::get('/delete/{id}', [NearByRequestController::class, 'delete'])->name('delete');
        });
    });











});
