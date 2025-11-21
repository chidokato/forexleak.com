<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\Users\UserController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\PromotionController;
use App\Http\Controllers\Admin\DepositTransactionController;

use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Auth\GoogleController;

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\HomeSystemController;

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
     \UniSharp\LaravelFilemanager\Lfm::routes();
 });

Route::get('admin', [LoginController::class, 'index'])->name('login');
Route::post('admin', [LoginController::class, 'store']);
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::post('account/register', [LoginController::class, 'register'])->name('register');

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('google.callback');

Route::post('/upload', [UploadController::class, 'upload'])->name('upload');


// ajax
Route::group(['prefix'=>'ajax'],function(){
    Route::get('change_province/{id}', [AjaxController::class, 'change_province']);
    Route::get('change_district/{id}', [AjaxController::class, 'change_district']);
    Route::get('change_district_street/{id}', [AjaxController::class, 'change_district_street']);
    Route::get('change_SortBy/{id}', [AjaxController::class, 'change_SortBy']);
    Route::get('change_parent/{id}', [AjaxController::class, 'change_parent']);
    Route::get('update_category_view/{id}/{view}', [AjaxController::class, 'update_category_view']);
    Route::get('update_menu_view/{id}/{view}', [AjaxController::class, 'update_menu_view']);
    Route::get('del_img_detail/{id}', [AjaxController::class, 'del_img_detail']);
    Route::get('name_img_detail/{id}/{name}', [AjaxController::class, 'name_img_detail']);
    Route::get('del_section/{id}', [AjaxController::class, 'del_section']);
    Route::get('update_status_category/{id}/{status}', [AjaxController::class, 'update_status_category']);
    Route::get('update_status_post/{id}/{status}', [AjaxController::class, 'update_status_post']);
    Route::get('update_status_province/{id}/{status}', [AjaxController::class, 'update_status_province']);
    Route::get('update_home_province/{id}/{status}', [AjaxController::class, 'update_home_province']);
    Route::get('update_hot_post/{id}/{hot}', [AjaxController::class, 'update_hot_post']);
    Route::get('change_category/{id}', [AjaxController::class, 'change_category']);
    Route::get('change_arrange_mat/{id}', [AjaxController::class, 'change_arrange_mat']);
    Route::get('change_arrange_day/{id}', [AjaxController::class, 'change_arrange_day']);
    Route::get('change_arrange_khoa/{id}', [AjaxController::class, 'change_arrange_khoa']);
    Route::get('change_arrange_cat/{id}/{catid}', [AjaxController::class, 'change_arrange_cat']);
});



Route::prefix('admin')->group(function () {
    Route::middleware(['admin:1'])->group(function () {
        Route::resource('users',UserController::class);
        Route::resource('cart',CartController::class);
        Route::resource('customer',CustomerController::class);
        Route::resource('deposits',DepositTransactionController::class);
        Route::post('deposits/{deposit}/approve', [DepositTransactionController::class, 'approve'])->name('deposits.approve');
        Route::post('deposits/{deposit}/reject', [DepositTransactionController::class, 'reject'])->name('deposits.reject');
        Route::post('deposits/{deposit}/update-status', [DepositTransactionController::class, 'updateStatus'])->name('deposits.updateStatus');


    });
    Route::middleware(['admin:2'])->group(function () {
        Route::resource('menu',MenuController::class);
        Route::resource('category',CategoryController::class);
        Route::resource('setting',SettingController::class);
        Route::resource('slider',SliderController::class);
        Route::resource('option',OptionController::class);
        Route::get('option/double/{id}', [OptionController::class, 'double']);
        Route::resource('promotion',PromotionController::class);
    });
    Route::middleware(['admin:3'])->group(function () {
        Route::get('main', [MainController::class, 'index'])->name('admin');

        Route::resource('page',PageController::class);
        Route::resource('post',PostController::class);
        Route::resource('product',ProductController::class);

        Route::group(['prefix'=>'section'],function(){
            Route::get('list/{id}', [SectionController::class, 'index']);
            Route::get('add/{id}', [SectionController::class, 'AddSection'])->name('Add.Section');
            Route::get('edit/{id}', [SectionController::class, 'editsection']);
            Route::post('save/{id}', [SectionController::class, 'updateSection'])->name('section.update');
            Route::get('dell/{id}', [SectionController::class, 'DellSection'])->name('section.dell');
        });
    });
});

// account
Route::get('dangnhap', [AccountController::class, 'dangnhap'])->name('dangnhap');
Route::middleware(['user'])->group(function () {
    Route::prefix('account')->group(function () {
        Route::get('main', [AccountController::class, 'index'])->name('account.main');
        Route::get('transfer/{url}', [AccountController::class, 'transfer']);
        
        // Đổi lại route nạp tiền
        Route::get('deposits', [AccountController::class, 'depositHistory']);
        Route::post('deposits', [AccountController::class, 'depositCreate'])->name('account.deposits.store');
        Route::put('deposits/{id}', [AccountController::class, 'depositUpdate']);
        Route::get('deposits/show/{id}', [AccountController::class, 'showDeposit'])->name('account.showDeposit');
        // routes/web.php (trong group /account)
        Route::post('deposits/{id}/cancel',  [AccountController::class, 'depositCancel'])->name('account.deposits.cancel');
        Route::post('deposits/{id}/confirm', [AccountController::class, 'depositConfirm'])->name('account.deposits.confirm');


        Route::get('/{url}', [AccountController::class, 'category']);
    });
});


// home view
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('sitemap.xml', [HomeController::class, 'sitemap'])->name('sitemap');

// home system
Route::get('sendmail', [HomeSystemController::class, 'sendmail'])->name('sendmail');
Route::post('question', [HomeSystemController::class, 'question'])->name('question');

// add to cart
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');

// checkout
Route::get('/checkout', [CheckoutController::class, 'show'])->name('checkout.show');
Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout.process');
Route::get('/checkout/success/{order}', [CheckoutController::class, 'success'])->name('checkout.success');



// Route::get('dangky', [HomeController::class, 'dangky'])->name('dangky');
// Route::prefix('account')->group(function () {
//     Route::get('info', [HomeController::class, 'account'])->name('account');
//     Route::POST('update/{id}', [HomeController::class, 'update_account'])->name('update_account'); // cập nhật thông tin người dùng
//     Route::get('order', [HomeController::class, 'account_cart'])->name('account_cart');
//     Route::get('order/{id}', [HomeController::class, 'account_order_dital'])->name('account_order_dital');
// });



Route::get('location/{slug}', [HomeController::class, 'province']);
Route::get('{slug}', [HomeController::class, 'slugHandler']);
Route::get('{catslug}/{slug}', [HomeController::class, 'post']);


