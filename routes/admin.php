<?php
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use \App\Http\Controllers\Admin;
use Spatie\Permission\Models\Permission;

Route::get('/login', [Admin\LoginController::class, 'showLoginForm'])->name('admin.login');
Route::get('/', function () {
    return redirect('admin/login');
});
Route::post('/login', [Admin\LoginController::class, 'login']);

Route::group(['middleware' => 'auth:admin'], function () {

    Route::get('/home', [Admin\HomeController::class, 'index']);
    Route::get('profile/{id}/edit', [Admin\ProfileController::class, 'edit']);
    Route::put('profile/{id}/edit', [Admin\ProfileController::class, 'update']);
    Route::post('/logout', [Admin\LoginController::class, 'logout']);

    Route::group(['prefix' => 'users'], function () {
        Route::get('/', [Admin\UserController::class, 'index'])->middleware(['permission:Show All users|View user']);;
        Route::get('/user-data', [Admin\UserController::class, 'anyData'])->middleware(['permission:Show All users|View user']);;
        Route::put('/user-status', [Admin\UserController::class, 'userActive']);
        Route::get('/{id}/view', [Admin\UserController::class, 'view'])->middleware(['can:View user']);;
    });

    Route::group(['prefix' => 'admins'], function () {
        Route::get('/', [Admin\AdminController::class, 'index'])->middleware(['permission:Show All Admins|Add admins|Edit admins|Delete admins']);
        Route::get('/admin-data', [Admin\AdminController::class, 'anyData'])->middleware(['permission:Show All Admins|Add admins|Edit admins|Delete admins']);
//        Route::get('/{id}/view', [Admin\AdminController::class, 'view']);
        Route::get('/admin-create', [Admin\AdminController::class, 'create'])->middleware('can:Add admins');
        Route::post('/admin-create', [Admin\AdminController::class, 'store']);
        Route::get('/admin-edit/{id}', [Admin\AdminController::class, 'edit'])->middleware('can:Edit admins');
        Route::put('/admin-edit/{id}', [Admin\AdminController::class, 'update']);
        Route::delete('/{id}', [Admin\AdminController::class, 'delete'])->middleware('can:Delete admins');
    });




    Route::group(['prefix' => 'test'], function () {
        Route::get('/', [Admin\TestMhController::class, 'index']);
        Route::get('/test-data', [Admin\TestMhController::class, 'anyData']);
        Route::get('/test-create', [Admin\TestMhController::class, 'create']);
        Route::post('/test-create', [Admin\TestMhController::class, 'store']);
        Route::get('/test-edit/{id}', [Admin\TestMhController::class, 'edit']);
        Route::put('/test-edit/{id}', [Admin\TestMhController::class, 'update']);
        Route::delete('/{id}', [Admin\TestMhController::class, 'delete']);
    });

    Route::group(['prefix' => 'roles'], function () {
        Route::get('/', [Admin\RoleController::class, 'index'])->middleware(['permission:Show All Roles|Edit roles|Delete roles']);
        Route::get('/role-data', [Admin\RoleController::class, 'anyData'])->middleware(['permission:Show All Roles|Edit roles|Delete roles']);
        Route::get('/role-create', [Admin\RoleController::class, 'create'])->middleware('can:Add roles');
        Route::post('/role-create', [Admin\RoleController::class, 'store']);
        Route::get('/role-edit/{id}', [Admin\RoleController::class, 'edit'])->middleware('can:Edit roles');
        Route::put('/role-edit/{id}', [Admin\RoleController::class, 'update']);
        Route::delete('/{id}', [Admin\RoleController::class, 'delete'])->middleware('can:Delete roles');
    });

    Route::group(['prefix' => 'web'], function () {
        Route::get('/settings-edit', [Admin\SettingsController::class, 'edit'])->middleware(['permission:Show All settings|Add settings']);
        Route::put('/settings-edit', [Admin\SettingsController::class, 'update']);
        Route::get('/contact-edit', [Admin\SettingsController::class, 'editContact'])->middleware(['permission:Show All settings|Add settings']);
        Route::put('/contact-edit', [Admin\SettingsController::class, 'updateContact']);
    });

});



