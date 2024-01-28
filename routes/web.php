<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashBoardController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [DashBoardController::class, 'viewdashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// ManageSuppliers
Route::get('/suppliers', 'App\Http\Controllers\ManageSuppliersController@viewpage')->middleware('auth');
Route::post('/registersuppliers', 'App\Http\Controllers\ManageSuppliersController@registersuppliers')->middleware('auth');
Route::get('/registerdsuppliers', 'App\Http\Controllers\ManageSuppliersController@registerdsuppliers')->middleware('auth');
Route::get('/deletesupplier', 'App\Http\Controllers\ManageSuppliersController@deletesuppliers')->middleware('auth');

//ManageCustomers
Route::get('/customers', 'App\Http\Controllers\ManageCustomersController@viewpage')->middleware('auth');
Route::post('/registercustomers', 'App\Http\Controllers\ManageCustomersController@registercustomers')->middleware('auth');
Route::get('/registerdcustomers', 'App\Http\Controllers\ManageCustomersController@registerdcustomers')->middleware('auth');
Route::get('/deletecustomer', 'App\Http\Controllers\ManageCustomersController@deletecustomer')->middleware('auth');


// ManageDeals
Route::get('/buypage/{id}', 'App\Http\Controllers\ProductController@buypage')->middleware('auth');
Route::post('/buyorder', 'App\Http\Controllers\ProductController@buyOrderAndExpenditure')->middleware('auth');


Route::get('/sellpage/{id}', 'App\Http\Controllers\ProductController@sellpage')->middleware('auth');
Route::post('/sellorder', 'App\Http\Controllers\ProductController@sellorderAndRevenue')->middleware('auth');


//products
Route::get('productspage', 'App\Http\Controllers\ProductController@productspage')->middleware('auth');
Route::get('/deleteproduct', 'App\Http\Controllers\ProductController@deleteproduct')->middleware('auth');

//Cashbook
Route::get('/reports', 'App\Http\Controllers\CashBookController@viewcashbook')->middleware('auth');
Route::get('/revenue', 'App\Http\Controllers\CashBookController@revenue')->middleware('auth');
Route::get('/expenditure', 'App\Http\Controllers\CashBookController@expenditure')->middleware('auth');
Route::get('/profit', 'App\Http\Controllers\CashBookController@profit')->middleware('auth');
Route::get('/loss', 'App\Http\Controllers\CashBookController@loss')->middleware('auth');

//Dashboard
// Route::get('/viewdashboard', 'App\Http\Controllers\DashBoardController@viewdashboard')->middleware('auth');





