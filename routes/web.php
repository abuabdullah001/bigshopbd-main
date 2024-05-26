<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\GeneralController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ProfileController;

Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('/category/{slug}', [FrontendController::class, 'showCategory'])->name('category.product.show');
Route::get('/product/{slug}', [FrontendController::class, 'showProduct'])->name('product.show');
Route::get('/search/index', [FrontendController::class, 'productSearch'])->name('search.index');

Route::controller(CartController::class)->group(function ()
{
    Route::get('/checkout', 'productCartView')->name('checkout');
    Route::post('/product/addToCart', 'productAddCart');
    Route::post('/product/orderNow', 'orderNow')->name('order.now');
    Route::get('/product/productCartRemove/{id}', 'productCartRemove');
    Route::post('/cart/update/{id}', 'cartUpdate');
});

Route::post('/confirm/order', [OrderController::class, 'confirmOrder'])->name('order.confirm');

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'adminDashboard'])->name('dashboard');
    
    Route::controller(ProductController::class)->group(function ()
    {
        Route::get('/products/index', 'index')->name('product.index');
        Route::get('/products/create', 'create')->name('products.create');
        Route::post('/product/store', 'store')->name('product.store');
        Route::get('/product/edit/{id}', 'edit')->name('product.edit');
        Route::patch('/products/update/{id}', 'update')->name('product.update');
        Route::get('/product/destroy/{id}', 'destroy')->name('product.destroy');
    });

    Route::resource('/categories', CategoryController::class);
    Route::get('/cat-status{category}', [CategoryController::class, 'change_status']);

    Route::resource('/brands', BrandController::class);
    Route::get('/brand-status{brand}', [BrandController::class, 'change_status']);

    Route::controller(OrderController::class)->group(function ()
    {
        Route::get('/order', 'orders')->name('order.manage');
        Route::get('/manage/edit/{id}', 'orderEdit')->name('order.edit');
        Route::post('/order/update/{id}', 'orderUpdate')->name('order.update');
        Route::get('/order/invoice/{id}', 'orderInvoice')->name('order.invoice');
    });

    Route::controller(GeneralController::class)->group(function ()
    {
        Route::get('/site/settings', 'index')->name('site.settings');
        Route::patch('/site/update/{id}', 'update')->name('settings.general.update');
        Route::patch('/quicklinks/update/{id}', 'updateQuickLinks')->name('settings.quicklinks.update');
        Route::patch('/sociallinks/update/{id}', 'updateSocialLinks')->name('settings.sociallinks.update');
        Route::get('/sliders', 'slider')->name('sliders');
        Route::get('/slider/create', 'sliderCreate')->name('slider.create');
        Route::post('/slider/store', 'sliderStore')->name('slider.store');
        Route::get('/slider/edit/{slider}', 'sliderEdit')->name('slider.edit');
        Route::patch('/slider/update/{slider}', 'sliderUpdate')->name('slider.update');
        Route::get('/slider/destroy/{slider}', 'sliderDestroy')->name('slider.destroy');
    });

    Route::controller(ProfileController::class)->group(function ()
    {
        Route::get('/profile/settings', 'index')->name('profile.settings');
        Route::patch('/profile', 'update')->name('profile.update');
    });

});