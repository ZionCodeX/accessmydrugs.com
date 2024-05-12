<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/index', function () {
    //return view('shop');
});

//Auth::routes();
Auth::routes(['verify' => true]);
Auth::routes(['paystack_payment_processing'=>false]);
Auth::routes(['paystack_subscription_processing'=>false]);
Auth::routes(['paystack_subscription_processing2'=>false]);


Route::get('/testx', [App\Http\Controllers\ShopController::class, 'testx'])->name('testx');

Route::get('/forgot-password', function () {
    return view('auth.passwords.email');
})->middleware('guest')->name('password.request');


//STATIC PAGES
Route::get('/faq', function () { return view('pages/faq'); });
Route::get('/about', function () { return view('pages/about'); });
Route::get('/contact', function () { return view('pages/contact'); });
Route::get('/returns', function () { return view('pages/returns'); });
Route::get('/privacy-policy', function () { return view('pages/privacy-policy'); });
Route::get('/terms-and-conditions', function () { return view('pages/terms-and-conditions'); });
Route::get('/wealth-club', [App\Http\Controllers\ShopController::class, 'shop'])->name('shop');
Route::get('/wishlist', [App\Http\Controllers\ShopController::class, 'shop'])->name('shop');
Route::get('/cart', [App\Http\Controllers\ShopController::class, 'shop'])->name('shop');


//PRODUCT PROCESSING
Route::get('/', [App\Http\Controllers\ShopController::class, 'shop'])->name('shop');
Route::get('/product/details/{product_slug}/{product_category}/{pid_product}', [App\Http\Controllers\ShopController::class, 'shop_product_details_view_index'])->name('shop_product_details_view_index');
Route::get('/product/category/{product_category}', [App\Http\Controllers\ShopController::class, 'product_category_view_index'])->name('product_category_view_index');
Route::post('/checkout/form/prox', [App\Http\Controllers\ShopController::class, 'checkout_form_prox'])->name('checkout_form_prox');
Route::post('/search', [App\Http\Controllers\ShopController::class, 'shop_search'])->name('shop_search');


//PAYSTACK PROCESSING
Route::post('/paystack/payment/processing', [App\Http\Controllers\ShopController::class, 'paystack_payment_processing'])->name('paystack_payment_processing');
Route::get('/paystack/callback.php/{trxref?}/{reference?}', [App\Http\Controllers\ShopController::class, 'paystack_callback_processing'])->name('paystack_callback_processing');
Route::get('/payment-status', function () { return view('pages/payment-status'); });
Route::post('/paystack/subscription/processing', [App\Http\Controllers\ShopController::class, 'paystack_subscription_processing'])->name('paystack_subscription_processing');
Route::post('/paystack/subscription/processing2', [App\Http\Controllers\ShopController::class, 'paystack_subscription_processing2'])->name('paystack_subscription_processing2');
Route::get('/paystack/pay/subscription/{plan_code?}/{pid_subscription?}/payment/link', [App\Http\Controllers\ShopController::class, 'pay_subscription'])->name('pay_subscription');

 
//HOME PAGES ROUTES
Route::get('/index', [App\Http\Controllers\DashboardController::class, 'dashboard'])->name('dashboard');


//ACCOUNT DETAILS UPDATE
Route::post('/account_details_update', [App\Http\Controllers\DashboardController::class, 'account_details_update'])->name('account_details_update')->middleware('verified');

//ACCOUNT DETAILS UPDATE
Route::get('/generate/subscription/{plan_code}/update/link', [App\Http\Controllers\DashboardController::class, 'generate_subscription_update_link'])->name('generate_subscription_update_link');



//MAIN PAGE CONTROLLERS
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'dashboard'])->name('dashboard')->middleware('verified');




