<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;

use App\Http\Controllers\{
    HomeController,
    AdminController,
    PersonalTrainerController,
    ClassController,
    TimetableController,
    CustomerController,
    ChoiceController,
    CheckInController,
    CheckActionController,
    TrainerController,
    UserTimetableController,
    InBodyRecordController,
    UserCheckController,
    UserProfileController,
    QrCodeController,
    QRController

};

Route::view('/', 'home');
Route::view('/home', 'home');
Auth::routes();

Route::middleware(['auth'])->group(function () {

    // Home
    Route::get('/adminhome', [HomeController::class, 'index'])->name('adminhome');

    // PersonalTrainer routes
    Route::get('/personaltrainer', [PersonalTrainerController::class, 'showpersonaltrainer'])->name('personaltrainer');
    Route::get('/personaltrainer2', [PersonalTrainerController::class, 'showpersonaltrainer2'])->name('personaltrainer2');
    Route::get('/addpersonaltrainerform', [PersonalTrainerController::class, 'showAddpersonaltrainerForm'])->name('addpersonaltrainerform');
    Route::post('/storepersonaltrainer', [PersonalTrainerController::class, 'storepersonaltrainer'])->name('storepersonaltrainer');
    Route::get('/editpersonaltrainer/{id}', [PersonalTrainerController::class, 'edit'])->name('editpersonaltrainer');
    Route::put('/updatepersonaltrainer/{id}', [PersonalTrainerController::class, 'updatepersonaltrainer'])->name('updatepersonaltrainer');
    Route::delete('/personaltrainer/{id}', [PersonalTrainerController::class, 'destroy'])->name('deletepersonaltrainer');
    Route::get('/detail/{id}',[PersonalTrainerController::class,'showDetail'])->name('detail');

    // Class routes
    Route::get('/classes/create', [ClassController::class, 'showClass'])->name('classes.create');
    Route::get('/classes/create2', [ClassController::class, 'showClass2'])->name('classes.create2');
    Route::post('/addClass2', [ClassController::class, 'addClass2'])->name('addClass2');
    Route::get('/addClass', [ClassController::class, 'showAddClassForm'])->name('addClass');
    Route::post('/classes/store', [ClassController::class, 'store'])->name('classes.store');  // Renamed to classes.store
    Route::get('/editclass/{id}', [ClassController::class, 'edit'])->name('editclass');
    Route::put('/updateclass/{id}', [ClassController::class, 'update'])->name('updateclass');
    Route::delete('/deleteclass/{id}', [ClassController::class, 'destroy'])->name('deleteclass');


    // Timetable routes
    Route::get('/timetable/create', [TimetableController::class, 'create'])->name('timetable.create');
    Route::get('/timetable', [TimetableController::class, 'index'])->name('timetable.index');  // Explicitly named for clarity
    Route::post('/timetable', [TimetableController::class, 'store'])->name('timetable.store');
    Route::resource('timetable', TimetableController::class);

    // User routes
    Route::get('/userhome', [CustomerController::class, 'profile'])->name('userhome');
    Route::get('/classinfo', [ChoiceController::class, 'classInformation'])->name('classinfo');
    Route::get('/buyclass/{id}', [ChoiceController::class, 'buyClass'])->name('buy.class');
    Route::get('/personal-trainer', [TrainerController::class, 'index'])->name('personal.trainer');
    Route::get('/usertimetable', [UserTimetableController::class, 'index'])->name('usertimetable');
    Route::get('/usertimetable2', [UserTimetableController::class, 'index2'])->name('usertimetable2');
    Route::get('/inbody-records', [InBodyRecordController::class, 'index'])->name('inbody.records')->middleware('auth');
    Route::get('/inbody-records/create', [InBodyRecordController::class, 'create'])->name('inbody.create');
    Route::post('/inbody-records', [InBodyRecordController::class, 'store'])->name('inbody.store');

    //userprofile
    Route::get('/account', 'App\Http\Controllers\UserProfileController@show')->name('userprofile');
    Route::get('/account2', 'App\Http\Controllers\UserProfileController@show2')->name('userprofile2');
    Route::get('/users/{id}/edit', [UserProfileController::class, 'edit'])->name('editprofile2');
    Route::put('/users/{id}', [UserProfileController::class, 'update'])->name('updateprofile2');

    // QR code routes 
    Route::get('/generate-qrcode/{userId}', [QRCodeController::class, 'generateQRCode'])->name('generate-qrcode');
    Route::get('/generate-qr-code', 'QRCodeController@generateQrCode')->name('generate.qr.code');
    Route::get('/qr-page-target', function () {
        return view('qr_page_target');
    });
    Route::get('/qr-page-target/{userId}', function ($userId) {
        $userData = DB::table('users')->where('id', $userId)->first();
        $user = $userData ? $userData->name : 'Unknown User';
        $checkInOut = $userData ? $userData->status : 'Unknown Status';
        return view('qr_page_target', compact('user', 'checkInOut'));
    })->name('qr-page-target');
    Route::post('/check-action', [CheckActionController::class, 'handleAction'])->name('check-action');
    Route::post('/user/check-in', [UserCheckController::class, 'checkIn'])->name('user.check-in');
    Route::post('/user/check-out', [UserCheckController::class, 'checkOut'])->name('user.check-out');
    
    Route::get('/user-profile', [UserProfileController::class, 'showUserProfile'])->name('user-profile');
    Route::post('/check-action', [CheckActionController::class, 'handleAction'])->name('check-action');
});