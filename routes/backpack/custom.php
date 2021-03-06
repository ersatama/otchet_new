<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('user', 'UserCrudController');
    Route::crud('organization', 'OrganizationCrudController');
    Route::crud('role', 'RoleCrudController');
    Route::crud('faq', 'FaqCrudController');
    Route::crud('news', 'NewsCrudController');
    Route::crud('staff', 'StaffCrudController');
    Route::crud('tax', 'TaxCrudController');
    Route::crud('faqlist', 'FaqListCrudController');
    Route::crud('newslist', 'NewsListCrudController');
    Route::crud('notification', 'NotificationCrudController');
}); // this should be the absolute last line of this file