//POST CONTROLLERS
Route::get('product/create/form/index', [App\Http\Controllers\ProductController::class, 'product_create_form_index'])->name('product_create_form_index');
Route::post('product/create/form/prox', [App\Http\Controllers\ProductController::class, 'product_create_form_prox'])->name('product_create_form_prox');
Route::get('product/update/{pid_post}/form/index', [App\Http\Controllers\ProductController::class, 'product_update_form_index'])->name('product_update_form_index');
Route::post('product/update/form/prox', [App\Http\Controllers\ProductController::class, 'product_update_form_prox'])->name('product_update_form_prox');
Route::post('product/delete/record/prox', [App\Http\Controllers\ProductController::class, 'product_delete_record_prox'])->name('product_delete_record_prox');
Route::get('product/view/table/index', [App\Http\Controllers\ProductController::class, 'product_view_table_index'])->name('product_view_table_index');
Route::get('product/view/{product_slug}/list/index', [App\Http\Controllers\ProductController::class, 'product_view_list_index'])->name('product_view_list_index');
Route::post('product/feature/record/prox', [App\Http\Controllers\ProductController::class, 'product_feature_record_prox'])->name('product_feature_record_prox');
Route::get('product/visibility/{pid_product}/{product_visibility}/prox', [App\Http\Controllers\ProductController::class, 'product_visibility_prox'])->name('product_visibility_prox');

//PRODUCTS ADMIN ADD
Route::post('/order/admin/add_product/index', [App\Http\Controllers\OrdersController::class, 'order_admin_add_product_index'])->name('order_admin_add_product_index');
Route::post('/order/admin/add_product/prox', [App\Http\Controllers\OrdersController::class, 'order_admin_add_product_prox'])->name('order_admin_add_product_prox');
Route::get('/order/admin/product/view/{pid_order}/index', [App\Http\Controllers\OrdersController::class, 'order_admin_product_view_index'])->name('order_admin_product_view_index');

//PROFILE 
Route::get('/profile/update/index', [App\Http\Controllers\ProfileUpdateController::class, 'profile_update_index'])->name('profile_update_index');
Route::post('/profile/update/prox', [App\Http\Controllers\ProfileUpdateController::class, 'profile_update_prox'])->name('profile_update_prox');
Route::get('/password/reset', [App\Http\Controllers\PagesController::class, 'password_reset'])->name('password_reset');

//BANK PAYMENT
Route::get('/bank/payment', [App\Http\Controllers\PagesController::class, 'bank_payment'])->name('bank_payment');
Route::get('/payment/status', [App\Http\Controllers\PagesController::class, 'payment_status'])->name('payment_status');

//MAILS 
Route::get('/mail', [App\Http\Controllers\MailController::class, 'mailsend'])->name('mail');
Route::get('/maildesign', [App\Http\Controllers\MailController::class, 'preview'])->name('maildesign');

//ADMIN PAGES
Route::get('/admin', [App\Http\Controllers\AdminPagesController::class, 'login_admin_index'])->name('login_admin_index');
Route::post('/login/admin/prox', [App\Http\Controllers\AdminLoginController::class, 'login_admin_prox'])->name('login_admin_prox');


//USERS PROFILE 
Route::get('/users/profile/view/{status}/index', [App\Http\Controllers\UsersProfileController::class, 'users_profile_view_status_index'])->name('users_profile_view_status_index');


//OTHER PAGES 
Route::get('/no/records', [App\Http\Controllers\PagesController::class, 'not_available'])->name('not_available');
Route::get('/password/reset', [App\Http\Controllers\PagesController::class, 'password_reset'])->name('password_reset');
Route::get('/logout', [App\Http\Controllers\PagesController::class, 'logout'])->name('logout');


//MIGRATION
Route::get('/xmigrate', function() {
    $exitCode = Artisan::call('migrate:refresh', ['--force' => true,]);
    dd('MIGRATION WAS SUCCESSFUL!');
});


//CLEAR-CACHE
Route::get('/xclean', function() {
    $exitCode1 = Artisan::call('cache:clear');
    $exitCode2 = Artisan::call('view:clear');
    $exitCode3 = Artisan::call('route:clear');
    $exitCode4 = Artisan::call('config:cache');
    dd('CACHE-CLEARED, VIEW-CLEARED, ROUTE-CLEARED & CONFIG-CACHED WAS SUCCESSFUL!');
 });
