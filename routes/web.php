<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\HomeController;
use \App\Http\Controllers\ProjectController;
use \App\Http\Controllers\FurnitureController;
use \App\Http\Controllers\ConstructionController;
use \App\Http\Controllers\PageController;
use \App\Http\Controllers\PriceController;
use \App\Http\Controllers\OrderController;
use \App\Http\Controllers\ConstructionProgressController;
use \App\Http\Controllers\FengShuiController;
use \App\Http\Controllers\AdviceController;
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

Route::get('/migrate', function () {
    Artisan::call('migrate');
    return 'success';
});

Route::get('/rollback', function () {
    Artisan::call('migrate:rollback');
    return 'success';
});


Route::get('/clear', function () {
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    return 'success';
});


Route::get('/', [HomeController::class,'index'])->name('home');

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
Route::get('/quy-trinh-thi-cong',[ConstructionController::class,'constructionProgress'])->name('procProgress');


Route::get('/tim-kiem-tien-do',[ConstructionProgressController::class,'index'])->name('conProgress');
Route::get('/tien-do-thi-cong',[ConstructionProgressController::class,'store'])->name('storeProgress');

Route::group(['prefix' => 'bang-gia','as' => 'price.'], function () {
    Route::get('/{slug}/{id}',[PriceController::class,'index'])->name('detail');
});

Route::get('/gioi-thieu',[PageController::class,'introduce'])->name('introduce');

Route::get('/bao-gia-thiet-ke',[PriceController::class,'reportDesignPrice']);
Route::get('/bao-gia-thi-cong',[PriceController::class,'reportConstructionPrice']);

Route::get('/hop-dong-thiet-ke',[PriceController::class,'contractDesign']);
Route::get('/hop-dong-thi-cong-doi-tac',[PriceController::class,'partnerContract']);
Route::get('/hop-dong-thi-cong-khach-hang',[PriceController::class,'customerContract']);
Route::get('/hop-dong-thi-cong-noi-that',[PriceController::class,'furnitureContract']);

Route::group(['prefix' => 'shop','as' => 'shop.'], function () {
    Route::get('/',[OrderController::class,'index'])->name('index');
    Route::get('/{cat_slug}',[OrderController::class,'cat'])->name('cat');
    Route::get('/{cat_slug}/{product_slug}/{id}',[OrderController::class,'detailProduct'])->name('detailProduct');

});

Route::group(['prefix' => 'cart','as' => 'cart.'], function () {
    Route::get('/',[OrderController::class,'cart'])->name('cart');
    Route::get('/checkout',[OrderController::class,'checkout'])->name('checkout');

    Route::match(['get', 'post'],'/add/{id}',[OrderController::class,'addToCart'])->name('add');
    Route::get('/delete/{rowId}',[OrderController::class,'delete'])->name('delete');
    Route::post('/update',[OrderController::class,'update'])->name('update');
    Route::get('/deleteAll',[OrderController::class,'deleteAll'])->name('deleteAll');
    Route::get('/buyNow/{id}',[OrderController::class,'buyNow'])->name('buyNow');

    Route::post('/order',[OrderController::class,'order'])->name('order');
});

Route::group(['as' => 'fengshui.'], function () {
    Route::match(['get','post'],'/xem-huong-nha',[FengShuiController::class,'houseDirection'])->name('house');
    Route::match(['get','post'],'/xem-huong-bep',[FengShuiController::class,'kitchenDirection'])->name('kitchen');
    Route::match(['get','post'],'/xem-mau-hop-menh',[FengShuiController::class,'color'])->name('color');
    Route::match(['get','post'],'/xem-tuoi-xay-nha',[FengShuiController::class,'yearBuild'])->name('yearBuild');
    Route::get('/thuoc-lo-ban',[FengShuiController::class,'ruler'])->name('ruler');
});

Route::post('/send-advice',[AdviceController::class,'sendAdvice'])->name('sendAdvice');

require __DIR__.'/auth.php';

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'authAdmin']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
