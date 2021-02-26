<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\ResetPasswordController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\FurnitureController;
use App\Http\Controllers\Admin\ConstructionController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

Route::match(['get', 'post'], '/login', [LoginController::class, 'login'])->name('admin.login');
Route::get('/logout',[LoginController::class, 'logout'])->name('admin.logout');
Route::match(['get', 'post'], '/send-reset-pass', [LoginController::class, 'sendResetPassword'])->name('admin.send-reset-pass');
Route::match(['get', 'post'], '/reset-pass', [ResetPasswordController::class, 'passwordResetProcess'])->name('admin.reset-pass');
Route::middleware('authAdmin')->name('admin.')->group(function (){
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::group(['prefix' => 'project'], function () {
        Route::get('/list/{status?}', [ProjectController::class, 'listProject'])->name('project');
        Route::post('/action', [ProjectController::class, 'actionProject'])->name('actionProject');

        Route::match(['get', 'post'], '/save/{id?}', [ProjectController::class, 'saveProject'])->name('saveProject');
        Route::get('/delete/{id}', [ProjectController::class, 'deleteProject'])->name('deleteProject');

        Route::get('/list-cat', [ProjectController::class, 'listCat'])->name('projectCat');
        Route::post('/add-cat', [ProjectController::class, 'addCat'])->name('addProjectCat');
        Route::post('/update-cat/{id}', [ProjectController::class, 'updateCat'])->name('updateProjectCat');
        Route::get('/ajax-edit-cat', [ProjectController::class, 'ajaxEditCat']);
        Route::get('/delete-cat/{id}', [ProjectController::class, 'deleteCat'])->name('deleteProjectCat');
    });

    Route::group(['prefix' => 'furniture'], function () {
        Route::get('/list/{status?}', [FurnitureController::class, 'listFurniture'])->name('furniture');
        Route::post('/action', [FurnitureController::class, 'actionProject'])->name('actionProject');

        Route::match(['get', 'post'], '/save/{id?}', [FurnitureController::class, 'saveFurniture'])->name('saveFurniture');

        Route::get('/list-cat', [FurnitureController::class, 'listCat'])->name('furnitureCat');
        Route::post('/add-cat', [FurnitureController::class, 'addCat'])->name('addFurnituresCat');
        Route::post('/update-cat/{id}', [FurnitureController::class, 'updateCat'])->name('updateFurnitureCat');
        Route::get('/ajax-edit-cat', [FurnitureController::class, 'ajaxEditCat']);
        Route::get('/delete-cat/{id}', [FurnitureController::class, 'deleteCat'])->name('deleteFurnitureCat');
    });

    Route::group(['prefix' => 'construction'], function () {
        Route::get('/list/{status?}', [ConstructionController::class, 'listConstruction'])->name('construction');
        Route::post('/action', [ConstructionController::class, 'actionConstruction'])->name('actionConstruction');

        Route::match(['get', 'post'], '/save/{id?}', [ConstructionController::class, 'saveConstruction'])->name('saveConstruction');
        Route::get('/delete/{id}', [ConstructionController::class, 'deleteConstruction'])->name('deleteConstruction');

        Route::get('/list-cat', [ConstructionController::class, 'listCat'])->name('constructionCat');
        Route::post('/add-cat', [ConstructionController::class, 'addCat'])->name('addConstructionCat');
        Route::post('/update-cat/{id}', [ConstructionController::class, 'updateCat'])->name('updateConstructionCat');
        Route::get('/ajax-edit-cat', [ConstructionController::class, 'ajaxEditCat']);
        Route::get('/delete-cat/{id}', [ConstructionController::class, 'deleteCat'])->name('deleteConstructionCat');
    });
});


