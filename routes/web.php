<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function (){
    Route::resource('roles', 'App\Http\Controllers\RoleController');
    Route::resource('users', 'App\Http\Controllers\UserController');
    /** MANTENEDOR DE PAISES */
    Route::resource('countries', 'App\Http\Controllers\CountryController');
    Route::get('countries/movement/{country}', 'App\Http\Controllers\CountryController@movement')->name('countries.movement');
    /** MANTENEDOR DE PUERTOS DE EMBARQUE */
    Route::resource('shippingports', 'App\Http\Controllers\ShippingPortController');
    Route::get('shippingports/movement/{shippingPort}', 'App\Http\Controllers\ShippingPortController@movement')->name('shippingports.movement');
    /** MANTENEDOR DE PUERTOS DE DESTINO */
    Route::resource('destinationports', 'App\Http\Controllers\DestinationPortController');
    Route::get('destinationports/movement/{destinationPort}', 'App\Http\Controllers\DestinationPortController@movement')->name('destinationports.movement');
    /** MANTENEDOR DE LUGARES DE ALMACENAMIENTO */
    Route::resource('storagelocations', 'App\Http\Controllers\StorageLocationController');
    Route::get('storagelocations/movement/{storageLocation}', 'App\Http\Controllers\StorageLocationController@movement')->name('storagelocations.movement');
    /** MANTENEDOR DE LUGARES DE FAENA */
    Route::resource('slaughterplaces', 'App\Http\Controllers\SlaughterplaceController');
    Route::get('slaughterplaces/movement/{slaughterPlace}', 'App\Http\Controllers\SlaughterplaceController@movement')->name('slaughterplaces.movement');
    /** MANTENEDOR DE EXPORTADORES */
    Route::resource('exporters', 'App\Http\Controllers\ExporterController');
    Route::get('exporters/movement/{exporter}', 'App\Http\Controllers\ExporterController@movement')->name('exporters.movement');
    /** MANTENEDOR DE ADUANAS*/
    Route::resource('bordercrossings', 'App\Http\Controllers\BorderCrossingController');
    Route::get('bordercrossings/movement/{borderCrossing}', 'App\Http\Controllers\BorderCrossingController@movement')->name('bordercrossings.movement');
    /** MANTENEDOR DE CONSIGNATARIOS*/
    Route::resource('consignees', 'App\Http\Controllers\ConsigneeController');
    Route::get('consignees/movement/{consignee}', 'App\Http\Controllers\ConsigneeController@movement')->name('consignees.movement');

    Route::resource('neppex', 'App\Http\Controllers\NeppexController');
});
