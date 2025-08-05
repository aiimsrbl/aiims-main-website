<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
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

// Route::get('/', function () {
//     return view('web.auth.login');
// })->name('login');

Route::prefix('admin')->name('admin.')->middleware(['auth','prevent-back-history'])->group(function(){

    Route::get('dashboard',[Admin\DashboardController::class,'index'])->name('dashboard');

    Route::prefix('user')->name('user.')->group(function(){

        Route::get('logout',[Admin\UserController::class,'logout'])->name('logout');
        
        Route::get('profile',[Admin\UserController::class,'userProfile'])->name('profile')->middleware('permission:settings-users-view');

        Route::post('profile',[Admin\UserController::class,'updateMyProfile'])->name('profile');
        
        Route::get('listing',[Admin\UserController::class,'listing'])->name('listing')->middleware('permission:settings-users-view');
        
        Route::get('add',[Admin\UserController::class,'addNewUser'])->name('add')->middleware('permission:settings-users-add');
        
        Route::post('add',[Admin\UserController::class,'addNewUser'])->name('add.post')->middleware('permission:settings-users-add');
        
        Route::get('delete/{user}',[Admin\UserController::class,'delete'])->name('delete')->middleware('permission:settings-users-del');
        
        Route::get('edit/{user}',[Admin\UserController::class,'editUser'])->name('edit.form')->middleware('permission:settings-users-edit');
        
        Route::put('edit/{user}',[Admin\UserController::class,'editUser'])->name('edit.post')->middleware('permission:settings-users-edit');
    });

    Route::prefix('role')->name('role.')->group(function(){
        Route::get('add',[Admin\RoleController::class,'create'])->name('add.form')->middleware('permission:settings-roles-add');
        
        Route::post('add',[Admin\RoleController::class,'store'])->name('add.submit')->middleware('permission:settings-roles-add');

        Route::get('listing',[Admin\RoleController::class,'index'])->name('listing')->middleware('permission:settings-roles-view')->middleware('permission:settings-roles-view');

        Route::get('delete/{role}',[Admin\RoleController::class,'destroy'])->name('destroy')->where(['role'=>'[0-9]+'])->middleware('permission:settings-roles-del');

        Route::get('edit/{role}',[Admin\RoleController::class,'edit'])->name('edit.form')->where(['role'=>'[0-9]+'])->middleware('permission:settings-roles-edit');

        Route::post('edit/{role}',[Admin\RoleController::class,'update'])->name('edit.submit')->where(['role'=>'[0-9]+'])->middleware('permission:settings-roles-edit');
    });

 Route::prefix('result')->name('result.')->group(function(){
        
        Route::get('listing',[Admin\ResultsController::class,'index'])->name('listing')->middleware('permission:frontend-result-view');
        
        Route::get('listing/ajax',[Admin\ResultsController::class,'getResult'])->name('listing.ajax')->middleware('permission:frontend-result-view');

        Route::get('add',[Admin\ResultsController::class,'create'])->name('create')->middleware('permission:frontend-result-add');
        Route::post('add',[Admin\ResultsController::class,'store'])->name('create.post')->middleware('permission:frontend-result-add');
        Route::get('edit/{result}',[Admin\ResultsController::class,'edit'])->name('edit')->where(['result'=>'[0-9]+'])->middleware('permission:frontend-result-edit');
        Route::post('edit/{result}',[Admin\ResultsController::class,'update'])->name('edit.post')->where(['result'=>'[0-9]+'])->middleware('permission:frontend-result-edit');
        Route::get('view/{result}',[Admin\ResultsController::class,'show'])->name('view')->where(['result'=>'[0-9]+'])->middleware('permission:frontend-result-view');
        Route::get('delete/{result}',[Admin\ResultsController::class,'destroy'])->name('destroy')->where(['result'=>'[0-9]+'])->middleware('permission:frontend-result-del');
    });



    Route::prefix('tender')->name('tender.')->group(function(){
        
        Route::get('listing',[Admin\TenderController::class,'index'])->name('listing')->middleware('permission:frontend-tender-view');
        
        Route::get('listing/ajax',[Admin\TenderController::class,'getTender'])->name('listing.ajax')->middleware('permission:frontend-tender-view');

        Route::get('add',[Admin\TenderController::class,'create'])->name('create')->middleware('permission:frontend-tender-add');
        Route::post('add',[Admin\TenderController::class,'store'])->name('create.post')->middleware('permission:frontend-tender-add');
        Route::get('edit/{tender}',[Admin\TenderController::class,'edit'])->name('edit')->where(['tender'=>'[0-9]+'])->middleware('permission:frontend-tender-edit');
        Route::post('edit/{tender}',[Admin\TenderController::class,'update'])->name('edit.post')->where(['tender'=>'[0-9]+'])->middleware('permission:frontend-tender-edit');
        Route::get('view/{tender}',[Admin\TenderController::class,'show'])->name('view')->where(['tender'=>'[0-9]+'])->middleware('permission:frontend-tender-view');
        Route::get('delete/{tender}',[Admin\TenderController::class,'destroy'])->name('destroy')->where(['tender'=>'[0-9]+'])->middleware('permission:frontend-tender-del');
    });

    Route::prefix('corrigendum')->name('corrigendum.')->group(function(){
        Route::get('add/{tender}',[Admin\CorrigendumController::class,'create'])->name('create')->middleware('permission:frontend-tender-add');
        Route::post('add/{tender}',[Admin\CorrigendumController::class,'store'])->name('create.post')->middleware('permission:frontend-tender-add');
        Route::get('edit/{corrigendum}',[Admin\CorrigendumController::class,'edit'])->name('edit')->middleware('permission:frontend-tender-edit');
        Route::post('edit/{corrigendum}',[Admin\CorrigendumController::class,'update'])->name('post')->middleware('permission:frontend-tender-edit');
        Route::get('delete/{corrigendum}',[Admin\CorrigendumController::class,'destroy'])->name('destroy')->where(['corrigendum'=>'[0-9]+'])->middleware('permission:frontend-tender-del');
        Route::get('view/{corrigendum}',[Admin\CorrigendumController::class,'show'])->name('view')->where(['corrigendum'=>'[0-9]+'])->middleware('permission:frontend-tender-view');

        Route::get('listing/ajax',[Admin\CorrigendumController::class,'getCoggigendum'])->name('listing.ajax')->middleware('permission:frontend-tender-view');
    });

    Route::prefix('quotation')->name('quotation.')->group(function(){

        Route::get('add',[Admin\QuotationController::class,'create'])->name('add')->middleware(['permission'=>'permission:frontend-quotation-add']);

        Route::post('add',[Admin\QuotationController::class,'store'])->name('add.submit')->middleware(['permission'=>'permission:frontend-quotation-add']);

        Route::get('listing',[Admin\QuotationController::class,'index'])->name('listing')->middleware(['permission'=>'permission:frontend-quotation-view']);

        Route::get('edit/{quotation}',[Admin\QuotationController::class,'edit'])->name('edit')->where(['quotation'=>'[0-9]+'])->middleware('permission:frontend-quotation-edit');

        Route::post('edit/{quotation}',[Admin\QuotationController::class,'update'])->name('post')->middleware('permission:frontend-quotation-edit');
        
        Route::get('listing',[Admin\QuotationController::class,'index'])->name('listing')->middleware('permission:frontend-quotation-view');

        Route::get('listing/ajax',[Admin\QuotationController::class,'getQuotationAjax'])->name('listing.ajax')->middleware('permission:frontend-quotation-view');

        Route::get('view/{quotation}',[Admin\QuotationController::class,'show'])->name('view')->where(['quotation'=>'[0-9]+'])->middleware('permission:frontend-quotation-view');

        Route::get('delete/{quotation}',[Admin\QuotationController::class,'destroy'])->name('destroy')->where(['quotation'=>'[0-9]+'])->middleware('permission:frontend-tender-del');

    });

    Route::prefix('contacts')->name('contacts.')->group(function(){
        Route::get('inquiries/listing',[Admin\ContactUsController::class,'index'])->name('listing')->middleware(['permission'=>'permission:frontend-contacts-inquiries-view']);
        
        Route::get('inquiries',[Admin\ContactUsController::class,'inquiriesAjax'])->name('listing.ajax')->middleware(['permission'=>'permission:frontend-contacts-inquiries-view']);
    });

    Route::prefix('news')->name('news.')->group(function(){

        Route::get('listing',[Admin\NewsController::class,'index'])->name('listing')->middleware(['permission'=>'permission:frontend-news-view']);

        Route::get('listing\ajax',[Admin\NewsController::class,'getNewsAjax'])->name('listing.ajax')->middleware(['permission'=>'permission:frontend-news-view']);

        Route::get('add',[Admin\NewsController::class,'create'])->name('add')->middleware(['permission'=>'permission:frontend-news-add']);

        Route::post('add',[Admin\NewsController::class,'store'])->name('add.post')->middleware(['permission'=>'permission:frontend-news-add']);

        Route::get('delete/{news}',[Admin\NewsController::class,'destroy'])->name('destroy')->where(['news'=>'[0-9]+'])->middleware('permission:frontend-news-del');

        Route::get('edit/{news}',[Admin\NewsController::class,'edit'])->name('edit')->middleware('permission:frontend-news-edit');

        Route::post('edit/{news}',[Admin\NewsController::class,'update'])->name('edit.post')->middleware('permission:frontend-news-edit');

        Route::get('view/{news}',[Admin\NewsController::class,'show'])->name('view')->where(['news'=>'[0-9]+'])->middleware('permission:frontend-news-view');
    });
        Route::prefix('nirf')->name('nirf.')->group(function(){

        Route::get('listing',[Admin\NirfController::class,'index'])->name('listing')->middleware(['permission'=>'permission:frontend-nirf-view']);

        Route::get('listing\ajax',[Admin\NirfController::class,'getNirfAjax'])->name('listing.ajax')->middleware(['permission'=>'permission:frontend-nirf-view']);

        Route::get('add',[Admin\NirfController::class,'create'])->name('add')->middleware(['permission'=>'permission:frontend-nirf-add']);

        Route::post('add',[Admin\NirfController::class,'store'])->name('add.post')->middleware(['permission'=>'permission:frontend-nirf-add']);

        Route::get('delete/{nirf}',[Admin\NirfController::class,'destroy'])->name('destroy')->where(['nirf'=>'[0-9]+'])->middleware('permission:frontend-nirf-del');

        Route::get('edit/{nirf}',[Admin\NirfController::class,'edit'])->name('edit')->middleware('permission:frontend-nirf-edit');

        Route::post('edit/{nirf}',[Admin\NirfController::class,'update'])->name('edit.post')->middleware('permission:frontend-nirf-edit');

        Route::get('view/{nirf}',[Admin\NirfController::class,'show'])->name('view')->where(['nirf'=>'[0-9]+'])->middleware('permission:frontend-nirf-view');
    });
     
      Route::prefix('slider')->name('slider.')->group(function(){

        Route::get('listing',[Admin\SliderController::class,'index'])->name('listing')->middleware(['permission'=>'permission:frontend-slider-view']);

        Route::get('listing\ajax',[Admin\SliderController::class,'getNirfAjax'])->name('listing.ajax')->middleware(['permission'=>'permission:frontend-slider-view']);

        Route::get('add',[Admin\SliderController::class,'create'])->name('add')->middleware(['permission'=>'permission:frontend-slider-add']);

        Route::post('add',[Admin\SliderController::class,'store'])->name('add.post')->middleware(['permission'=>'permission:frontend-slider-add']);

        Route::get('delete/{slider}',[Admin\SliderController::class,'destroy'])->name('destroy')->where(['slider'=>'[0-9]+'])->middleware('permission:frontend-slider-del');

        Route::get('edit/{slider}',[Admin\SliderController::class,'edit'])->name('edit')->middleware('permission:frontend-slider-edit');

        Route::post('edit/{slider}',[Admin\SliderController::class,'update'])->name('edit.post')->middleware('permission:frontend-slider-edit');

        Route::get('view/{slider}',[Admin\SliderController::class,'show'])->name('view')->where(['slider'=>'[0-9]+'])->middleware('permission:frontend-slider-view');
    });
     
     Route::prefix('administration')->name('administration.')->group(function(){

        Route::get('listing',[Admin\AdministrationController::class,'index'])->name('listing')->middleware(['permission'=>'permission:frontend-administration-view']);

        Route::get('listing\ajax',[Admin\AdministrationController::class,'getNirfAjax'])->name('listing.ajax')->middleware(['permission'=>'permission:frontend-administration-view']);

        Route::get('add',[Admin\AdministrationController::class,'create'])->name('add')->middleware(['permission'=>'permission:frontend-administration-add']);

        Route::post('add',[Admin\AdministrationController::class,'store'])->name('add.post')->middleware(['permission'=>'permission:frontend-administration-add']);

        Route::get('delete/{administration}',[Admin\AdministrationController::class,'destroy'])->name('destroy')->where(['administration'=>'[0-9]+'])->middleware('permission:frontend-administration-del');

        Route::get('edit/{administration}',[Admin\AdministrationController::class,'edit'])->name('edit')->middleware('permission:frontend-administration-edit');

        Route::post('edit/{administration}',[Admin\AdministrationController::class,'update'])->name('edit.post')->middleware('permission:frontend-administration-edit');

        Route::get('view/{administration}',[Admin\AdministrationController::class,'show'])->name('view')->where(['administration'=>'[0-9]+'])->middleware('permission:frontend-administration-view');
    });
     Route::prefix('page')->name('page.')->group(function(){

        Route::get('listing',[Admin\PageController::class,'index'])->name('listing')->middleware(['permission'=>'permission:frontend-page-view']);

        Route::get('listing\ajax',[Admin\PageController::class,'getNirfAjax'])->name('listing.ajax')->middleware(['permission'=>'permission:frontend-page-view']);

        Route::get('add',[Admin\PageController::class,'create'])->name('add')->middleware(['permission'=>'permission:frontend-page-add']);

        Route::post('add',[Admin\PageController::class,'store'])->name('add.post')->middleware(['permission'=>'permission:frontend-page-add']);

        Route::get('delete/{page}',[Admin\PageController::class,'destroy'])->name('destroy')->where(['page'=>'[0-9]+'])->middleware('permission:frontend-page-del');

        Route::get('edit/{page}',[Admin\PageController::class,'edit'])->name('edit')->middleware('permission:frontend-page-edit');

        Route::post('edit/{page}',[Admin\PageController::class,'update'])->name('edit.post')->middleware('permission:frontend-page-edit');

        Route::get('view/{page}',[Admin\PageController::class,'show'])->name('view')->where(['page'=>'[0-9]+'])->middleware('permission:frontend-page-view');
    });

    Route::prefix('office-orders')->name('office_order.')->group(function(){

        Route::get('listing',[Admin\OfficeOrderController::class,'index'])->name('listing')->middleware(['permission'=>'permission:frontend-office-orders-view']);

        Route::get('listing\ajax',[Admin\OfficeOrderController::class,'getListAjax'])->name('listing.ajax')->middleware(['permission'=>'permission:frontend-office-orders-view']);

        Route::get('add',[Admin\OfficeOrderController::class,'create'])->name('add')->middleware(['permission'=>'permission:frontend-office-orders-add']);

        Route::post('add',[Admin\OfficeOrderController::class,'store'])->name('add.post')->middleware(['permission'=>'permission:frontend-office-orders-add']);

        Route::get('delete/{officeOrder}',[Admin\OfficeOrderController::class,'destroy'])->name('destroy')->where(['officeOrder'=>'[0-9]+'])->middleware('permission:frontend-office-orders-del');

        Route::get('edit/{officeOrder}',[Admin\OfficeOrderController::class,'edit'])->name('edit')->middleware('permission:frontend-office-orders-edit');

        Route::post('edit/{officeOrder}',[Admin\OfficeOrderController::class,'update'])->name('edit.post')->middleware('permission:frontend-office-orders-edit');

        Route::get('view/{officeOrder}',[Admin\OfficeOrderController::class,'show'])->name('view')->where(['officeOrder'=>'[0-9]+'])->middleware('permission:frontend-office-orders-view');
    });

    Route::prefix('pac')->name('pac.')->group(function(){

        Route::get('add',[Admin\PACController::class,'create'])->name('add')->middleware(['permission'=>'permission:frontend-pac-add']);

        Route::post('add',[Admin\PACController::class,'store'])->name('add.submit')->middleware(['permission'=>'permission:frontend-pac-add']);

        Route::get('listing',[Admin\PACController::class,'index'])->name('listing')->middleware(['permission'=>'permission:frontend-pac-view']);

        Route::get('edit/{pac}',[Admin\PACController::class,'edit'])->name('edit')->where(['pac'=>'[0-9]+'])->middleware('permission:frontend-pac-edit');

        Route::post('edit/{pac}',[Admin\PACController::class,'update'])->name('post')->middleware('permission:frontend-pac-edit');
        
        Route::get('listing',[Admin\PACController::class,'index'])->name('listing')->middleware('permission:frontend-pac-view');

        Route::get('listing/ajax',[Admin\PACController::class,'getPACsAjax'])->name('listing.ajax')->middleware('permission:frontend-pac-view');

        Route::get('view/{pac}',[Admin\PACController::class,'show'])->name('view')->where(['pac'=>'[0-9]+'])->middleware('permission:frontend-pac-view');

        Route::get('delete/{pac}',[Admin\PACController::class,'destroy'])->name('destroy')->where(['pac'=>'[0-9]+'])->middleware('permission:frontend-pac-del');

    });

    Route::prefix('telephone-directory')->name('tp_directory.')->group(function(){

        Route::get('add',[Admin\TelephoneDirectoryController::class,'create'])->name('add')->middleware(['permission'=>'permission:telephone-directory-add']);

        Route::post('add',[Admin\TelephoneDirectoryController::class,'store'])->name('add.post')->middleware(['permission'=>'permission:telephone-directory-add']);

        Route::get('listing',[Admin\TelephoneDirectoryController::class,'index'])->name('listing')->middleware(['permission'=>'permission:telephone-directory-view']);

        Route::get('listing/ajax',[Admin\TelephoneDirectoryController::class,'getListingAjax'])->name('listing.ajax')->middleware('permission:telephone-directory-view');

        Route::get('edit/{telephoneDirectory}',[Admin\TelephoneDirectoryController::class,'edit'])->name('edit')->where(['telephoneDirectory'=>'[0-9]+'])->middleware('permission:telephone-directory-edit');

        Route::post('edit/{telephoneDirectory}',[Admin\TelephoneDirectoryController::class,'update'])->name('edit.post')->middleware('permission:telephone-directory-edit');
        
        Route::get('listing',[Admin\TelephoneDirectoryController::class,'index'])->name('listing')->middleware('permission:telephone-directory-view');

        Route::get('view/{telephoneDirectory}',[Admin\TelephoneDirectoryController::class,'show'])->name('view')->where(['telephoneDirectory'=>'[0-9]+'])->middleware('permission:telephone-directory-view');

        Route::get('delete/{telephoneDirectory}',[Admin\TelephoneDirectoryController::class,'destroy'])->name('destroy')->where(['telephoneDirectory'=>'[0-9]+'])->middleware('permission:telephone-directory-del');
    });

    Route::prefix('employee')->name('employee.')->group(function(){

        Route::get('add',[Admin\EmployeeController::class,'create'])->name('add')->middleware(['permission'=>'permission:admin.employees-add']);

        Route::post('add',[Admin\EmployeeController::class,'store'])->name('add.post')->middleware(['permission'=>'permission:admin.employees-add']);

        Route::get('listing',[Admin\EmployeeController::class,'index'])->name('listing')->middleware(['permission'=>'permission:admin.employees-view']);

        Route::get('listing/ajax',[Admin\EmployeeController::class,'getListingAjax'])->name('listing.ajax')->middleware('permission:admin.employees-view');

        Route::get('edit/{employee}',[Admin\EmployeeController::class,'edit'])->name('edit')->where(['employee'=>'[0-9]+'])->middleware('permission:admin.employees-edit');

        Route::post('edit/{employee}',[Admin\EmployeeController::class,'update'])->name('edit.post')->middleware('permission:admin.employees-edit');
        
        Route::get('listing',[Admin\EmployeeController::class,'index'])->name('listing')->middleware('permission:admin.employees-view');

        Route::get('view/{employee}',[Admin\EmployeeController::class,'show'])->name('view')->where(['employee'=>'[0-9]+'])->middleware('permission:admin.employees-view');

        Route::get('delete/{employee}',[Admin\EmployeeController::class,'destroy'])->name('destroy')->where(['employee'=>'[0-9]+'])->middleware('permission:admin.employees-del');

    });

    Route::prefix('department')->name('department.')->group(function(){
        
        Route::get('listing',[Admin\DepartmentController::class,'index'])->name('listing')->middleware(['permission'=>'permission:department.manage-view']);
        
        Route::get('listing_ajax',[Admin\DepartmentController::class,'getListingAjax'])->name('listing.ajax')->middleware(['permission'=>'permission:department.manage-view']);

        Route::get('manage-data/{department}',[Admin\DepartmentController::class,'manageData'])->name('manage.data')->middleware(['permission'=>'permission:department.manage-view']);

        Route::post('update-data/{department}',[Admin\DepartmentController::class,'updateData'])->name('update.data')->middleware(['permission'=>'permission:department.manage-edit']);
    });

    Route::prefix('department/faculty')->name('department.faculty.')->group(function(){
        Route::get('listing',[Admin\DepartmentFacultyController::class,'index'])->name('listing')->middleware(['permission'=>'permission:department.manage-view']);   

        Route::get('listing-ajax',
        [Admin\DepartmentFacultyController::class,'listingAjax'])->name('listing.ajax')->middleware(['permission'=>'permission:department.manage-view']); 
        
        Route::get('add',[Admin\DepartmentFacultyController::class,'create'])->name('add')->middleware(['permission'=>'permission:department.manage-add']);

        Route::post('add',[Admin\DepartmentFacultyController::class,'store'])->name('add.post')->middleware(['permission'=>'permission:department.manage-add']);

        Route::get('edit/{editObj}',[Admin\DepartmentFacultyController::class,'edit'])->name('edit')->middleware(['permission'=>'permission:department.manage-edit']);

        Route::post('edit/{editObj}',[Admin\DepartmentFacultyController::class,'update'])->name('edit.post')->middleware(['permission'=>'permission:department.manage-edit']);

        Route::get('delete/{deleteObj}',[Admin\DepartmentFacultyController::class,'destroy'])->name('delete')->middleware(['permission'=>'permission:department.manage-del']);

        Route::get('view/{viewObj}',[Admin\DepartmentFacultyController::class,'show'])->name('view')->middleware(['permission'=>'permission:department.manage-view']);
    });

    Route::prefix('department/activity')->name('department.activity.')->group(function(){
        Route::get('add',[Admin\DepartmentActivityController::class,'create'])->name('add')->middleware(['permission'=>'permission:department.manage-add']);
        
        Route::post('add',[Admin\DepartmentActivityController::class,'store'])->name('add.submit')->middleware(['permission'=>'permission:department.manage-add']);

        Route::get('view/{viewObj}',[Admin\DepartmentActivityController::class,'show'])->name('view')->middleware(['permission'=>'permission:department.manage-view']);

        Route::get('edit/{editObj}',[Admin\DepartmentActivityController::class,'edit'])->name('edit')->middleware(['permission'=>'permission:department.manage-edit']);

        Route::post('edit/{editObj}',[Admin\DepartmentActivityController::class,'update'])->name('edit.post')->middleware(['permission'=>'permission:department.manage-edit']);
    });

    Route::prefix('hospital-statistics')->name('hospital.')->group(function(){
        
        Route::get('listing',[Admin\HospitalStatisticsController::class,'listing'])->name('listing')->middleware(['permission'=>'permission:hospital.statistics.mange-view']);

        Route::get('listing_ajax',[Admin\HospitalStatisticsController::class,'listingAjax'])->name('listing.ajax')->middleware(['permission'=>'permission:hospital.statistics.mange-view']);

        Route::get('add',[Admin\HospitalStatisticsController::class,'add'])->name('add')->middleware(['permission'=>'permission:hospital.statistics.mange-add']);

        Route::post('add',[Admin\HospitalStatisticsController::class,'store'])->name('add.post')->middleware(['permission'=>'permission:hospital.statistics.mange-add']);

        Route::get('delete/{deleteObj}',[Admin\HospitalStatisticsController::class,'deleteLastRecord'])->name('delete')->middleware(['permission'=>'permission:hospital.statistics.mange-del']);

    });

    Route::prefix('spotlight')->name('spotlight.')->group(function(){

        Route::get('listing',[Admin\SpotlightController::class,'index'])->name('listing')->middleware(['permission'=>'permission:frontend.spotlight-view']);   

        Route::get('listing-ajax',
        [Admin\SpotlightController::class,'listingAjax'])->name('listing.ajax')->middleware(['permission'=>'permission:frontend.spotlight-view']); 
        
        Route::get('add',[Admin\SpotlightController::class,'create'])->name('add')->middleware(['permission'=>'permission:frontend.spotlight-add']);

        Route::post('add',[Admin\SpotlightController::class,'store'])->name('add.post')->middleware(['permission'=>'permission:frontend.spotlight-add']);

        Route::get('edit/{editObj}',[Admin\SpotlightController::class,'edit'])->name('edit')->middleware(['permission'=>'permission:frontend.spotlight-edit']);

        Route::post('edit/{editObj}',[Admin\SpotlightController::class,'update'])->name('edit.post')->middleware(['permission'=>'permission:frontend.spotlight-edit']);

        Route::get('delete/{deleteObj}',[Admin\SpotlightController::class,'destroy'])->name('delete')->middleware(['permission'=>'permission:frontend.spotlight-del']);

        Route::get('view/{viewObj}',[Admin\SpotlightController::class,'show'])->name('view')->middleware(['permission'=>'permission:frontend.spotlight-view']);
    });

    Route::prefix('annual-report')->name('annual.report.')->group(function(){

        Route::get('listing',[Admin\AnnualReportController::class,'index'])->name('listing')->middleware(['permission'=>'permission:annual.report-view']);

        Route::get('listing\ajax',[Admin\AnnualReportController::class,'getListAjax'])->name('listing.ajax')->middleware(['permission'=>'permission:annual.report-view']);

        Route::get('add',[Admin\AnnualReportController::class,'create'])->name('add')->middleware(['permission'=>'permission:annual.report-add']);

        Route::post('add',[Admin\AnnualReportController::class,'store'])->name('add.post')->middleware(['permission'=>'permission:annual.report-add']);

        Route::get('delete/{deleteObj}',[Admin\AnnualReportController::class,'destroy'])->name('destroy')->where(['deleteObj'=>'[0-9]+'])->middleware('permission:annual.report-del');

        Route::get('edit/{editObj}',[Admin\AnnualReportController::class,'edit'])->name('edit')->middleware('permission:annual.report-edit');

        Route::post('edit/{editObj}',[Admin\AnnualReportController::class,'update'])->name('edit.post')->middleware('permission:annual.report-edit');

        Route::get('view/{viewObj}',[Admin\AnnualReportController::class,'show'])->name('view')->where(['viewObj'=>'[0-9]+'])->middleware('permission:annual.report-view');
    });
    Route::prefix('admission-procedure')->name('admission.procedure.')->group(function(){

        Route::get('listing',[Admin\AdmissionProcedureController::class,'index'])->name('listing')->middleware(['permission'=>'permission:admission.procedure-view']);

        Route::get('listing\ajax',[Admin\AdmissionProcedureController::class,'getListAjax'])->name('listing.ajax')->middleware(['permission'=>'permission:admission.procedure-view']);

        Route::get('add',[Admin\AnnualReportController::class,'create'])->name('add')->middleware(['permission'=>'permission:admission.procedure-add']);

        Route::post('add',[Admin\AdmissionProcedureController::class,'store'])->name('add.post')->middleware(['permission'=>'permission:admission.procedure-add']);

        Route::get('delete/{deleteObj}',[Admin\AdmissionProcedureController::class,'destroy'])->name('destroy')->where(['deleteObj'=>'[0-9]+'])->middleware('permission:admission.procedure-del');

        Route::get('edit/{editObj}',[Admin\AdmissionProcedureController::class,'edit'])->name('edit')->middleware('permission:admission.procedure-edit');

        Route::post('edit/{editObj}',[Admin\AdmissionProcedureController::class,'update'])->name('edit.post')->middleware('permission:admission.procedure-edit');

        Route::get('view/{viewObj}',[Admin\AdmissionProcedureController::class,'show'])->name('view')->where(['viewObj'=>'[0-9]+'])->middleware('permission:admission.procedure-view');
    });

    Route::prefix('event')->name('event.')->group(function(){
        
        Route::get('add',[Admin\EventController::class,'create'])->name('add')->middleware(['permission'=>'permission:event-add']);

        Route::post('add',[Admin\EventController::class,'store'])->name('add.post')->middleware(['permission'=>'permission:event-add']);

        Route::get('listing',[Admin\EventController::class,'index'])->name('listing')->middleware(['permission'=>'permission:event-view']);

        Route::get('listing\ajax',[Admin\EventController::class,'getEventAjax'])->name('listing.ajax')->middleware(['permission'=>'permission:event-view']);


        Route::get('edit/{editObj}',[Admin\EventController::class,'edit'])->name('edit')->where(['editObj'=>'[0-9]+'])->middleware('permission:event-edit');

        Route::post('edit/{editObj}',[Admin\EventController::class,'update'])->name('edit.post')->where(['editObj'=>'[0-9]+'])->middleware('permission:event-edit');

        Route::get('view/{viewObj}',[Admin\EventController::class,'show'])->name('view')->where(['viewObj'=>'[0-9]+'])->middleware('permission:event-view');

        Route::get('delete/{deleteObj}',[Admin\EventController::class,'destroy'])->name('destroy')->where(['deleteObj'=>'[0-9]+'])->middleware('permission:event-del');


        Route::prefix('gallery')->name('gallery.')->group(function(){
            
            Route::get('add/{event?}',[Admin\EventGalleryController::class,'create'])->name('add')->middleware(['permission'=>'permission:event-add']);
    
            Route::post('add',[Admin\EventGalleryController::class,'store'])->name('add.post')->middleware(['permission'=>'permission:event-add']);

            Route::get('view/{event}',[Admin\EventGalleryController::class,'show'])->name('view')->middleware(['permission'=>'permission:event-view']);

            Route::get('edit/{event}',[Admin\EventGalleryController::class,'edit'])->name('edit')->middleware(['permission'=>'permission:event-edit']);

            Route::post('edit/{event}',[Admin\EventGalleryController::class,'update'])->name('edit')->middleware(['permission'=>'permission:event-edit']);
            Route::get('delete/{obj}',[Admin\EventGalleryController::class,'destroy'])->name('delete')->middleware(['permission'=>'permission:event-del']);
        
        });
        
        Route::prefix('workshop')->name('workshop.')->group(function(){
            
            Route::get('add',[Admin\WorkshopController::class,'create'])->name('add')->middleware(['permission'=>'permission:workshop-add']);

            Route::post('add',[Admin\WorkshopController::class,'store'])->name('add.post')->middleware(['permission'=>'permission:workshop-add']);

            Route::get('listing',[Admin\WorkshopController::class,'index'])->name('listing')->middleware(['permission'=>'permission:workshop-view']);

            Route::get('edit/{editObj}',[Admin\WorkshopController::class,'edit'])->name('edit')->where(['editObj'=>'[0-9]+'])->middleware('permission:workshop-edit');

            Route::post('edit/{editObj}',[Admin\WorkshopController::class,'update'])->name('edit.post')->where(['editObj'=>'[0-9]+'])->middleware('permission:workshop-edit');

            Route::get('view/{viewObj}',[Admin\WorkshopController::class,'show'])->name('view')->where(['viewObj'=>'[0-9]+'])->middleware('permission:workshop-view');

            Route::get('delete/{deleteObj}',[Admin\WorkshopController::class,'destroy'])->name('destroy')->where(['deleteObj'=>'[0-9]+'])->middleware('permission:workshop-del');
        });
    });
    
    
    Route::prefix('recruitment')->name('recruitment.')->group(function(){
        
        Route::get('listing',[Admin\Recruitment\RecruitmentController::class,'index'])->name('listing')->middleware('permission:recruitment.manage-view');
        
        Route::get('listing/ajax',[Admin\Recruitment\RecruitmentController::class,'listingAjax'])->name('listing.ajax')->middleware('permission:recruitment.manage-view');

         Route::get('add',[Admin\Recruitment\RecruitmentController::class,'create'])->name('add')->middleware('permission:recruitment.manage-add');
         Route::post('add',[Admin\Recruitment\RecruitmentController::class,'store'])->name('add.post')->middleware('permission:recruitment.manage-add');

        Route::get('edit/{editObj}',[Admin\Recruitment\RecruitmentController::class,'edit'])->name('edit')->where(['editObj'=>'[0-9]+'])->middleware('permission:recruitment.manage-edit');
        Route::post('edit/{editObj}',[Admin\Recruitment\RecruitmentController::class,'update'])->name('edit.post')->where(['editObj'=>'[0-9]+'])->middleware('permission:recruitment.manage-edit');

        Route::get('delete/{deleteObj}',[Admin\Recruitment\RecruitmentController::class,'destroy'])->name('delete')->where(['recruitment.manage'=>'[0-9]+'])->middleware('permission:recruitment.manage-del');
        
        Route::get('view/{viewObj}',[Admin\Recruitment\RecruitmentController::class,'show'])->name('view')->where(['viewObj'=>'[0-9]+'])->middleware('permission:recruitment.manage-view');

        Route::prefix('other-info')->name('other_info.')->group(function(){

            Route::get('listing',[Admin\Recruitment\OtherInfoController::class,'index'])->name('listing')->middleware('permission:recruitment.other.info-view');
            Route::get('listing/ajax',[Admin\Recruitment\OtherInfoController::class,'listingAjax'])->name('listing.ajax')->middleware('permission:recruitment.other.info-view');

            Route::get('add',[Admin\Recruitment\OtherInfoController::class,'create'])->name('add')->middleware('permission:recruitment.other.info-add');
            Route::post('add',[Admin\Recruitment\OtherInfoController::class,'store'])->name('add.post')->middleware('permission:recruitment.other.info-add');

            Route::get('edit/{editObj}',[Admin\Recruitment\OtherInfoController::class,'edit'])->name('edit')->where(['editObj'=>'[0-9]+'])->middleware('permission:recruitment.other.info-edit');
            
            Route::post('edit/{editObj}',[Admin\Recruitment\OtherInfoController::class,'update'])->name('edit.post')->where(['editObj'=>'[0-9]+'])->middleware('permission:recruitment.other.info-edit');

            Route::get('delete/{deleteObj}',[Admin\Recruitment\OtherInfoController::class,'destroy'])->name('delete')->where(['deleteObj'=>'[0-9]+'])->middleware('permission:recruitment.other.info-del');

            Route::get('view/{viewObj}',[Admin\Recruitment\OtherInfoController::class,'show'])->name('view')->where(['viewObj'=>'[0-9]+'])->middleware('permission:recruitment.other.info-view');

        });

    });

});

Route::post('admin/login',[Admin\UserController::class,'login'])->name('admin.user.login.post');

Route::get('image', [Web\HomeController::class,'displayImage'])->name('image.displayImage');

