<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\LocationTableDetailsController;
use App\Http\Controllers\PriceLevelController;
use App\Http\Controllers\ModifiersCategoryController;
use App\Http\Controllers\ModifierController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PrinterGroupController;
use App\Http\Controllers\PrinterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\TaxController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\TerminalController;
use App\Http\Controllers\KeyboardController;
use App\Http\Controllers\TerminalOptionController;
use App\Http\Controllers\TerminalOptionDetailController;
use App\Http\Controllers\VoucherTypeController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\KeyboardItemController;
// use App\Http\Controllers\KeyboardSubDepartmentController;
use App\Http\Controllers\AdvertisementController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return redirect('/admin');
});

Auth::routes();

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('/settings', [SettingController::class, 'store'])->name('settings.store');
    Route::resource('account', AccountController::class);
    Route::resource('message', MessageController::class);
    Route::resource('department', DepartmentController::class);
    Route::resource('item', ItemController::class);
    Route::resource('location', LocationController::class);
    Route::resource('location_table_details', LocationTableDetailsController::class);
    Route::resource('tax', TaxController::class);
    Route::resource('user', UserController::class);
    Route::resource('role', RoleController::class);
    Route::resource('unit', UnitController::class);
    Route::resource('terminal_option_detail', TerminalOptionDetailController::class);
    Route::resource('terminal', TerminalController::class);
    Route::resource('terminal_option', TerminalOptionController::class);
    Route::resource('keyboard', KeyboardController::class);
    Route::resource('voucher_type', VoucherTypeController::class);
    Route::resource('voucher', VoucherController::class);
    Route::resource('modifiers_category', ModifiersCategoryController::class);
    Route::resource('modifier', ModifierController::class);
    Route::resource('permission', PermissionController::class);
    Route::resource('price_level', PriceLevelController::class);
    Route::resource('printer_group', PrinterGroupController::class);
    Route::resource('printer', PrinterController::class);
    Route::resource('products', ProductController::class);
    Route::resource('customers', CustomerController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('keyboard_item', KeyboardItemController::class);
    Route::resource('advertisement', AdvertisementController::class);

    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
    Route::post('/cart/change-qty', [CartController::class, 'changeQty']);
    Route::delete('/cart/delete', [CartController::class, 'delete']);
    Route::delete('/cart/empty', [CartController::class, 'empty']);

    Route::get('/new_location', [LocationController::class, 'newLocation'])->name('location.new_location');
    Route::get('/new_modifiers_category', [ModifiersCategoryController::class, 'newModifiersCategory'])->name('modifiers_category.new_modifiers_category');
    Route::get('/new_printer_group', [PrinterGroupController::class, 'newPrinterGroup'])->name('printer_group.new_printer_group');
    Route::get('/new_terminal', [TerminalOptionDetailController::class, 'newTerminal'])->name('terminal.new_terminal');

    // Show Keyboard details
    Route::get('/get_sub_departments/{keyboard_id}/{keyboard_department_id?}/{keyboard_sub_department_id?}', [KeyboardController::class, 'getSubDepartment'])->name('keyboard.get_sub_departments');


    Route::post('/keyboard_item/{keyboard_item_id}', [KeyboardItemController::class, 'update']);
    Route::post('/keyboard_item/delete/{keyboard_item_id}', [KeyboardItemController::class, 'destroy']);

    // For Keyboard Modals
    Route::get('/get_department/{keyboard_department_id}', [KeyboardController::class, 'getDepartment']);
    Route::post('/update_keyboard_department', [KeyboardController::class, 'updateDepartment']);
    Route::post('/delete_department/{keyboard_department_id}', [KeyboardController::class, 'deleteDepartment']);

    Route::get('/get_sub_department/{keyboard_sub_department_id}', [KeyboardController::class, 'getSub']);
    Route::post('/update_keyboard_sub_department', [KeyboardController::class, 'updateSubDepartment']);
    Route::post('/store_keyboard_sub_department', [KeyboardController::class, 'storeKeyboardSubDepartment']);
    Route::post('/keyboard_sub_department/delete/{keyboard_sub_department_id}', [KeyboardController::class, 'deleteKeyboardSubDepartment']);


    Route::post('terminal_option_details_type_update', [TerminalOptionDetailController::class, 'updatetype'])->name('terminal_option_details.updatetype');

    // Routes for search
    Route::get('/search_department', [DepartmentController::class, 'search'])->name('department.search');
    Route::get('/search_item', [ItemController::class, 'search'])->name('item.search');
    Route::get('/search_location', [LocationController::class, 'search'])->name('location.search');
    Route::get('/search_unit', [UnitController::class, 'search'])->name('unit.search');
    Route::get('/search_role', [RoleController::class, 'search'])->name('role.search');
    Route::get('/search_user', [UserController::class, 'search'])->name('user.search');
    Route::get('/search_terminal_option_detail', [TerminalOptionDetailController::class, 'search'])->name('terminal_option_detail.search');
    Route::get('/search_terminal', [TerminalController::class, 'search'])->name('terminal.search');
    Route::get('/search_keyboard', [KeyboardController::class, 'search'])->name('keyboard.search');
    Route::get('/search_tax', [TaxController::class, 'search'])->name('tax.search');
    Route::get('/search_printer_group', [PrinterGroupController::class, 'search'])->name('printer_group.search');
    Route::get('/search_price_level', [PriceLevelController::class, 'search'])->name('price_level.search');
    Route::get('/search_modifiers_category', [ModifiersCategoryController::class, 'search'])->name('modifiers_category.search');
    Route::get('/search_voucher_type', [VoucherTypeController::class, 'search'])->name('voucher_type.search');
    Route::get('/search_voucher', [VoucherController::class, 'search'])->name('voucher.search');
    Route::get('/search_account', [AccountController::class, 'search'])->name('account.search');
    Route::get('/search_message', [MessageController::class, 'search'])->name('message.search');

    Route::group(['prefix' => 'reports','as'=>'report.'],function (){
        Route::get('/index',[ReportsController::class,'index'])->name('index');
        Route::get('/action/{slug}',[ReportsController::class,'action'])->name('action');
        Route::post('/report-generate/{slug}',[ReportsController::class,'generateReport'])->name('report-generate');
    });
});
