<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\logingConroller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SMSTemplateController;
use App\Http\Controllers\smsController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\UserRoleController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\supDepartmentsController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\ApplicantAddressController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ApplicationHistoryController;
use App\Http\Controllers\GuarantorController;
use App\Http\Controllers\BiometricController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CrimeController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\FingerPrintController;
use App\Http\Controllers\CrimeCategoryController;
use App\Http\Controllers\CrimeTypeController;
use App\Http\Controllers\CrimecaseController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\SubBranchController;
use App\Http\Controllers\BranchManagerController;

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
route::get('/',[logingConroller::class, 'index'])->name('login')->middleware('AlreadyLogedIn');
route::post('/login',[logingConroller::class, 'login'])->name('login-user');
route::get('/logOut',[logingConroller::class, 'logOut']);
Route::middleware(['isLoggedIn'])->group(function () {
    // Dashboard
route::get('/dashboard',[DashboardController::class, 'index'])->name('index');
// SMS functionality
Route::resource('sms', smsController::class);
Route::get('sendSMS', [smsController::class, 'sendSMS']);
Route::post('sms/send', [smsController::class, 'send'])->name('send-sms');
Route::resource('smsTemplate', SMSTemplateController::class);
Route::post('/settings/sms', [smsController::class, 'updateConfigSMS'])->name('sms.settings.updateConfigSMS');


Route::resource('setting', SettingController::class);
Route::resource('users', UsersController::class);
Route::resource('userRole', UserRoleController::class);


Route::resource('persons', PersonController::class);
Route::get('/person/grid', [PersonController::class, 'getpersons'])->name('person.grid');
Route::post('/person/import', [ImportController::class, 'importPersons'])->name('persons.import');
Route::get('/person/export', [ExportController::class, 'PersonExport'])->name('persons.export');
Route::post('/person/search', [PersonController::class, 'searchPerson'])->name('persons.search');


Route::get('certificates', [CertificateController::class,'index'])->name('certificates.index');
Route::get('certificates/{certificate}', [CertificateController::class,'show'])->name('certificates.show');




Route::get('crimes', [CrimeController::class, 'index'])->name('crimes.index');
Route::post('crimes/check/{application}', [CrimeController::class, 'check'])->name('crimes.check');
Route::resource('regions', RegionController::class);
Route::resource('States', StateController::class);
Route::resource('districts', DistrictController::class);
Route::resource('branches', BranchController::class);
Route::resource('applicants', ApplicantController::class);
Route::resource('applicant_addresses', ApplicantAddressController::class);
Route::resource('applications', ApplicationController::class);
Route::resource('application_history', ApplicationHistoryController::class);
Route::resource('guarantors', GuarantorController::class);
Route::resource('biometrics', BiometricController::class);
Route::resource('payments', PaymentController::class);
Route::put('pay/{payment}/pay', [PaymentController::class, 'pay'])->name('payments.pay');
Route::get('paid', [PaymentController::class, 'paid'])->name('payments.paid');
Route::resource('sub_branches', SubBranchController::class);
Route::resource('branch_managers', BranchManagerController::class)->except(['edit', 'update', 'show']);
Route::resource('departments', DepartmentsController::class);
Route::resource('supdepartments', supDepartmentsController::class);



// finger print route 
Route::resource('fingerPrint', FingerPrintController::class);
Route::get('/fingerprint/verify', [FingerPrintController::class, 'showVerifyPage'])
    ->name('fingerPrint.verifyPage');
Route::post('/fingerprint/verify', [FingerPrintController::class, 'verify'])->name('fingerPrint.verify');
// web.php
Route::get('/getFingerprints', [FingerPrintController::class, 'getFingerprints']);
Route::get('/applicants/{id}', [FingerPrintController::class, 'show'])->name('applicants.show');


// Example using GET
Route::get('/fingers/collect/{id}', [FingerPrintController::class, 'collect'])->name('finger.collect');

// Optional: If you also want change finger
Route::get('/fingers/change/{id}', [FingerPrintController::class, 'change'])->name('finger.change');

Route::resource('crime-categories', CrimeCategoryController::class);
Route::resource('crime-types', CrimeTypeController::class);
Route::resource('crimes-cases', CrimecaseController::class);


   // Sub-pages
    Route::get('/{id}/suspects', [CrimeCaseController::class, 'suspects'])->name('crimes-cases.suspects');
    Route::get('/{id}/victims', [CrimeCaseController::class, 'victims'])->name('crimes-cases.victims');
    Route::get('/{id}/witnesses', [CrimeCaseController::class, 'witnesses'])->name('crimes-cases.witnesses');
    Route::get('/{id}/evidence', [CrimeCaseController::class, 'evidence'])->name('crimes-cases.evidence');
// Store a new suspect for a specific crime case
Route::post('crimes-cases/{id}/suspects', [CrimeCaseController::class, 'storeSuspect'])->name('crimes-cases.suspects.store');
// Store new person and insert into suspects
Route::post('/suspect/store', [CrimeCaseController::class, 'insert'])->name('suspect.store123');
Route::get('/Viewsuspects/{id}', [CrimeCaseController::class, 'View'])->name('suspects.View');
Route::get('/getpersonfinger/{id}', [CrimeCaseController::class, 'getdata'])->name('getdata.show');
    // Route::resources([
//     'persons' => PersonController::class,
//     'crime-categories' => CrimeCategoryController::class,
//     'crime-types' => CrimeTypeController::class,
//     'crimes' => CrimeController::class,
//     'involved-persons' => InvolvedPersonController::class,
//     'suspects' => SuspectController::class,
//     'victims' => VictimController::class,
//     'witnesses' => WitnessController::class,
//     'evidence' => EvidenceController::class,
// ]);



Route::get('/force-404', function () {
    abort(404);
});


Route::get('/force-500', function () {
    abort(500); // or throw new \Exception('Test 500 error');
});


});//end of route group


Route::get('/clear-cache', function () {
    try {
        // Clear All Caches
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('route:clear');
        Artisan::call('view:clear');
        Artisan::call('optimize:clear');

        return back()->with('success', 'All caches cleared successfully.');
    } catch (\Exception $e) {
        return back()->with('fail', 'Failed to clear cache: ' . $e->getMessage());
    }
});