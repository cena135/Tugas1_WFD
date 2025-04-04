<?php

use App\Http\Controllers\PromotionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('promotion.index');
});

Route::get('/detail/{id}', [
    PromotionController::class,
    'detail'
])->name('promotion.detail');

Route::resource('promotion', PromotionController::class);
