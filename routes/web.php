<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
// use App\Http\Controllers\Item;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\InstitutionController;
use Illuminate\Support\Facades\Route;

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


Route::get('/', [DashboardController::class, 'dashboard_index'])->name('dashboard.index');

// Route Item Room Index
Route::get('/item_room/{room_id}', [ItemController::class, 'item_room_index'])->name('item.room.index');
Route::get('/item_room/export/{room_id}', [ItemController::class, 'item_room_export'])->name('item.room.export');


// Route Item
Route::get('/item', [ItemController::class, 'item_index'])->name('item.index');
Route::get('/item/create', [ItemController::class, 'item_create'])->name('item.create');
Route::post('/item/store', [ItemController::class, 'item_store'])->name('item.store');
Route::get('/item/edit/{id}', [ItemController::class, 'item_edit'])->name('item.edit');
Route::put('/item/update/{id}', [ItemController::class, 'item_update'])->name('item.update');
Route::get('/item/export/', [ItemController::class, 'item_export'])->name('item.export');
Route::delete('/item/destroy/{id}', [ItemController::class, 'item_destroy'])->name('item.destroy');

// Route Institution
Route::get('/institution', [InstitutionController::class, 'institution_index'])->name('institution.index');
Route::get('/institution/edit/{id}', [InstitutionController::class, 'institution_edit'])->name('institution.edit');
Route::delete('/institution/destroy/{id}', [InstitutionController::class, 'institution_destroy'])->name('institution.destroy');

// Route Room
Route::get('/room', [RoomController::class, 'room_index'])->name('room.index');
Route::get('/room/edit/{id}', [RoomController::class, 'room_edit'])->name('room.edit');
Route::put('/room/update/{id}', [RoomController::class, 'room_update'])->name('room.update');
Route::get('/room/export/', [RoomController::class, 'room_export'])->name('room.export');
Route::delete('/room/destroy/{id}', [RoomController::class, 'room_destroy'])->name('room.destroy');

// Route Category
Route::get('/category', [CategoryController::class, 'category_index'])->name('category.index');
Route::get('/category/create', [CategoryController::class, 'category_create'])->name('category.create');
Route::post('/category/store', [CategoryController::class, 'category_store'])->name('category.store');
Route::get('/category/edit/{id}', [CategoryController::class, 'category_edit'])->name('category.edit');
Route::put('/category/update/{id}', [CategoryController::class, 'category_update'])->name('category.update');
Route::delete('/category/destroy/{id}', [CategoryController::class, 'category_destroy'])->name('category.destroy');

// API
Route::get('/api/rooms/{institutionId}', [RoomController::class, 'getRoomsByInstitution']);


Route::get('/office/create', [RoomController::class, 'office_create'])->name('office.create');
Route::get('/class/create', [RoomController::class, 'class_create'])->name('class.create');
Route::get('/facilities/create', [RoomController::class, 'facilities_create'])->name('facilities.create');
Route::post('/office/store', [RoomController::class, 'office_store'])->name('office.store');
Route::post('/class/store', [RoomController::class, 'class_store'])->name('class.store');
Route::post('/facilities/store', [RoomController::class, 'facilities_store'])->name('facilities.store');
Route::get('/office/edit/{id}', [RoomController::class, 'office_edit'])->name('office.edit');
Route::get('/class/edit/{id}', [RoomController::class, 'class_edit'])->name('class.edit');
Route::get('/facilities/edit/{id}', [RoomController::class, 'facilities_edit'])->name('facilities.edit');
