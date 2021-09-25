<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\DashboardPropertyController;
use App\Http\Controllers\PropertyImageController;
use Illuminate\Http\Request;

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

Route::group(['prefix' => 'home', 'middleware' => 'verified'], function() {
    Route::get('/', function() {
      return redirect('/home/properties');
    });
    Route::get('/properties', [DashboardPropertyController::class, 'allProperties']);
    Route::get('/property/{id}', [DashboardPropertyController::class, 'singleProperty']);
    Route::put('/property/{id}', [DashboardPropertyController::class, 'updateProperty']);
    Route::delete('/property', [DashboardPropertyController::class, 'deleteProperty']);
    Route::put('/property/vertical-image/{id}', [PropertyImageController::class, 'updatePropertyVerticalImage']);
    Route::delete('/property/horizontal-image', [PropertyImageController::class, 'deletePropertyHorizontalImage']);
    Route::post('/property/horizontal-image', [PropertyImageController::class, 'addPropertyHorizontalImage']);
});

Route::group(['prefix' => '{locale}', 'middleware' => 'setlocale'], function() {
    Route::get('/', [HomeController::class, 'homePage']);
    Route::get('/about', [AboutController::class, 'aboutPage']);
    Route::get('/properties', [PropertyController::class, 'allProperties']);
    Route::get('/property/{id}', [PropertyController::class, 'singleProperty']);
    Route::get('/agents', [AgentController::class, 'allAgents']);
    Route::get('/agent/{id}', [AgentController::class, 'singleAgent']);
    Route::get('/contact', [ContactController::class, 'contact']);
    Route::get('/search', [SearchController::class, 'search']);
});
