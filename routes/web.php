<?php
use App\Http\Controllers\mainContr;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthentificationTest;
use Illuminate\Foundation\Http\Kernel as HttpKernel;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProviderController;
use App\Http\Middleware\Localization;
use Illuminate\Support\Facades\Mail;
use App\Mail\Mails;
Route::get('/mail', function () {
    Mail::to('pantis.dovydas@gmail.com')->send((new Mails())->hi());
});
Route::middleware(['web'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('remindPassword', [mainContr::class, 'RemindPassword'])->name('PasswordRemind');
    Route::post('remindPassword', [mainContr::class, 'PasswordRemindPost'])->name('PasswordRemindPost');

    Route::get('resetPassword/{token}', [mainContr::class, 'resetPassword'])->name('reset');
    Route::post('resetPassword', [mainContr::class, 'resetPasswordPost'])->name('PasswordResetPost');

    Route::get('login', [mainContr::class, 'log_in'])->name('login');;
    Route::get('reg', [mainContr::class, 'registerr']);
    Route::group(['middleware'=>['AuthentificationTest']],function()
    {
        Route::get("homepage",[mainContr::class,"home"])->name('home');
        Route::get('profile', [mainContr::class, 'profile'])->name('profile');
        Route::post('profile/update', [mainContr::class, 'updateProfile'])->name('update');
        Route::post('/update-price/{id}', [ProviderController::class, 'updatePrice'])->name('updatePrice');
    Route::get('create', [ServiceController::class, 'create'])->name('create');
    Route::post('table', [ServiceController::class, 'store'])->name('store');
    Route::get('table',  [ServiceController::class, 'index'])->name('index');
    Route::get("category",[mainContr::class,"category"])->name('category');

    });
    Route::post("getData",[mainContr::class,"getData"])->name('getData');
Route::post("access",[mainContr::class,"access"])->name('access');
Route::get("logout",[mainContr::class,"logout"])->name('logout');
Route::resource('products', ServiceController::class);
Route::get("test",[ServiceController::class,"index"]);
Route::get('show/{id}', [ProviderController::class, 'show']);
Route::get('/services/create/{providerId}', [ServiceController::class, 'createservice'])->name('createservice');



Route::post('/services', [ServiceController::class, 'storeservice'])->name('storeservice');
Route::get('/provider/{id}', [ProviderController::class, 'show'])->name("show");
Route::post('/book-service/{serviceId}', [ProviderController::class, 'bookService'])->name('book-service');
Route::get('/booked-reservations', [ProviderController::class, 'bookedReservations'])->name('booked-reservations');
Route::get('/cancel-reservation/{id}', [ProviderController::class, 'cancelReservation'])->name('cancel-reservation');
Route::get('/myclients', [ProviderController::class, 'showBookings'])->name('myclients');
Route::post('/update-service/{id}',[ProviderController::class, 'updateservice'])->name('update-service');
Route::delete('/remove-service/{id}',[ProviderController::class, 'removeservice'])->name('remove-service');

Route::get('/about', function () {
    return view('about');
});

    Route::get('/{locale}', function ($locale) {
        App::setLocale($locale);
        Session::put('locale', $locale);
        return redirect()->back();
    });


});









