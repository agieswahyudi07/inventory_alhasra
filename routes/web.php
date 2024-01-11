<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InstitutionController;

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


Route::get('/', [SesiController::class, 'index'])->name('login')->middleware('guest');
Route::get('/login', [SesiController::class, 'index'])->name('login.form')->middleware('guest');
Route::post('/login', [SesiController::class, 'login'])->name('login.submit')->middleware('guest');

Route::get('/home', function () {
    if (Auth::user()->role == 'admin') {
        return redirect()->route('admin.dashboard');
    } elseif (Auth::user()->role == 'user') {
        return redirect()->route('user.dashboard');
    }
});


Route::group(['prefix' => 'admin', 'middleware' => ['roleAcces:admin'], 'as' => 'admin.'], function () {

    Route::get('/dashboard', [DashboardController::class, 'dashboard_admin'])->name('dashboard');
    Route::get('/logout', [SesiController::class, 'logout'])->name('logout');
    Route::get('/register', [SesiController::class, 'register'])->name('register');
    Route::get('/register', [SesiController::class, 'register_store'])->name('register.store');

    // Route Item Room Index
    Route::get('/item_room/{room_id}', [ItemController::class, 'item_room_admin'])->name('item.room');
    Route::get('/item_room/export/{room_id}', [ItemController::class, 'item_room_export'])->name('item.room.export');


    // Route Item
    Route::get('/item', [ItemController::class, 'item_admin'])->name('item');
    Route::get('/item/create', [ItemController::class, 'item_create'])->name('item.create');
    Route::post('/item/store', [ItemController::class, 'item_store'])->name('item.store');
    Route::get('/item/edit/{id}', [ItemController::class, 'item_edit'])->name('item.edit');
    Route::put('/item/update/{id}', [ItemController::class, 'item_update'])->name('item.update');
    Route::get('/item/export/', [ItemController::class, 'item_export'])->name('item.export');
    Route::delete('/item/destroy/{id}', [ItemController::class, 'item_destroy'])->name('item.destroy');

    // Route Institution
    Route::get('/institution', [InstitutionController::class, 'institution_admin'])->name('institution.index');
    Route::get('/institution/edit/{id}', [InstitutionController::class, 'institution_edit'])->name('institution.edit');
    Route::delete('/institution/destroy/{id}', [InstitutionController::class, 'institution_destroy'])->name('institution.destroy');

    // Route Room
    Route::get('/room', [RoomController::class, 'room_admin'])->name('room');
    Route::get('/room/edit/{id}', [RoomController::class, 'room_edit'])->name('room.edit');
    Route::put('/room/update/{id}', [RoomController::class, 'room_update'])->name('room.update');
    Route::get('/room/export/', [RoomController::class, 'room_export'])->name('room.export');
    Route::delete('/room/destroy/{id}', [RoomController::class, 'room_destroy'])->name('room.destroy');

    // Route Room ADD
    Route::get('/office/create', [RoomController::class, 'office_create'])->name('office.create');
    Route::get('/class/create', [RoomController::class, 'class_create'])->name('class.create');
    Route::get('/facilities/create', [RoomController::class, 'facilities_create'])->name('facilities.create');
    // Route Room Store
    Route::post('/office/store', [RoomController::class, 'office_store'])->name('office.store');
    Route::post('/class/store', [RoomController::class, 'class_store'])->name('class.store');
    Route::post('/facilities/store', [RoomController::class, 'facilities_store'])->name('facilities.store');
    // Route Room Edit
    Route::get('/office/edit/{id}', [RoomController::class, 'office_edit'])->name('office.edit');
    Route::get('/class/edit/{id}', [RoomController::class, 'class_edit'])->name('class.edit');
    Route::get('/facilities/edit/{id}', [RoomController::class, 'facilities_edit'])->name('facilities.edit');

    // Route Category
    Route::get('/category', [CategoryController::class, 'category_user'])->name('category');
    Route::get('/category/create', [CategoryController::class, 'category_create'])->name('category.create');
    Route::post('/category/store', [CategoryController::class, 'category_store'])->name('category.store');
    Route::get('/category/edit/{id}', [CategoryController::class, 'category_edit'])->name('category.edit');
    Route::put('/category/update/{id}', [CategoryController::class, 'category_update'])->name('category.update');
    Route::delete('/category/destroy/{id}', [CategoryController::class, 'category_destroy'])->name('category.destroy');

    // Rotue User 
    Route::get('/user', [UserController::class, 'user'])->name('user');
    Route::get('/user/create', [UserController::class, 'user_create'])->name('user.create');
    Route::post('/user/store', [UserController::class, 'user_store'])->name('user.store');
    Route::get('/user/edit/{id}', [UserController::class, 'user_edit'])->name('user.edit');

    Route::get('/user/export', [UserController::class, 'user_export'])->name('user.export');
    Route::delete('/user/destroy/{id}', [UserController::class, 'user_destroy'])->name('user.destroy');


    // API
    Route::get('/api/rooms/{institutionId}', [RoomController::class, 'getRoomsByInstitution']);
});


Route::group(['prefix' => 'user', 'middleware' => ['roleAcces:user'], 'as' => 'user.'], function () {

    Route::get('/dashboard', [DashboardController::class, 'dashboard_user'])->name('dashboard');
    Route::get('/logout', [SesiController::class, 'logout'])->name('logout');

    // Route Item Room Index
    Route::get('/item_room/{room_id}', [ItemController::class, 'item_room_user'])->name('item.room');
    Route::get('/item_room/export/{room_id}', [ItemController::class, 'item_room_export'])->name('item.room.export');

    // Route Item
    Route::get('/item', [ItemController::class, 'item_user'])->name('item');

    // Route Room
    Route::get('/room', [RoomController::class, 'room_user'])->name('room');

    // Route Category
    Route::get('/category', [CategoryController::class, 'category_user'])->name('category');
});
