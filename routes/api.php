<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ApiAuthController;

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

Route::post('loginCashier', 'App\Http\Controllers\ApiAuthController@loginCashier');
Route::post('getTerminalOption', 'App\Http\Controllers\TerminalOptionController@getTerminalOption');
Route::post('getKeyboardDepartments', 'App\Http\Controllers\KeyboardController@getKeyboardDepartments');
Route::get('getKeyboardSubDepartments', 'App\Http\Controllers\KeyboardController@getKeyboardSubDepartments');
Route::get('getKeyboardItems', 'App\Http\Controllers\KeyboardController@getKeyboardItems');
Route::get('getModifireCategories', 'App\Http\Controllers\ItemController@getModifireCategories');
Route::post('getTerminalDetails', 'App\Http\Controllers\TerminalController@getTerminalDetails');
Route::get('getAllItems', 'App\Http\Controllers\ItemController@getItems');
Route::post('getAdvertisementImages', 'App\Http\Controllers\AdvertisementController@getAdvertisementImages');
Route::get('getAllPrinters', 'App\Http\Controllers\PrinterController@getPrinters');
Route::post('getVouchers', 'App\Http\Controllers\VoucherController@getVouchers');
Route::post('addTransactions', 'App\Http\Controllers\TransactionController@store');
Route::post('addTransactionDetails', 'App\Http\Controllers\TransactionDetailController@store');
Route::post('getTransactions', 'App\Http\Controllers\TransactionController@getTransactions');
Route::get('getTransactionId', 'App\Http\Controllers\TransactionController@getTransactionId');
Route::post('getTransactionPaymentDetails', 'App\Http\Controllers\TransactionController@getTransactionPaymentDetails');
Route::post('getTransactionDetails', 'App\Http\Controllers\TransactionDetailController@getTransactionDetails');
Route::get('getMessages', 'App\Http\Controllers\MessageController@getMessages');
Route::post('getLocationDetails', 'App\Http\Controllers\LocationController@getLocationDetails');

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
