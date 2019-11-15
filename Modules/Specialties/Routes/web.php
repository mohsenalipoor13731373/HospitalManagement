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

Route::prefix('specialties')->group(function () {
    Route::get('/Specialties/wizard/{id?}', 'SpecialtiesController@wizard')->name('admin.module.specialties.wizard');
    Route::post('/Specialties/store/{id?}', 'SpecialtiesController@store')->name('admin.module.specialties.store');
    Route::get('/Specialties/delete/{id?}', 'SpecialtiesController@delete')->name('admin.module.specialties.delete');
    Route::get('/Specialties/show', 'SpecialtiesController@show')->name('admin.module.specialties.show');
});
