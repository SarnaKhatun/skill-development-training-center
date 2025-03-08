<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Admin\DistrictController;
use App\Http\Controllers\Admin\UpazillaController;
use App\Http\Controllers\Frontend\LoginController;
use App\Http\Controllers\Frontend\StudentController;
use App\Http\Controllers\Frontend\AdmissionController;
use App\Http\Controllers\Frontend\NearByRequestController;
use App\Http\Controllers\Admin\WrittenExamController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/',[FrontendController::class,'index'])->name('home');
Route::get('/gallary',[FrontendController::class,'gallaryPage'])->name('gallaryPage');
Route::get('/courses',[FrontendController::class,'coursePage'])->name('coursePage');
Route::get('/course-details/{slug}',[FrontendController::class,'courseDetails'])->name('course.Details');
Route::get('/events',[FrontendController::class,'eventPage'])->name('eventPage');
Route::get('/event-details/{slug}',[FrontendController::class,'eventDetails'])->name('event.Details');
Route::get('/contact',[FrontendController::class,'contactPage'])->name('contactPage');
Route::get('/about-us',[FrontendController::class,'aboutPage'])->name('aboutPage');
Route::get('/certificate-verify/{roll}',[FrontendController::class,'certificate_verify'])->name('student_info');
Route::get('/result/download',[FrontendController::class,'result_download'])->name('result.download');

//cart
Route::get('/cart',[CartController::class,'index'])->name('cart.index');
Route::get('/addToCart',[CartController::class,'addToCart'])->name('addToCart');
Route::get('/cartCount',[CartController::class,'cartCount'])->name('cartCount');
Route::get('/cart/itemremove/{slug}',[CartController::class,'itemremove'])->name('cart.item.remove');


//admission
Route::get('/center/registration-form',[AdmissionController::class,'create'])->name('center.create');
Route::post('/center-submit',[AdmissionController::class,'center_submit'])->name('center.submit');
Route::get('/get-district/ajax/{division_id}', [DistrictController::class, 'getdistrict'])->name('district.ajax');
Route::get('/get-upazilla/ajax/{district_id}', [UpazillaController::class, 'getupazilla'])->name('upazilla.ajax');
Route::post('/nearby/store',[NearByRequestController::class,'nearby_store'])->name('nearby.store');


Route::post('/login',[LoginController::class,'store'])->name('login.store');


Route::middleware(['auth:student'])->group(function (){
    Route::get('/dashboard',[StudentController::class,'dashboard'])->name('dashboard');
    Route::get('/profile',[StudentController::class,'profile'])->name('profile');
    Route::get('/course/{header_title}',[StudentController::class,'course'])->name('course');
    Route::post('/logout',[StudentController::class,'logout'])->name('logout');
    Route::get('/admitCard',[StudentController::class,'admitcard'])->name('admitcard');
    Route::get('/resultCard',[StudentController::class,'resultCard'])->name('resultCard');
    Route::get('/change-password',[StudentController::class,'Password_page'])->name('password.page');
    Route::post('/update-password/{id}',[StudentController::class,'updatePassword'])->name('update.password');
    Route::get('/payment-info',[StudentController::class,'student_payment'])->name('student.payment');
    Route::get('/all-message',[StudentController::class,'all_message'])->name('all.message');
    Route::get('/exam-list',[StudentController::class,'examList'])->name('written-exam.list');
    Route::get('/result-list',[StudentController::class,'resultList'])->name('exam-result.list');
    Route::get('/exam-view/{id}',[StudentController::class,'examShow'])->name('written-exam.show');
    Route::get('/mcq-view/{id}',[StudentController::class,'examMcqShow'])->name('mcq-exam.show');
    Route::post('/mcq-submit', [StudentController::class, 'submit'])->name('mcq.submit');
    Route::get('/mcq-result/{mcq_exam_id}', [StudentController::class, 'result'])->name('mcq.result');


});


