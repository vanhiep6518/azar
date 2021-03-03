<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\ResetPasswordController;
use App\Http\Controllers\Admin\AdminProjectController;
use App\Http\Controllers\Admin\AdminFurnitureController;
use App\Http\Controllers\Admin\AdminConstructionController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminPriceController;
use App\Http\Controllers\Admin\AdminPageController;
use Illuminate\Support\Facades\Route;

Route::match(['get', 'post'], '/login', [LoginController::class, 'login'])->name('admin.login');
Route::get('/logout',[LoginController::class, 'logout'])->name('admin.logout');
Route::match(['get', 'post'], '/send-reset-pass', [LoginController::class, 'sendResetPassword'])->name('admin.send-reset-pass');
Route::match(['get', 'post'], '/reset-pass', [ResetPasswordController::class, 'passwordResetProcess'])->name('admin.reset-pass');
Route::middleware('authAdmin')->name('admin.')->group(function (){
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');

    Route::group(['prefix' => 'project'], function () {
        Route::get('/list/{status?}', [AdminProjectController::class, 'listProject'])->name('project');
        Route::post('/action', [AdminProjectController::class, 'actionProject'])->name('actionProject');

        Route::match(['get', 'post'], '/save/{id?}', [AdminProjectController::class, 'saveProject'])->name('saveProject');
        Route::get('/delete/{id}', [AdminProjectController::class, 'deleteProject'])->name('deleteProject');

        Route::get('/list-cat', [AdminProjectController::class, 'listCat'])->name('projectCat');
        Route::post('/add-cat', [AdminProjectController::class, 'addCat'])->name('addProjectCat');
        Route::post('/update-cat/{id}', [AdminProjectController::class, 'updateCat'])->name('updateProjectCat');
        Route::get('/ajax-edit-cat', [AdminProjectController::class, 'ajaxEditCat']);
        Route::get('/delete-cat/{id}', [AdminProjectController::class, 'deleteCat'])->name('deleteProjectCat');
    });

    Route::group(['prefix' => 'furniture'], function () {
        Route::get('/list/{status?}', [AdminFurnitureController::class, 'listFurniture'])->name('furniture');
        Route::post('/action', [AdminFurnitureController::class, 'actionFurniture'])->name('actionFurniture');

        Route::match(['get', 'post'], '/save/{id?}', [AdminFurnitureController::class, 'saveFurniture'])->name('saveFurniture');

        Route::get('/list-cat', [AdminFurnitureController::class, 'listCat'])->name('furnitureCat');
        Route::post('/add-cat', [AdminFurnitureController::class, 'addCat'])->name('addFurnituresCat');
        Route::post('/update-cat/{id}', [AdminFurnitureController::class, 'updateCat'])->name('updateFurnitureCat');
        Route::get('/ajax-edit-cat', [AdminFurnitureController::class, 'ajaxEditCat']);
        Route::get('/delete-cat/{id}', [AdminFurnitureController::class, 'deleteCat'])->name('deleteFurnitureCat');
    });

    Route::group(['prefix' => 'construction'], function () {
        Route::get('/list/{status?}', [AdminConstructionController::class, 'listConstruction'])->name('construction');
        Route::post('/action', [AdminConstructionController::class, 'actionConstruction'])->name('actionConstruction');

        Route::match(['get', 'post'], '/save/{id?}', [AdminConstructionController::class, 'saveConstruction'])->name('saveConstruction');
        Route::get('/delete/{id}', [AdminConstructionController::class, 'deleteConstruction'])->name('deleteConstruction');

        Route::get('/list-cat', [AdminConstructionController::class, 'listCat'])->name('constructionCat');
        Route::post('/add-cat', [AdminConstructionController::class, 'addCat'])->name('addConstructionCat');
        Route::post('/update-cat/{id}', [AdminConstructionController::class, 'updateCat'])->name('updateConstructionCat');
        Route::get('/ajax-edit-cat', [AdminConstructionController::class, 'ajaxEditCat']);
        Route::get('/delete-cat/{id}', [AdminConstructionController::class, 'deleteCat'])->name('deleteConstructionCat');
    });

    Route::group(['prefix' => 'price'], function () {
        Route::get('/list/{status?}', [AdminPriceController::class, 'listPrice'])->name('price');
        Route::post('/action', [AdminPriceController::class, 'actionPrice'])->name('actionPrice');

        Route::match(['get', 'post'], '/save/{id?}', [AdminPriceController::class, 'savePrice'])->name('savePrice');
        Route::get('/delete/{id}', [AdminPriceController::class, 'deletePrice'])->name('deletePrice');

        Route::get('/list-cat', [AdminPriceController::class, 'listCat'])->name('priceCat');
        Route::post('/add-cat', [AdminPriceController::class, 'addCat'])->name('addPriceCat');
        Route::post('/update-cat/{id}', [AdminPriceController::class, 'updateCat'])->name('updatePriceCat');
        Route::get('/ajax-edit-cat', [AdminPriceController::class, 'ajaxEditCat']);
        Route::get('/delete-cat/{id}', [AdminPriceController::class, 'deleteCat'])->name('deletePriceCat');
    });

    Route::group(['prefix' => 'page'], function () {
        Route::get('/list/{status?}', [AdminPageController::class, 'listPage'])->name('page');
        Route::post('/action', [AdminPageController::class, 'actionPage'])->name('actionPage');

        Route::match(['get', 'post'], '/save/{id?}', [AdminPageController::class, 'savePage'])->name('savePage');
        Route::get('/delete/{id}', [AdminPageController::class, 'deletePage'])->name('deletePage');

    });
});


