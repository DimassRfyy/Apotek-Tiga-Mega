<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;

Route::get('/',[FrontController::class,'index'])->name('front.index');

Route::get('/transactions',[FrontController::class,'transactions'])->name('front.transactions');

Route::post('/transactions/details',[FrontController::class,'transactions_details'])->name('front.transactions.details');

Route::get('/category/{category:slug}',[FrontController::class,'category'])->name('front.category');

Route::get('/category-all',[FrontController::class,'all_categories'])->name('front.all_categories');

Route::get('/details/{product:slug}',[FrontController::class,'details'])->name('front.details');

Route::get('/checkout/{product:slug}/payment', [FrontController::class, 'checkout'])->name('front.checkout');

Route::post('/checkout/{product:slug}/finish', [FrontController::class, 'checkout_store'])->name('front.checkout_store');

Route::get('/success-booking/{transaction:id}',[FrontController::class,'success_booking'])->name('front.success.booking');