<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DoctorScheduleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MedicinesController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PatientHistoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


//
// Route::get('/', function () {
//     return view('Listings',[
//         'heading' => 'Latest Listings',
//         'Listings' => listing::all()

//      ]);});
// // Single Listing
// Route::get('/listing/{id}', function ($id) {
//     return view('listing',[
//         'item'=> listing::find($id)
//     ]);
// });


Route::get('/dashboard',[UserController::class,'Dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth','admin')->group(function () {
    Route::resource('departments', DepartmentController::class);
    Route::resource('doctors', DoctorController::class);
    Route::resource('schedule', DoctorScheduleController::class);
    Route::resource('patients', PatientController::class);
    Route::resource('appointments',AppointmentController::class);
    Route::resource('patient_history',PatientHistoryController::class);
    Route::get('/pending-appointment',[AppointmentController::class,'pending'])->name('appointment.pending');
    Route::get('/appointment/{appointment}/approve',[AppointmentController::class,'approve'])->name('appointment.approve');
    Route::resource('medicines',MedicinesController::class);
    Route::get('/appointment/{appointment}/cancel',[AppointmentController::class,'cancel'])->name('appointment.cancel');
    Route::get('/medicine/stock-in/{medicine}',[MedicinesController::class,'stockInForm'])->name('medicine.stockin.form');

Route::post('/medicine/stock-in/{medicine}',[MedicinesController::class,'stockIn'])->name('medicine.stockin');

Route::get('/medicine/stock-out/{medicine}',[MedicinesController::class,'stockOutForm'])->name('medicine.stockout.form');

Route::post('/medicine/stock-out/{medicine}',[MedicinesController::class,'stockOut'])->name('medicine.stockout');

Route::get('/reports',[ReportController::class,'index'])->name('reports.index');


    Route::get('/medicine/stock',[MedicinesController::class,'stock'])->name('medicine.stock');
Route::get('/reports/doctors',[ReportController::class,'doctorReport'])->name('reports.doctors');

Route::get('/reports/patients',[ReportController::class,'patientReport'])->name('reports.patients');

Route::get('/reports/appointments',[ReportController::class,'appointmentReport'])->name('reports.appointments');

Route::get('/reports/medicine',[ReportController::class,'medicineReport'])->name('reports.medicines');


Route::get('/admin/profile',[SettingController::class,'profile'])->name('admin.profile');

Route::post('/admin/profile/update',[SettingController::class,'updateProfile'])->name('admin.profile.update');
Route::get('/admin/settings',[SettingController::class,'settings'])->name('admin.settings');



Route::post('/admin/settings/update',[SettingController::class,'updateSettings'])->name('admin.settings.update');
Route::get('/admin/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');
Route::get('/dashboard/search', [UserController::class, 'search'])
    ->name('dashboard.search');
});

Route::get('/', [HomeController::class,'index'])->name('index');
Route::post('/make-appointment',[AppointmentController::class,'storePublic'])->middleware('auth')->name('appointment.store.public');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::post('/appointment/store', [AppointmentController::class, 'storee'])->name('appointment.store.front');

Route::resource('latest-news', NewsController::class);
Route::get('/news/{id}', [HomeController::class, 'newsDetails'])->name('news.details');

require __DIR__.'/auth.php';
Route::get('divation/{a}/{b}',function(float $a,float $b) {
    return $a / $b;
})->whereNumber(['a','b']);
//  Route::get('home',[HomeController::class, 'index']);
//  Route::get('text',function(){
//     return view('text');
//  });
// Route::get('teet',function(){
//     return view('test.index');
// });
// Route::get('/',[UserController::class, 'index'])->name('index');

Route::get('/lang/{locale}', function ($locale) {

    session()->put('locale', $locale);

    return redirect()->back();

});
Route::get('/test-session', function () {
    return session('locale', 'not-found');
});
Route::get('/set-lang', function () {
    session(['locale' => 'ps']);
    return 'saved';
});

Route::get('/show-lang', function () {
    return session('locale', 'not-found');
});

Route::prefix('admin')->group(function(){
});

