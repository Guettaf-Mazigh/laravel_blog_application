<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthorRequestController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth','adminRole'])->group(function(){
    Route::get('/admin/dashboard',[AdminController::class,'admindashboard'])->name('admin.dashboard');
    Route::get('/rejected/requests',[AdminController::class,'rejectedRequests'])->name('rejected.requests');
    Route::get('/approved/requests',[AdminController::class,'approvedRequests'])->name('approved.requests');
    Route::post('/admin/delete/request/{requestID}',[AdminController::class,'deletRequest'])->name('delete.request');
    Route::post('/admin/accept/request/{requestID}/{userId}',[AdminController::class,'acceptRequest'])->name('accept.request');
    Route::post('store/rejected/{requestId}',[AdminController::class,'storeRejectedRequests'])->name('store.rejected.requests');
    Route::post('store/approved/{requestId}',[AdminController::class,'storeApprovedRequests'])->name('store.approved.requests');
});

Route::controller(UserController::class)->group(function(){
    Route::get('/','index')->name('index');
    Route::get('/login','login')->name('login');
    Route::get('/register','register')->name('register');
    Route::post('/authentification','authentification')->name('authentification');
    Route::post('/store','store')->name('store');
});

Route::controller(UserController::class)->middleware('auth')->group(function(){
    Route::post('/logout','logout')->name('logout');
    Route::get('/edit/profile','editProfile')->name('edit.profile');
    Route::post('/update/profile','updateProfile')->name('update.profile');
    Route::post('/stora/avatar','storeAvatar')->name('store.avatar');
    Route::get('edit/password','editPassword')->name('edit.password');
    Route::post('update/password','updatePassword')->name('update.password');
});

Route::controller(AuthorRequestController::class)->middleware('auth')->group(function(){
    Route::get('/pending/requests','showRequestForm')->name('pending.requests');
    Route::post('/validate/request','validateRequest')->name('validate.request');
});

