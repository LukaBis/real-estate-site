<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PropertyController;

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
    return redirect(app()->getLocale());
});

Route::group(['prefix' => '{locale}', 'middleware' => 'setlocale'], function() {
    Route::get('/', [HomeController::class, 'homePage']);
    Route::get('/about', [AboutController::class, 'aboutPage']);
    Route::get('/properties', [PropertyController::class, 'allProperties']);
});
