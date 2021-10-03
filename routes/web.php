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
use App\Http\Controllers\AddPropertyController;
use App\Http\Controllers\UpdatePropertyController;
use App\Http\Controllers\DeletePropertyController;
use App\Http\Controllers\DashboardAgentController;
use App\Http\Controllers\UpdateAgentController;
use App\Http\Controllers\DeleteAgentController;
use App\Http\Controllers\AddAgentController;
use App\Http\Controllers\TestemonialController;
use App\Http\Controllers\DashboardAboutController;
use App\Http\Controllers\DashboardContactController;
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
    Route::put('/property/{id}', [UpdatePropertyController::class, 'updateProperty']);
    Route::delete('/property', [DeletePropertyController::class, 'deleteProperty']);
    Route::put('/property/vertical-image/{id}', [PropertyImageController::class, 'updatePropertyVerticalImage']);
    Route::delete('/property/horizontal-image', [PropertyImageController::class, 'deletePropertyHorizontalImage']);
    Route::post('/property/horizontal-image', [PropertyImageController::class, 'addPropertyHorizontalImage']);
    Route::get('/add-property', [AddPropertyController::class, 'addPropertyView']);
    Route::post('/add-property', [AddPropertyController::class, 'addProperty']);
    Route::get('/agents', [DashboardAgentController::class, 'allAgents']);
    Route::get('/agent/{id}', [DashboardAgentController::class, 'singleAgent']);
    Route::put('/agent/image', [UpdateAgentController::class, 'updateImage']);
    Route::put('/agent/{id}', [UpdateAgentController::class, 'updateAgent']);
    Route::delete('/agent', [DeleteAgentController::class, 'deleteAgent']);
    Route::get('/add-agent', [AddAgentController::class, 'addAgentView']);
    Route::post('/agent', [AddAgentController::class, 'addAgent']);
    Route::get('/testemonials', [TestemonialController::class, 'allTestemonials']);
    Route::put('/testemonial/big-image', [TestemonialController::class, 'updateBigImage']);
    Route::put('/testemonial/mini-image', [TestemonialController::class, 'updateMiniImage']);
    Route::get('/testemonial/{id}', [TestemonialController::class, 'singleTestemonial']);
    Route::put('/testemonial/{id}', [TestemonialController::class, 'updateTestemonial']);
    Route::get('/add-testemonial', [TestemonialController::class, 'addTestemonialView']);
    Route::post('/testemonial', [TestemonialController::class, 'addTestemonial']);
    Route::delete('/testemonial', [TestemonialController::class, 'deleteTestemonial']);
    Route::get('/about', [DashboardAboutController::class, 'aboutView']);
    Route::post('/about', [DashboardAboutController::class, 'updateOrCreateAbout']);
    Route::get('/contact', [DashboardContactController::class, 'contactView']);
    Route::post('/contact', [DashboardContactController::class, 'updateOrCreateContact']);
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
