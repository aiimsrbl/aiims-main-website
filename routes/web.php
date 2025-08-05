<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['visitor'])->group(function(){
Route::get('page/{slug}',[Web\StaticPageController::class,'index'])->name('web.static_page');

Route::get('/', [Web\HomeController::class,'index']);

Route::view('/contacts','web.pages.contact-us')->name('web.contact-us');
Route::post('/contacts',[Web\ContactUsController::class,'storeInquiry'])->name('web.contact-us.post');

/*Route::view('event-and-workshop','web.pages.event-and-workshop')->name('web.event-and-workshop');*/
Route::get('event-and-workshop',[Web\HomeController::class,'workshops'])->name('web.event-and-workshop');
Route::view('student-result','web.pages.student-result')->name('web.student-result');
Route::view('nursing-examination-result','web.pages.nursing-examination-result')->name('web.nursing-examination-result');

Route::view('research','web.pages.research')->name('web.research');
Route::view('anti-ragging','web.pages.anti-ragging')->name('web.anti-ragging');
Route::view('addmission','web.pages.addmission')->name('web.addmission');

Route::view('/dashboard-login','web.auth.login')->name('login');

// Tenders
    Route::get('/{type}/tenders',[Web\TenderController::class,'getTenders'])->name('web.tenders');
    Route::get('/tender-file-download/{tender}',[Web\TenderController::class,'downloadTender'])->name('web.tender.download');
    Route::get('/corrigendum-file-download/{corrigendum}',[Web\TenderController::class,'downloadCorrigendum'])->name('web.corrigendum.download');
// End Tenders

// Start Quotation
    Route::get('/{type}/quotation',[Web\QuotationController::class,'listing'])->name('web.quotation');
    Route::get('/quotation-file-download/{quotation}',[Web\QuotationController::class,'downloadQuotation'])->name('web.quotation.download');
// End Quotation

// Start Pac
    Route::get('/{type}/pac',[Web\PACController::class,'listing'])->name('web.pac');
    Route::get('/pac-file-download/{pac}',[Web\PACController::class,'downloadPac'])->name('web.pac.download');
// End Pac

// Start news
    Route::get('/news-circular',[Web\NewsController::class,'index'])->name('web.news');
    Route::get('/news-download/{news}',[Web\NewsController::class,'downloadNews'])->name('web.news.download');
// End news

// Start office order
    Route::get('/current-office-order',[Web\OfficeOrderController::class,'office_orders'])->name('web.office_order');
    
    Route::get('/office-order-download/{obj}',[Web\OfficeOrderController::class,'downloadOfficeOrder'])->name('web.office_order.download');
// End office order
    
Route::get('/official-download',[Web\OfficeOrderController::class,'official_downloads'])->name('web.pages.official-download');

Route::view('rti-disclosure','web.pages.rti-disclouser')->name('web.rti-disclosure');
Route::view('nirf','web.pages.nirf')->name('web.nirf');

Route::view('courses','web.pages.courses')->name('web.courses');
Route::view('about-us','web.pages.history')->name('web.about-us');
Route::view('logo','web.pages.logo')->name('web.logo');
Route::view('grievance','web.pages.grievance')->name('web.grievance');
Route::view('aiims-acts','web.pages.aiims-acts')->name('web.aiims-acts');
Route::view('president','web.pages.president')->name('web.president');
Route::view('hfwm','web.pages.hfwm')->name('web.hfwm');
Route::view('executive-director','web.pages.executive-director')->name('web.executive-director');

Route::view('examination-controller','web.pages.assistant-examination-controller')->name('web.examination-controller');
Route::view('deputy-director','web.pages.deputy-director')->name('web.deputy-director');
Route::view('financial-advisor','web.pages.financial-advisor')->name('web.financial-advisor');
Route::view('organizational-structure','web.pages.organizational-structure')->name('web.organizational-structure');

Route::get('annual-report',[Web\AnnualReportController::class,'listing'])->name('web.annual-report');
Route::get('/annual-report/{obj}',[Web\AnnualReportController::class,'downloadFile'])->name('web.annual.report.download');
Route::get('addmission',[Web\AddmissionProcedureController::class,'listing'])->name('web.addmission');
Route::get('/addmission/{obj}',[Web\AddmissionProcedureController::class,'downloadFile'])->name('web.addmission.download');
Route::view('senior-administrative-officer','web.pages.senior-administrative-officer')->name('web.senior-administrative-officer');

Route::get('employee-list',[Web\EmployeeController::class,'index'])->name('web.employee-list');

Route::get('telephone-directory',[Web\HomeController::class,'telephoneDirectory'])->name('web.tp_directory');

Route::view('salary-structure','web.pages.salary-structure')->name('web.salary-structure');

// Start department

Route::get('departments',[Web\DepartmentController::class,'departmentListing'])->name('web.departments');

Route::get('department-details/{viewObj?}',[Web\DepartmentController::class,'departmentDetail'])->name('web.department-details');

Route::get('department/faculty/detail/{facultyId}',[Web\DepartmentController::class,'departmentFacultyDetail'])->name('web.department.faculty_detail');

    // End department

    
    Route::get('gallery/{eventId?}',[Web\HomeController::class,'eventGallery'])->name('web.event.gallery');

    Route::view('/reset-password','web.auth.reset_password')->name('web.reset.password');
    Route::post('/reset-password',[Web\HomeController::class,'forgotPasswordEmail'])->name('web.reset.password.email.post');
    Route::post('/change-password',[Web\HomeController::class,'adminPasswordChange'])->name('web.reset.password.post');

    Route::view('/telemedicine','web.pages.telemedicine')->name('web.telemedicine');
     Route::view('/bmw-services','web.pages.bmwservices')->name('web.bmwservices');

    Route::view('/drug-addiction-center','web.pages.drug-addiction-center')->name('web.drug-addiction-center');

    Route::view('/blood-bank-helpline','web.pages.blood-bank-helpline')->name('web.blood-bank-helpline');

    Route::view('/patient-reports','web.pages.patient-reports')->name('web.patient-reports');
Route::view('/terms-of-conditions','web.pages.terms-of-conditions')->name('web.terms-of-conditions');
Route::view('/privacy-policy','web.pages.privacy-policy')->name('web.privacy-policy');
    Route::view('/trauma-and-amergency-helpline','web.pages.trauma-and-amergency-helpline')->name('web.trauma-and-amergency-helpline');

    Route::view('/stroke-care-unit-helpline','web.pages.stroke-care-unit-helpline')->name('web.stroke-care-unit-helpline');

    Route::view('/body-donation','web.pages.body-donation')->name('web.body-donation');

    Route::view('/adverse-drug-reaction-helpline','web.pages.adverse-drug-reaction-helpline')->name('web.adverse-drug-reaction-helpline');

    Route::get('recruitments',[Web\RecruitmentController::class,'index'])->name('web.recruitments');

    Route::get('recruitments\download\{obj}',[Web\RecruitmentController::class,'download'])->name('web.recruitment.download');
    
    Route::get('recruitments\other_download\{obj}',[Web\RecruitmentController::class,'downloadOtherInfo'])->name('web.recruitment.other.download');
   
});