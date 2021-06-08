<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\TaxController;
use App\Http\Controllers\Api\OrganizationController;
use App\Http\Controllers\Api\ContactsController;

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');
header('Access-Control-Allow-Headers: Content-Type, X-Auth-Token, Origin, Authorization,X-localization,X-No-Cache');

Route::prefix('user')->group(function() {
    Route::post('create',[UserController::class,'create'])->name('user.create');
    Route::post('update/{userId}',[UserController::class,'update'])->name('user.update');
    Route::post('file',[UserController::class,'file'])->name('user.file');
    Route::get('id/{userId}',[UserController::class,'getById'])->name('user.id');
    Route::get('token/{token}',[UserController::class,'apiToken'])->name('user.token');
});

Route::prefix('organization')->group(function() {
    Route::get('user/{userId}',[OrganizationController::class,'getByUserId'])->name('organization.user');
    Route::get('bin/{bin}',[OrganizationController::class,'getByBin'])->name('organization.bin');
    Route::get('delete/{organizationId}',[OrganizationController::class,'delete'])->name('organization.delete');
    Route::post('file/{userId}',[OrganizationController::class,'file'])->name('organization.create');
});

Route::prefix('employee')->group(function() {
    Route::post('create',[EmployeeController::class,'create'])->name('employee.create');
    Route::post('update',[EmployeeController::class,'create'])->name('employee.update');
    Route::get('delete/{organizationId}/{userId}',[EmployeeController::class,'delete'])->name('employee.delete');
    Route::get('list/{organizationId}',[EmployeeController::class,'list'])->name('employee.list');
});

Route::prefix('tax')->group(function() {
    Route::post('create',[TaxController::class,'create'])->name('tax.create');
    Route::get('delete/{id}',[TaxController::class,'delete'])->name('tax.delete');
    Route::get('organization/{organizationId}',[TaxController::class,'getByOrganizationId'])->name('tax.getByOrganizationId');
    Route::get('user/{userId}',[TaxController::class,'getByUserId'])->name('tax.getByUserId');
});

Route::prefix('contacts')->group(function() {
    Route::get('faq',[ContactsController::class,'faq'])->name('contacts.faq');
    Route::get('news',[ContactsController::class,'news'])->name('contacts.news');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
