<?php

use App\Http\Controllers\ContentDataController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RatingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/change-password', [ProfileController::class, 'changePassword']);
Route::post('/ranking', [RatingController::class, 'updateRanking']);

Route::controller(ContentDataController::class)->group(function () {
    Route::get('/getHomepageContent', 'getHomepageContent');
    Route::get('/getHomepageSortedContent', 'getHomepageSortedContent');
    Route::get('/getNewContent', 'getNewContent');
});