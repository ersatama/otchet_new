<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\TaxController;
use App\Http\Controllers\Api\OrganizationController;
use App\Http\Controllers\Api\ContactsController;
use App\Http\Controllers\Api\BankController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\CompulsoryPensionContributionController;
use App\Http\Controllers\Api\IndividualIncomeTaxController;
use App\Http\Controllers\Api\SocialSecurityContributionController;
use App\Http\Controllers\Api\CompulsoryDeductionsController;
use App\Http\Controllers\Api\MandatoryContributionsController;
use App\Http\Controllers\Api\AccessController;
use App\Http\Controllers\Api\ShopController;

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');
header('Access-Control-Allow-Headers: Content-Type, X-Auth-Token, Origin, Authorization,X-localization,X-No-Cache');

Route::prefix('user')->group(function() {
    Route::post('auth',[UserController::class,'auth'])->name('user.auth');
    Route::post('file',[UserController::class,'file'])->name('user.file');
    Route::post('create',[UserController::class,'create'])->name('user.create');
    Route::post('update/{userId}',[UserController::class,'update'])->name('user.update');
    Route::get('id/{id}',[UserController::class,'getById'])->name('user.id');
    Route::get('iin/{iin}',[UserController::class,'getByIin'])->name('user.iin');
    Route::get('token/{token}',[UserController::class,'apiToken'])->name('user.token');
});

Route::prefix('bank')->group(function() {
    Route::post('create',[BankController::class,'create'])->name('bank.create');
    Route::post('update/{id}',[BankController::class,'update'])->name('bank.update');
    Route::get('delete/{id}',[BankController::class,'delete'])->name('bank.delete');
    Route::get('id/{id}',[BankController::class,'getById'])->name('bank.id');
    Route::get('user/{userId}',[BankController::class,'getByUserId'])->name('bank.user');
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
    Route::get('user/{userId}',[TaxController::class,'getByUserId'])->name('tax.user');
    Route::get('id/{id}',[TaxController::class,'getById'])->name('tax.id');
});

Route::prefix('compulsory_pension_contribution')->group(function() {
    Route::post('create',[CompulsoryPensionContributionController::class,'create'])->name('compulsory_pension_contribution.create');
    Route::get('delete/{id}',[CompulsoryPensionContributionController::class,'delete'])->name('compulsory_pension_contribution.delete');
    Route::get('iin/{iin}',[CompulsoryPensionContributionController::class,'getByIin'])->name('compulsory_pension_contribution.iin');
    Route::get('bin/{bin}',[CompulsoryPensionContributionController::class,'getByBin'])->name('compulsory_pension_contribution.bin');
    Route::get('user/{userId}',[CompulsoryPensionContributionController::class,'getByUserId'])->name('compulsory_pension_contribution.user');
    Route::get('id/{id}',[CompulsoryPensionContributionController::class,'getById'])->name('compulsory_pension_contribution.id');
});

Route::prefix('individual_income_tax')->group(function() {
    Route::post('create',[IndividualIncomeTaxController::class,'create'])->name('individual_income_tax.create');
    Route::get('delete/{id}',[IndividualIncomeTaxController::class,'delete'])->name('individual_income_tax.delete');
    Route::get('iin/{iin}',[IndividualIncomeTaxController::class,'getByIin'])->name('individual_income_tax.iin');
    Route::get('user/{userId}',[IndividualIncomeTaxController::class,'getByUserId'])->name('individual_income_tax.user');
    Route::get('id/{id}',[IndividualIncomeTaxController::class,'getById'])->name('individual_income_tax.id');
});

Route::prefix('social_security_contributions')->group(function() {
    Route::post('create',[SocialSecurityContributionController::class,'create'])->name('social_security_contributions.create');
    Route::get('delete/{id}',[SocialSecurityContributionController::class,'delete'])->name('social_security_contributions.delete');
    Route::get('iin/{iin}',[SocialSecurityContributionController::class,'getByIin'])->name('social_security_contributions.iin');
    Route::get('bin/{bin}',[SocialSecurityContributionController::class,'getByBin'])->name('social_security_contributions.bin');
    Route::get('user/{userId}',[SocialSecurityContributionController::class,'getByUserId'])->name('social_security_contributions.user');
    Route::get('id/{id}',[SocialSecurityContributionController::class,'getById'])->name('social_security_contributions.id');
});

Route::prefix('compulsory_deductions')->group(function() {
    Route::post('create',[CompulsoryDeductionsController::class,'create'])->name('compulsory_deductions.create');
    Route::get('delete/{id}',[CompulsoryDeductionsController::class,'delete'])->name('compulsory_deductions.delete');
    Route::get('iin/{iin}',[CompulsoryDeductionsController::class,'getByIin'])->name('compulsory_deductions.iin');
    Route::get('bin/{bin}',[CompulsoryDeductionsController::class,'getByBin'])->name('compulsory_deductions.bin');
    Route::get('user/{userId}',[CompulsoryDeductionsController::class,'getByUserId'])->name('compulsory_deductions.user');
    Route::get('id/{id}',[CompulsoryDeductionsController::class,'getById'])->name('compulsory_deductions.id');
});

Route::prefix('mandatory_contributions')->group(function() {
    Route::post('create',[MandatoryContributionsController::class,'create'])->name('mandatory_contributions.create');
    Route::get('delete/{id}',[MandatoryContributionsController::class,'delete'])->name('mandatory_contributions.delete');
    Route::get('iin/{iin}',[MandatoryContributionsController::class,'getByIin'])->name('mandatory_contributions.iin');
    Route::get('user/{userId}',[MandatoryContributionsController::class,'getByUserId'])->name('mandatory_contributions.user');
    Route::get('id/{id}',[MandatoryContributionsController::class,'getById'])->name('mandatory_contributions.id');
});

Route::prefix('access')->group(function() {
    Route::post('create',[AccessController::class,'create'])->name('access.create');
    Route::post('update/{id}',[AccessController::class,'update'])->name('access.update');
    Route::get('delete/{id}',[AccessController::class,'delete'])->name('access.delete');
    Route::get('iin/{iin}',[AccessController::class,'getByIin'])->name('access.iin');
    Route::get('user/{userId}',[AccessController::class,'getByUserId'])->name('access.user');
});

Route::prefix('shop')->group(function() {
    Route::post('create',[ShopController::class,'create'])->name('shop.create');
    Route::post('update',[ShopController::class,'update'])->name('shop.update');
    Route::get('delete/{id}',[ShopController::class,'delete'])->name('shop.delete');
    Route::get('organization/{organizationId}',[ShopController::class,'getByOrganizationId'])->name('shop.organization');
});

Route::prefix('notification')->group(function() {
    Route::post('create',[NotificationController::class,'create'])->name('notification.create');
    Route::post('update/{id}',[NotificationController::class,'update'])->name('notification.update');
    Route::get('id/{id}',[NotificationController::class,'getById'])->name('notification.id');
    Route::get('delete/{id}',[NotificationController::class,'delete'])->name('notification.delete');
    Route::get('list',[NotificationController::class,'list'])->name('notification.list');
    Route::get('send/{id}',[NotificationController::class,'send'])->name('notification.send');
});

Route::prefix('contacts')->group(function() {
    Route::get('faq',[ContactsController::class,'faq'])->name('contacts.faq');
    Route::get('news',[ContactsController::class,'news'])->name('contacts.news');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
