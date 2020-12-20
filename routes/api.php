<?php

use App\Http\Controllers\MidItemChecksheetController;
use Illuminate\Http\Request;
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
//Dependent Dropdown
Route::name('api.')->group(function () {
    Route::post('/mid-item-checksheet/dep-top-item', [MidItemChecksheetController::class, 'dependent_top_item_checksheet'])->name('mid-item-checksheet.dep-top-item');
});

