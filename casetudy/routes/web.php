<?php

// use App\Http\Controllers\Admin\CategoryController;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\productController;
use App\Http\Controllers\SendNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
Route::get('products/trashed', [productController::class, 'trashed'])->name('products.trashed');
Route::get('products/restore/{id}', [productController::class, 'restore'])->name('products.restore');
Route::get('products/forceDelete/{id}', [productController::class, 'forceDelete'])->name('products.forceDelete');
Route::get('category/{id}/products', [productController::class, 'getProducts'])->name('category.products');
Route::middleware(['auth'])->group(function () {
    // Route::get('/', [dashboardController::class, 'dashboard']);
    Route::resource('category', CategoryController::class);
    Route::resource('employee', EmployeeController::class);
    Route::resource('product', productController::class);
    Route::get('notify/create', [SendNotification::class, 'create'])->name('notify.create');
    Route::post('notify/store', [SendNotification::class, 'store'])->name('notify.store');
    Route::get('/readed/{id}', [SendNotification::class, 'readed'])->name('readed');
    Route::resource('roles', RoleController::class);
    Route::resource('permission', PermissionController::class);
    Route::get('home/index', [HomeController::class, 'index'])->name('home.index');
    // Route::get('home/messagers', [HomeController::class, 'messagers'])->name('home.messagers');
    // Route::get('home/messagerStore', [HomeController::class, 'messagerStore'])->name('home.messagerStore');
    Route::view('chat', 'Backend.users.messager');

});

require __DIR__.'/auth.php';


Route::namespace('App\Http\Controllers\Admin')->name('admin')->prefix('admin')->group(function(){

});
Route::get('wellcome', function (){
    return view('welcome');
});


