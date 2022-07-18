<?php

use App\Models\Order;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdvisorsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TeamScoreController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\TeamBonuseController;
use App\Http\Controllers\AdvisorsTreeController;
use App\Http\Controllers\RankRevisionController;
use App\Http\Controllers\PersonalScoreController;
use App\Http\Controllers\ReferralBonuseController;
use App\Http\Controllers\ConfigTeamBonuseController;
use App\Http\Controllers\ConfigRankLevellingsController;
use App\Http\Controllers\ConfigReferralBonuseController;

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

Route::group([ "middleware" => ['auth:sanctum', 'verified'] ], function() {
    Route::get('/dashboard', [ DashboardController::class, "index" ])->name('dashboard');
    Route::get('/user', [ UserController::class, "index_view" ])->name('user');
    Route::view('/user/new', "pages.user.user-new")->name('user.new');
    Route::view('/user/edit/{userId}', "pages.user.user-edit")->name('user.edit');
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::get('/personalScore', [ PersonalScoreController::class, "create" ])->name('personalScore');
    Route::resource('/advisors', AdvisorsController::class);
    Route::resource('/advisorsTree', AdvisorsTreeController::class);
    Route::resource('/configRankLevellings', ConfigRankLevellingsController::class);
    Route::resource('/configReferralBonuse', ConfigReferralBonuseController::class);
    Route::resource('/configTeamBonuse', ConfigTeamBonuseController::class);
    Route::resource('/order', OrderController::class);
    Route::resource('/personalScore', PersonalScoreController::class);
    Route::resource('/rankRevision', RankRevisionController::class);
    Route::resource('/referralBonuse', ReferralBonuseController::class);
    Route::resource('/teamBonuse', TeamBonuseController::class);
    Route::resource('/teamScore', TeamScoreController::class);
});
