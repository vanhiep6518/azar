<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\ResetPasswordController;
use App\Http\Controllers\Admin\ProjectController;
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

        Route::get('/list-cat', [ProjectController::class, 'listCat'])->name('projectCat');
        Route::post('/add-cat', [ProjectController::class, 'addCat'])->name('addProjectCat');
        Route::post('/update-cat/{id}', [ProjectController::class, 'updateCat'])->name('updateProjectCat');
        Route::get('/ajax-edit-cat', [ProjectController::class, 'ajaxEditCat']);
        Route::get('/delete-cat/{id}', [ProjectController::class, 'deleteCat'])->name('deleteProjectCat');
    });
});


