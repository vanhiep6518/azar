<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\HomeController;
use \App\Http\Controllers\ProjectController;
use \App\Http\Controllers\FurnitureController;
use \App\Http\Controllers\ConstructionController;
use \App\Http\Controllers\PageController;
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


Route::get('/', [HomeController::class,'index']);

Route::group(['prefix' => 'du-an','as' => 'project.'], function () {
    Route::get('/',[ProjectController::class,'index'])->name('list');
    Route::get('/{slug}',[ProjectController::class,'projectCat'])->name('cat');
    Route::get('/{cat_slug}/{slug}/{id}',[ProjectController::class,'projectDetail'])->name('detail');
});

Route::group(['prefix' => 'noi-that','as' => 'furniture.'], function () {
    Route::get('/',[FurnitureController::class,'index'])->name('list');
    Route::get('/{slug}',[FurnitureController::class,'projectCat'])->name('cat');
    Route::get('/{cat_slug}/{slug}/{id}',[FurnitureController::class,'projectDetail'])->name('detail');
});

Route::group(['prefix' => 'thi-cong','as' => 'construction.'], function () {
    Route::get('/',[ConstructionController::class,'index'])->name('list');
    Route::get('/{slug}',[ConstructionController::class,'projectCat'])->name('cat');
    Route::get('/{cat_slug}/{slug}/{id}',[ConstructionController::class,'projectDetail'])->name('detail');
});

Route::get('/gioi-thieu',[PageController::class,'introduce'])->name('introduce');



require __DIR__.'/auth.php';

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'authAdmin']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
