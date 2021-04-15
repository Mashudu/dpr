<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\Profile;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\StatusController;
use App\Http\Controllers\Admin\BenefitController;
use App\Http\Controllers\Admin\ProcessController;
use App\Http\Controllers\Admin\BenefitTypeController;
use App\Http\Controllers\Admin\SquadMemberController;
use App\Http\Controllers\Admin\BusinessUnitController;
use App\Http\Controllers\Admin\FunctionalAreaController;
use App\Http\Controllers\Admin\GlossaryController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProcessController as ControllersProcessController;

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

//user  routes
Route::prefix('user')->middleware(['auth'])->name('user.')->group(function(){
    Route::get('profile',Profile::class)->name('profile');
});
//admin routes
Route::prefix('admin')->middleware(['auth','auth.isAdmin'])->name('admin.')->group(function(){
    Route::resource('users',UserController::class);
    Route::resource('business-units',BusinessUnitController::class);
    Route::resource('functional-areas',FunctionalAreaController::class);
    Route::resource('benefit-types',BenefitTypeController::class);
    Route::resource('statuses',StatusController::class);
    Route::resource('processes',ProcessController::class);
    Route::resource('benefits',BenefitController::class);
    Route::resource('squad-members',SquadMemberController::class);
    Route::resource('glossary',GlossaryController::class);
    
});

Route::get('business-units/{id}',[BusinessUnitController::class,'getBusinessUnitByIdFrontEnd'])->name('business-units.index');
Route::get('api/getProcessesByFunctionalAreaSummary/{id}',[BusinessUnitController::class,'getProcessesByFunctionalAreaSummary'])->name('business-units.index');

//custom pages 
Route::get('glossary',[PagesController::class,'glossary'])->name('pages.glossary');
Route::resource('contact',PagesController::class);


Route::get('process/{id}',[ControllersProcessController::class,'getProcessInfo']);
//contact

