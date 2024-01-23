<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

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

Route::controller(PageController::class)->group(function () {
    Route::get('/', 'viewHomePage')->middleware('auth')->name('home.page');
    Route::get('/login', 'viewLoginPage')->name('login.page');
    Route::get('/register', 'viewRegisterPage')->name('register.page');
    Route::get('/manage/events', 'viewManageEvents')->middleware('auth')->name('manage.events');
    Route::get('/event/view', 'viewEventPage')->middleware('auth')->name('view.event');
    Route::get('/event/edit', 'viewEditEventPage')->middleware('auth')->name('edit.event.page');
});

Route::controller(AuthController::class)->group(function () {
    Route::post('/login', 'login')->name('login.user');
    Route::post('/register', 'register')->name('register.user');
    Route::get('/logout', 'logout')->name('logout.user');
});

Route::controller(EventController::class)->group(function () {
    Route::post('/manage/events', 'createEvent')->name('create.event');
    Route::put('/', 'joinEvent')->name('join.event');
    Route::post('/', 'getEventInfo')->name('get.event.info');
    Route::post('/event/edit', 'editEvent')->middleware('auth')->name('edit.event');
    Route::delete('/manage/events', 'delete')->name('delete.event');
});
