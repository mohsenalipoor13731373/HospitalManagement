<?php

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

Route::prefix('doctor')->group(function () {
    Route::get('/doctor/wizard/{id?}', 'DoctorController@wizard')->name('admin.module.doctor.wizard');
    Route::post('/doctor/store/{id?}', 'DoctorController@store')->name('admin.module.doctor.store');

    Route::get('/doctor/delete/{id?}', 'DoctorController@delete')->name('admin.module.doctor.delete');
    Route::get('/doctor/show', 'DoctorController@show')->name('admin.module.doctor.show');


});
