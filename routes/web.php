<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
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
Route::get('clear', function () {
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    return redirect('/');
});
require('admin.php');
//web route

Route::get('/', [WebController::class, 'index'])->name('home');

Route::get('contact-us', [WebController::class, 'contact'])->name('contacts');
Route::post('contacts/save', [WebController::class, 'contactSave'])->name('contacts.save');
Route::get('question-answering', [WebController::class, 'faq']);
Route::get('about-us', [WebController::class, 'aboutUs'])->name('about');;


//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
