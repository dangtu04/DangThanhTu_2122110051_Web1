<?php

use App\Http\Controllers\backend\BannerController as AdBannerController;
use App\Http\Controllers\backend\BrandController as AdBrandController;
use App\Http\Controllers\backend\CategoryController as AdCategoryController;
use App\Http\Controllers\backend\DashBoardController;
use App\Http\Controllers\backend\MenuController as AdMenuController;
use App\Http\Controllers\backend\PostController as AdPostController;
use App\Http\Controllers\backend\TopicController as AdTopicController;
use App\Http\Controllers\backend\UserController as AdUserController;
use App\Http\Controllers\backend\ContactController as AdContactController;
use App\Http\Controllers\backend\ProductController as AdProductController;
use App\Http\Controllers\backend\OrderController as AdOrderController;


use App\Http\Controllers\frontend\ContactController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class ,'index']);
Route::get('san-pham',[ProductController::class ,'index']);
Route::get('chi-tiet-san-pham/{slug}',[ProductController::class ,'product_detail']);
Route::get('lien-he',[ContactController::class ,'index']);

// Route::prefix('admin')->group(function () {
//     Route::get("/", [DashBoardController::class, 'index'])->name('dashboard.index');
// });

//route admin
Route::prefix("admin")->group(function(){
    Route::get("/", [DashboardController::class, 'index'])->name('admin.dashboard');

// product
Route::prefix("product")->group(function(){
    Route::get("/", [AdProductController::class, 'index'])->name('admin.product.index');
    Route::get("trash", [AdProductController::class, 'trash'])->name('admin.product.trash');
    Route::get("show/{id}", [AdProductController::class, 'show'])->name('admin.product.show');
    Route::get("create", [AdProductController::class, 'create'])->name('admin.product.create');
    Route::post("store", [AdProductController::class, 'store'])->name('admin.product.store');
    Route::get("edit/{id}", [AdProductController::class, 'edit'])->name('admin.product.edit');
    Route::put("update/{id}", [AdProductController::class, 'update'])->name('admin.product.update');
    Route::get("status/{id}", [AdProductController::class, 'status'])->name('admin.product.status');
    Route::get("delete/{id}", [AdProductController::class, 'delete'])->name('admin.product.delete');
    Route::get("restore/{id}", [AdProductController::class, 'restore'])->name('admin.product.restore');
    Route::delete("destroy/{id}", [AdProductController::class, 'destroy'])->name('admin.product.destroy');
});

// category 
Route::prefix("category")->group(function(){
    Route::get("/", [AdCategoryController::class, 'index'])->name('admin.category.index');
    Route::get("trash", [AdCategoryController::class, 'trash'])->name('admin.category.trash');
    Route::get("show/{id}", [AdCategoryController::class, 'show'])->name('admin.category.show');
    Route::get("create", [AdCategoryController::class, 'create'])->name('admin.category.create');
    Route::post("store", [AdCategoryController::class, 'store'])->name('admin.category.store');
    Route::get("edit/{id}", [AdCategoryController::class, 'edit'])->name('admin.category.edit');
    Route::put("update/{id}", [AdCategoryController::class, 'update'])->name('admin.category.update');
    Route::get("status/{id}", [AdCategoryController::class, 'status'])->name('admin.category.status');
    Route::get("delete/{id}", [AdCategoryController::class, 'delete'])->name('admin.category.delete');
    Route::get("restore/{id}", [AdCategoryController::class, 'restore'])->name('admin.category.restore');
    Route::delete("destroy/{id}", [AdCategoryController::class, 'destroy'])->name('admin.category.destroy');
});

// brand 
Route::prefix("brand")->group(function(){
    Route::get("/", [AdBrandController::class, 'index'])->name('admin.brand.index');
    Route::get("trash", [AdBrandController::class, 'trash'])->name('admin.brand.trash');
    Route::get("show/{id}", [AdBrandController::class, 'show'])->name('admin.brand.show');
    Route::get("create", [AdBrandController::class, 'create'])->name('admin.brand.create');
    Route::post("store", [AdBrandController::class, 'store'])->name('admin.brand.store');
    Route::get("edit/{id}", [AdBrandController::class, 'edit'])->name('admin.brand.edit');
    Route::put("update/{id}", [AdBrandController::class, 'update'])->name('admin.brand.update');
    Route::get("status/{id}", [AdBrandController::class, 'status'])->name('admin.brand.status');
    Route::get("delete/{id}", [AdBrandController::class, 'delete'])->name('admin.brand.delete');
    Route::get("restore/{id}", [AdBrandController::class, 'restore'])->name('admin.brand.restore');
    Route::delete("destroy/{id}", [AdBrandController::class, 'destroy'])->name('admin.brand.destroy');
});

// contact 
Route::prefix("contact")->group(function(){
    Route::get("/", [AdContactController::class, 'index'])->name('admin.contact.index');
    Route::get("trash", [AdContactController::class, 'trash'])->name('admin.contact.trash');
    Route::get("show/{id}", [AdContactController::class, 'show'])->name('admin.contact.show');
    Route::get("create", [AdContactController::class, 'create'])->name('admin.contact.create');
    Route::post("store", [AdContactController::class, 'store'])->name('admin.contact.store');
    Route::get("edit/{id}", [AdContactController::class, 'edit'])->name('admin.contact.edit');
    Route::put("update/{id}", [AdContactController::class, 'update'])->name('admin.contact.update');
    Route::get("status/{id}", [AdContactController::class, 'status'])->name('admin.contact.status');
    Route::get("delete/{id}", [AdContactController::class, 'delete'])->name('admin.contact.delete');
    Route::get("restore/{id}", [AdContactController::class, 'restore'])->name('admin.contact.restore');
    Route::delete("destroy/{id}", [AdContactController::class, 'destroy'])->name('admin.contact.destroy');
});

// banner 
Route::prefix("banner")->group(function(){
    Route::get("/", [AdBannerController::class, 'index'])->name('admin.banner.index');
    Route::get("trash", [AdBannerController::class, 'trash'])->name('admin.banner.trash');
    Route::get("show/{id}", [AdBannerController::class, 'show'])->name('admin.banner.show');
    Route::get("create", [AdBannerController::class, 'create'])->name('admin.banner.create');
    Route::post("store", [AdBannerController::class, 'store'])->name('admin.banner.store');
    Route::get("edit/{id}", [AdBannerController::class, 'edit'])->name('admin.banner.edit');
    Route::put("update/{id}", [AdBannerController::class, 'update'])->name('admin.banner.update');
    Route::get("status/{id}", [AdBannerController::class, 'status'])->name('admin.banner.status');
    Route::get("delete/{id}", [AdBannerController::class, 'delete'])->name('admin.banner.delete');
    Route::get("restore/{id}", [AdBannerController::class, 'restore'])->name('admin.banner.restore');
    Route::delete("destroy/{id}", [AdBannerController::class, 'destroy'])->name('admin.banner.destroy');
});


// post 
Route::prefix("post")->group(function(){
    Route::get("/", [AdPostController::class, 'index'])->name('admin.post.index');
    Route::get("trash", [AdPostController::class, 'trash'])->name('admin.post.trash');
    Route::get("show/{id}", [AdPostController::class, 'show'])->name('admin.post.show');
    Route::get("create", [AdPostController::class, 'create'])->name('admin.post.create');
    Route::post("store", [AdPostController::class, 'store'])->name('admin.post.store');
    Route::get("edit/{id}", [AdPostController::class, 'edit'])->name('admin.post.edit');
    Route::put("update/{id}", [AdPostController::class, 'update'])->name('admin.post.update');
    Route::get("status/{id}", [AdPostController::class, 'status'])->name('admin.post.status');
    Route::get("delete/{id}", [AdPostController::class, 'delete'])->name('admin.post.delete');
    Route::get("restore/{id}", [AdPostController::class, 'restore'])->name('admin.post.restore');
    Route::delete("destroy/{id}", [AdPostController::class, 'destroy'])->name('admin.post.destroy');
});

// topic 
Route::prefix("topic")->group(function(){
    Route::get("/", [AdTopicController::class, 'index'])->name('admin.topic.index');
    Route::get("trash", [AdTopicController::class, 'trash'])->name('admin.topic.trash');
    Route::get("show/{id}", [AdTopicController::class, 'show'])->name('admin.topic.show');
    Route::get("create", [AdTopicController::class, 'create'])->name('admin.topic.create');
    Route::post("store", [AdTopicController::class, 'store'])->name('admin.topic.store');
    Route::get("edit/{id}", [AdTopicController::class, 'edit'])->name('admin.topic.edit');
    Route::put("update/{id}", [AdTopicController::class, 'update'])->name('admin.topic.update');
    Route::get("status/{id}", [AdTopicController::class, 'status'])->name('admin.topic.status');
    Route::get("delete/{id}", [AdTopicController::class, 'delete'])->name('admin.topic.delete');
    Route::get("restore/{id}", [AdTopicController::class, 'restore'])->name('admin.topic.restore');
    Route::delete("destroy/{id}", [AdTopicController::class, 'destroy'])->name('admin.topic.destroy');
});


// order 
Route::prefix("order")->group(function(){
    Route::get("/", [AdOrderController::class, 'index'])->name('admin.order.index');
    Route::get("trash", [AdOrderController::class, 'trash'])->name('admin.order.trash');
    Route::get("show/{id}", [AdOrderController::class, 'show'])->name('admin.order.show');
    Route::get("create", [AdOrderController::class, 'create'])->name('admin.order.create');
    Route::post("store", [AdOrderController::class, 'store'])->name('admin.order.store');
    Route::get("edit/{id}", [AdOrderController::class, 'edit'])->name('admin.order.edit');
    Route::put("update/{id}", [AdOrderController::class, 'update'])->name('admin.order.update');
    Route::get("status/{id}", [AdOrderController::class, 'status'])->name('admin.order.status');
    Route::get("delete/{id}", [AdOrderController::class, 'delete'])->name('admin.order.delete');
    Route::get("restore/{id}", [AdOrderController::class, 'restore'])->name('admin.order.restore');
    Route::delete("destroy/{id}", [AdOrderController::class, 'destroy'])->name('admin.order.destroy');
});

// menu 
Route::prefix("menu")->group(function(){
    Route::get("/", [AdMenuController::class, 'index'])->name('admin.menu.index');
    Route::get("trash", [AdMenuController::class, 'trash'])->name('admin.menu.trash');
    Route::get("show/{id}", [AdMenuController::class, 'show'])->name('admin.menu.show');
    Route::get("create", [AdMenuController::class, 'create'])->name('admin.menu.create');
    Route::post("store", [AdMenuController::class, 'store'])->name('admin.menu.store');
    Route::get("edit/{id}", [AdMenuController::class, 'edit'])->name('admin.menu.edit');
    Route::put("update/{id}", [AdMenuController::class, 'update'])->name('admin.menu.update');
    Route::get("status/{id}", [AdMenuController::class, 'status'])->name('admin.menu.status');
    Route::get("delete/{id}", [AdMenuController::class, 'delete'])->name('admin.menu.delete');
    Route::get("restore/{id}", [AdMenuController::class, 'restore'])->name('admin.menu.restore');
    Route::delete("destroy/{id}", [AdMenuController::class, 'destroy'])->name('admin.menu.destroy');
});

// user
Route::prefix("user")->group(function(){
    Route::get("/", [AdUserController::class, 'index'])->name('admin.user.index');
    Route::get("trash", [AdUserController::class, 'trash'])->name('admin.user.trash');
    Route::get("show/{id}", [AdUserController::class, 'show'])->name('admin.user.show');
    Route::get("create", [AdUserController::class, 'create'])->name('admin.user.create');
    Route::post("store", [AdUserController::class, 'store'])->name('admin.user.store');
    Route::get("edit/{id}", [AdUserController::class, 'edit'])->name('admin.user.edit');
    Route::put("update/{id}", [AdUserController::class, 'update'])->name('admin.user.update');
    Route::get("status/{id}", [AdUserController::class, 'status'])->name('admin.user.status');
    Route::get("delete/{id}", [AdUserController::class, 'delete'])->name('admin.user.delete');
    Route::get("restore/{id}", [AdUserController::class, 'restore'])->name('admin.user.restore');
    Route::delete("destroy/{id}", [AdUserController::class, 'destroy'])->name('admin.user.destroy');
});



});