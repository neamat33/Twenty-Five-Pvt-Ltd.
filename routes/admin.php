<?php
use App\Http\Controllers\Admin\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\Auth\ResetPasswordController;
use App\Http\Controllers\Admin\Auth\VerificationController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\Auth\LoginController as AdminLoginController;
use Illuminate\Support\Facades\Route;
Route::get('/admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
//admin authentication system
Route::group(['prefix' => 'admin'], function () {
    //admin authentication system
    Route::get('login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [AdminLoginController::class, 'login']);
    Route::post('logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
    Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('admin.password.request');
    Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('admin.password.email');
    Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('admin.password.reset');
    Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('admin.password.update');
    Route::get('email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');

    Route::group(['middleware' => ['auth:admin', 'prevent-back-history']], function () {
        Route::get('/home', [AdminHomeController::class, 'getDashboard'])->name('admin.dashboard');
        //Profile manage routes
        Route::get('/profile', [AdminHomeController::class, 'view_profile'])->name('admin.profile');
        Route::get('/dashboard', [AdminHomeController::class, 'dashboard'])->name('view.dashboard');
        Route::put('/profile/{id}', [AdminHomeController::class, 'update_general'])->name('update_general');
        Route::post('/profile/password/{id}', [AdminHomeController::class, 'update_password'])->name('admin.update.password');
        Route::get('/contacts/delete/{id}', [ContactController::class, 'destroy'])->name('contacts.delete');
        //contacts
        Route::resource('contacts',ContactController::class);
    });
});
