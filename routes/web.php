<?php

use App\Link;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Auth;
use \App\Http\Controllers\Website;
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


Route::get('/login', [Auth\LoginController::class, 'showLoginForm'])->name('login');

Route::get('/register', [Auth\RegisterController::class, 'showLoginForm'])->name('register');
//Route::get('/', function () {
//    return redirect('login');
//});
Route::post('/login', [Auth\LoginController::class, 'login']);
Route::post('/register', [Auth\RegisterController::class, 'create']);

Route::post('/logout', [Auth\LoginController::class, 'logout']);

//Route::post('reset_password_without_token', 'AccountsController@validatePasswordRequest');
//Route::post('reset_password_with_token', 'AccountsController@resetPassword');


Route::get('search' , [\App\Http\Controllers\HomeController::class, 'search'])->name('users.search');


Route::get('/website', [\App\Http\Controllers\HomeController::class, 'index'])->name('website');
Route::get('/', function () {
    return redirect('website');
});
Route::get('/home', function () {
    return redirect('website');
});

Route::get('/add-betaka-link', 'HomeController@addBetaka')->name('addBetaka');
Route::group(['middleware' => 'auth'], function () {
//    Route::get('/website', [\App\Http\Controllers\HomeController::class, 'index'])->name('website');
//    Route::get('/', function () {
//        return redirect('website');
//    });
    Route::get('/appearance/{id}', [Website\AppearanceController::class, 'index'])->name('appearance');
    Route::put('/profileImage/{id}', [Website\AppearanceController::class, 'profileImage'])->name('profileImage.update');
    Route::put('/appearance/{id}', [Website\AppearanceController::class, 'update'])->name('users.background.update');
    Route::put('/uploadBackground/{id}', [Website\AppearanceController::class, 'uploadBackground'])->name('users.uploadBackground.update');

    Route::get('/links/{id}', [Website\LinkController::class, 'index'])->name('link');


    Route::get('menu/index', [Website\SortLink::class, 'index']);
//    Route::post('menu/update-order',[Website\LinkController::class, 'updateOrder']);
    Route::post('menu/update-order',[Website\LinkController::class, 'updateOrder']);


    Route::get('add/links/{id}', [Website\LinkController::class, 'addLink'])->name('add.link');
    Route::get('/registerLink', function () {
        return redirect('links/'.auth()->user()->id);
    });
//    Route::get('/link-create', [Website\LinkController::class, 'create']);
    Route::post('/link/store', [Website\LinkController::class, 'store'])->name('link.store');
    Route::post('add/link/store', [Website\LinkController::class, 'storeLink'])->name('addLink.store');
    Route::PUT('/link-active/{id}', [Website\LinkController::class, 'LinkActive'])->name('activeLink');
    Route::PUT('/link-inActive/{id}', [Website\LinkController::class, 'LinkInActive'])->name('inActiveLink');
//    Route::post('activePackage/{id}', 'PackagesController@activePackage')->name('activePackage');
//    Route::post('inActivePackage/{id}', 'PackagesController@inActivePackage')->name('inActivePackage');
    Route::post('/link/order', [Website\LinkController::class, 'order'])->name('link.order');
    Route::post('/link/delete/{id}', [Website\LinkController::class, 'destroy'])->name('link.delete');
//    Route::delete('/link/delete/{id}', [Website\LinkController::class, 'destroy'])->name('link.delete');

    Route::get('/success-verification', [\App\Http\Controllers\HomeController::class, 'successVerification'])->name('success-verification');

    Route::get('account/{id}/edit', [Website\AccountController::class, 'edit']);
    Route::put('account/{id}/edit', [Website\AccountController::class, 'update']);
    Route::post('change-password', [Website\AccountController::class, 'passwordUpdate'])->name('change.password');

    Route::post('/email/verification-notification', function (\Illuminate\Http\Request $request) {
        $request->user()->sendEmailVerificationNotification();

//        return back()->with(alert()->success('لقد تم إرسال رابط التفعيل بنجاح','تم'));
        alert()->success('لقد تم إرسال رابط تفعيل حسابك بنجاح','تم');
        return back()->with('message', 'Verification link sent!');
    })->middleware(['auth', 'throttle:6,1'])->name('verification.send');
});



Route::get('/verified', function () {
    return view('website/verified');
})->name('verified');

Route::get('/resetPassword', function () {
    return view('website/resetPassword');
})->name('resetPassword');

\Illuminate\Support\Facades\Auth::routes(['verify' => true]);


//Route::post('link/click', [\App\Http\Controllers\HomeController::class, 'click'])->name('link.click');



Route::get('/{name}' , [\App\Http\Controllers\HomeController::class, 'betaka'])->name('users.betaka');

Route::PUT('/click/view/{id}', function($id){

    $link = Link::Find($id)->increment('views');

//
//    $links = DB::table('links')
//        ->where('link', '=', $request->viewId)
//        ->increment('views');
////dd($request->all());
//    return redirect()->back();
});
//Route::get('/click', function($id){
//    $links = DB::table('links')
//        ->where('id', '=', $id)
//        ->increment('views');
//
//    return redirect()->back();
//});

