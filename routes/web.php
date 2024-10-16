<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;

Route::get('/',[FrontController::class,'index'])->name('front.index');

Route::get('/product/search', [FrontController::class, 'search_product'])->name('front.search.product');

Route::get('/transactions',[FrontController::class,'transactions'])->name('front.transactions');

Route::get('/recipe',[FrontController::class,'recipe'])->name('front.recipe');

Route::get('/recipe/upload',[FrontController::class,'recipe_upload'])->name('front.recipe_upload');

Route::post('/upload/recipe/finish', [FrontController::class, 'recipe_store'])->name('front.recipe_store');

Route::post('/checkout/recipe/{id}', [FrontController::class, 'checkout_recipe'])->name('front.checkout_recipe');

Route::get('/success-checkout-recipe/{transaction:id}',[FrontController::class,'success_checkout_recipe'])->name('front.success.checkout_recipe');

Route::post('/transactions/details',[FrontController::class,'transactions_details'])->name('front.transactions.details');

Route::get('/category/{category:slug}',[FrontController::class,'category'])->name('front.category');

Route::get('/category-all',[FrontController::class,'all_categories'])->name('front.all_categories');

Route::get('/details/{product:slug}',[FrontController::class,'details'])->name('front.details');

Route::get('/checkout/{product:slug}/payment', [FrontController::class, 'checkout'])->name('front.checkout');

Route::post('/checkout/{product:slug}/finish', [FrontController::class, 'checkout_store'])->name('front.checkout_store');

Route::get('/success-booking/{transaction:id}',[FrontController::class,'success_booking'])->name('front.success.booking');

Route::get('/success-upload-recipe/{transaction:id}',[FrontController::class,'success_upload_recipe'])->name('front.success.upload_recipe');