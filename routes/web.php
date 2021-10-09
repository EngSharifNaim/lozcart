<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('optimize:clear');
    return 'what you want';
});


Route::group(['middleware'=>'lang'],function() {
    Route::get('lang/{lang}',function($lang){
        if (in_array($lang,['ar','en'])) {
            if ( session()->has('lang'))
            {
                session()->forget('lang');
            }
            session()->put('lang',$lang);
        } else {
            session()->put('lang','ar');
        }
        return back();
    });

    Route::get('/', 'App\Http\Controllers\SiteController@main')->name('main');
    Route::get('/management', 'App\Http\Controllers\SiteController@management')->name('management');
    Route::get('/faqs', 'App\Http\Controllers\SiteController@faqs')->name('faqs');
    Route::get('/partners', 'App\Http\Controllers\SiteController@partners')->name('partners');
    Route::get('/privacy', 'App\Http\Controllers\SiteController@privacy')->name('privacy');
    Route::get('/terms', 'App\Http\Controllers\SiteController@terms')->name('terms');
    Route::get('/marketing', 'App\Http\Controllers\SiteController@marketing')->name('marketing');
    Route::get('/pricing', 'App\Http\Controllers\SiteController@pricing')->name('pricing');
    Route::get('/payment', 'App\Http\Controllers\SiteController@payments_page')->name('payment');
    Route::get('/shipping_options', 'App\Http\Controllers\SiteController@shipping_page')->name('shipping_options');
    Route::get('/partners_services', 'App\Http\Controllers\SiteController@partners_services')->name('StoreforgotPassword');
    Route::post('/StoreforgotPassword', 'App\Http\Controllers\Dashboard\ForGetPasswordController@StoreforgotPassword')->name('StoreforgotPassword');
    Route::post('/StoreforgotPassword/reset', 'App\Http\Controllers\Dashboard\ForGetPasswordController@reset')->name('reset');
    Auth::routes();
    Route::group([
        'prefix' => 'admin',
        'namespace' => 'App\Http\Controllers',
        'middleware' => 'auth',
    ], function () {
        Route::get('dashboard', 'HomeController@index')->name('dashboard');
        Route::get('roles', 'Dashboard\RoleController@index')->name('roles.index');
        Route::get('get_roles', 'Dashboard\RoleController@get_roles')->name('roles.get_roles');
        Route::get('roles/create', 'Dashboard\RoleController@create')->name('roles.create');
        Route::post('roles/store', 'Dashboard\RoleController@store')->name('roles.store');
        Route::get('roles/edit/{id}', 'Dashboard\RoleController@edit')->name('roles.edit');
        Route::post('roles/update', 'Dashboard\RoleController@update')->name('roles.update');
        Route::delete('roles/delete/{id}', 'Dashboard\RoleController@destroy')->name('roles.delete');


    });
    Route::post('checkEmailMobile', 'App\Http\Controllers\Dashboard\UserController@checkEmailMobile')->name('checkEmailMobile');
    Route::post('checkLink', 'App\Http\Controllers\Dashboard\UserController@checkLink')->name('checkLink');
    Route::post('checkLinkMyStore/{id}', 'App\Http\Controllers\Dashboard\UserController@checkLinkMyStore')->name('checkLinkMyStore');
    Route::get('create_role/{id}', 'App\Http\Controllers\Auth\RegisterController@create_role')->name('create_role');
    Route::group([
//        'prefix' => 'users',
        'namespace' => 'App\Http\Controllers',
        'middleware' => ['auth','Expirations'],
        'as'=>'user.'
    ], function () {
        Route::get('users', 'Dashboard\UserController@index')->name('index');
        Route::get('get_users', 'Dashboard\UserController@get_users')->name('get_users');
        Route::get('get_user_address/{id}', 'Dashboard\UserController@get_user_address')->name('get_user_address');
        Route::get('get_cities', 'Dashboard\UserController@get_cities')->name('get_cities');
        Route::get('user/edit/{id}', 'Dashboard\UserController@edit')->name('edit');
        Route::post('user/address_store/{id}', 'Dashboard\UserController@address_store')->name('address_store');
        Route::get('user/orders/{user_id}', 'Dashboard\UserController@orders')->name('orders');


        Route::get('get_orders/{user_id}', 'Dashboard\UserController@get_orders')->name('get_orders');

        Route::post('user/update/{id}', 'Dashboard\UserController@update')->name('update');
        Route::post('user/update_password/{id}', 'Dashboard\UserController@update_password')->name('update_password');
        Route::get('user/create', 'Dashboard\UserController@create')->name('create');
        Route::post('user/store', 'Dashboard\UserController@store')->name('store');
        Route::post('user/status/{id}', 'Dashboard\UserController@status')->name('status');
        Route::delete('user/delete/{id}', 'Dashboard\UserController@delete')->name('delete');
        Route::delete('user/delete_all', 'Dashboard\UserController@delete_all')->name('delete_all');
        Route::delete('user/address_delete/{id}', 'Dashboard\UserController@address_delete')->name('address_delete');
        Route::delete('user/address_delete_multi', 'Dashboard\UserController@address_delete_multi')->name('address_delete_multi');
//        Route::post('/notification_to_user','Dashboard\UserController@notification_send')->name('notification.send.user');


    });
    Route::group([
//        'prefix' => 'users',
        'namespace' => 'App\Http\Controllers',
        'middleware' => ['auth','Expirations'],
        'as'=>'product.'
    ], function () {
        Route::get('products', 'Dashboard\ProductController@index')->name('index');
        Route::get('get_products', 'Dashboard\ProductController@get_products')->name('get_products');
        Route::get('product/edit/{id}', 'Dashboard\ProductController@edit')->name('edit');
        Route::post('product/update/{id}', 'Dashboard\ProductController@update')->name('update');
        Route::get('product/profile/{id}', 'Dashboard\ProductController@profile')->name('profile');
        Route::get('product/create', 'Dashboard\ProductController@create')->name('create');
        Route::post('product/store', 'Dashboard\ProductController@store')->name('store');
        Route::post('product/status/{id}', 'Dashboard\ProductController@status')->name('status');
        Route::delete('product/delete/{id}', 'Dashboard\ProductController@delete')->name('delete');
        Route::delete('product/delete_all', 'Dashboard\ProductController@delete_all')->name('delete_all');
        Route::delete('product/status_all_stop', 'Dashboard\ProductController@status_all_stop')->name('status_all_stop');
        Route::delete('product/status_all_allow', 'Dashboard\ProductController@status_all_allow')->name('status_all_allow');

        Route::post('/product/uploadImages','Dashboard\ProductController@uploadImages')->name('uploadImages');
        Route::post('/product/ProductUploadImage','Dashboard\ProductController@ProductUploadImage')->name('ProductUploadImage');
        Route::post('/product/ProductDeleteImage/{name}','Dashboard\ProductController@ProductDeleteImage')->name('ProductDeleteImage');
        Route::post('/product/deleteImage/{name}','Dashboard\ProductController@deleteImage')->name('deleteImage');

    });
    Route::group([
//        'prefix' => 'users',
        'namespace' => 'App\Http\Controllers',
        'middleware' => ['auth','Expirations'],
        'as'=>'category.'
    ], function () {
        Route::get('categories', 'Dashboard\CategoryController@index')->name('index');
        Route::get('get_categories', 'Dashboard\CategoryController@get_categories')->name('get_categories');
        Route::get('category/edit/{id}', 'Dashboard\CategoryController@edit')->name('edit');
        Route::post('category/update/{id}', 'Dashboard\CategoryController@update')->name('update');
        Route::get('category/create', 'Dashboard\CategoryController@create')->name('create');
        Route::post('category/store', 'Dashboard\CategoryController@store')->name('store');
        Route::post('category/deactivate/{id}', 'Dashboard\CategoryController@deactivate')->name('deactivate');
        Route::post('category/activate/{id}', 'Dashboard\CategoryController@activate')->name('activate');
        Route::post('category/status/{id}', 'Dashboard\CategoryController@status')->name('status');
        Route::delete('category/delete/{id}', 'Dashboard\CategoryController@delete')->name('delete');
        Route::delete('category/delete_sub/{id}', 'Dashboard\CategoryController@delete_sub')->name('delete_sub');

        Route::post('/product/uploadImages','Dashboard\ProductController@uploadImages')->name('uploadImages');
        Route::post('/product/ProductUploadImage','Dashboard\ProductController@ProductUploadImage')->name('ProductUploadImage');
        Route::post('/product/ProductDeleteImage','Dashboard\ProductController@ProductDeleteImage')->name('ProductDeleteImage');
        Route::post('/product/deleteImage/{name}','Dashboard\ProductController@deleteImage')->name('deleteImage');

    });
    Route::group([
//        'prefix' => 'users',
        'namespace' => 'App\Http\Controllers',
        'middleware' => ['auth','Expirations'],
        'as'=>'brand.'
    ], function () {
        Route::get('brands', 'Dashboard\BrandController@index')->name('index');
        Route::get('get_brands', 'Dashboard\BrandController@get_brands')->name('get_brands');
        Route::post('market_brands', 'Dashboard\BrandController@market_brands')->name('market_brands');
        Route::post('brand/store', 'Dashboard\BrandController@store')->name('store');
        Route::get('brand/edit/{id}', 'Dashboard\BrandController@edit')->name('edit');
        Route::post('brand/update/{id}', 'Dashboard\BrandController@update')->name('update');

        Route::post('brand/status/{id}', 'Dashboard\BrandController@status')->name('status');
        Route::delete('brand/delete/{id}', 'Dashboard\BrandController@delete')->name('delete');
        Route::delete('brands/delete_all', 'Dashboard\BrandController@delete_all')->name('delete_all');

    });
    Route::group([
//        'prefix' => 'users',
        'namespace' => 'App\Http\Controllers',
        'middleware' => ['auth','Expirations'],
        'as'=>'marketing.'
    ], function () {
        Route::get('navbar', 'Dashboard\MarketingController@navbar')->name('navbar');
        Route::post('navbar/update', 'Dashboard\MarketingController@navbar_update')->name('navbar_update');

    });
    Route::group([
//        'prefix' => 'users',
        'namespace' => 'App\Http\Controllers',
        'middleware' => ['auth','Expirations'],
        'as'=>'coupon.'
    ], function () {
        Route::get('coupons', 'Dashboard\CouponController@index')->name('index');
        Route::get('get_coupons', 'Dashboard\CouponController@get_coupons')->name('get_coupons');
        Route::post('coupon/store', 'Dashboard\CouponController@store')->name('store')->middleware('CheckPlanTest');
        Route::get('coupon/edit/{id}', 'Dashboard\CouponController@edit')->name('edit');
        Route::post('coupon/update/{id}', 'Dashboard\CouponController@update')->name('update');
        Route::post('coupon/checkSubscriptionCoupon', 'Dashboard\CouponController@checkSubscriptionCoupon')->name('checkSubscriptionCoupon');

        Route::post('coupon/status/{id}', 'Dashboard\CouponController@status')->name('status');
        Route::delete('coupon/delete/{id}', 'Dashboard\CouponController@delete')->name('delete');
        Route::delete('coupons/delete_all', 'Dashboard\CouponController@delete_all')->name('delete_all');

    });
    Route::group([
//        'prefix' => 'users',
        'namespace' => 'App\Http\Controllers',
        'middleware' => ['auth','Expirations'],
        'as'=>'setting.'
    ], function () {
        Route::get('settings', 'Dashboard\SettingController@index')->name('index');
        Route::get('setting/store', 'Dashboard\SettingController@setting_store')->name('store');
        Route::post('setting/updateLogo','Dashboard\SettingController@updateLogo')->name('updateLogo');
        Route::post('setting/edit_store','Dashboard\SettingController@edit_store')->name('edit_store');
        Route::post('setting/save_location','Dashboard\SettingController@save_location')->name('save_location');
        Route::post('setting/save_description','Dashboard\SettingController@save_description')->name('save_description');
        Route::post('setting/save_link','Dashboard\SettingController@save_link')->name('save_link');
        Route::post('setting/save_update_tax','Dashboard\SettingController@save_update_tax')->name('save_update_tax');

    });
    Route::group([
//        'prefix' => 'users',
        'namespace' => 'App\Http\Controllers',
        'middleware' => ['auth','Expirations'],
        'as'=>'shipping.'
    ], function () {
        Route::get('shipping', 'Dashboard\ShippingController@index')->name('index');
        Route::get('get_shipping', 'Dashboard\ShippingController@get_shipping')->name('get_shipping');
        Route::get('shipping/get_cities', 'Dashboard\ShippingController@get_cities')->name('get_cities');
        Route::get('shipping/edit/{id}', 'Dashboard\ShippingController@edit')->name('edit');
        Route::post('shipping/update/{id}', 'Dashboard\ShippingController@update')->name('update');
        Route::get('shipping/create', 'Dashboard\ShippingController@create')->name('create');
        Route::post('shipping/store', 'Dashboard\ShippingController@store')->name('store');
        Route::post('shipping/status/{id}', 'Dashboard\ShippingController@status')->name('status');
        Route::delete('shipping/delete/{id}', 'Dashboard\ShippingController@delete')->name('delete');
        Route::delete('shipping/delete_all', 'Dashboard\ShippingController@delete_all')->name('delete_all');

    });
    Route::group([
//        'prefix' => 'users',
        'namespace' => 'App\Http\Controllers',
        'middleware' => ['auth','Expirations'],
        'as'=>'profile.'
    ], function () {
        Route::get('profile', 'Dashboard\ProfileController@index')->name('index');
        Route::post('profile/update/{id}', 'Dashboard\ProfileController@update')->name('update');
        Route::post('profile/update_password/{id}', 'Dashboard\ProfileController@update_password')->name('update_password');

    });
    Route::group([
//        'prefix' => 'users',
        'namespace' => 'App\Http\Controllers',
        'middleware' => ['auth','Expirations'],
        'as'=>'rate.'
    ], function () {
        Route::get('rates', 'Dashboard\RateController@index')->name('index');
        Route::get('get_more_rate', 'Dashboard\RateController@get_more_rate')->name('get_more_rate');
        Route::get('filter', 'Dashboard\RateController@filter')->name('filter');
        Route::post('rate/activate/{id}', 'Dashboard\RateController@activate')->name('activate');
        Route::post('rate/deactivate/{id}', 'Dashboard\RateController@deactivate')->name('deactivate');
        Route::delete('rate/delete/{id}', 'Dashboard\RateController@delete')->name('delete');

    });
    Route::group([
//        'prefix' => 'users',
        'namespace' => 'App\Http\Controllers',
        'middleware' => ['auth','Expirations'],
        'as'=>'partner.'
    ], function () {
        Route::get('partner-services', 'Dashboard\PartnerServicesController@index')->name('index');
        Route::post('partner-services/order', 'Dashboard\PartnerServicesController@order')->name('order')->middleware('CheckPlanTest');

    });
    Route::group([
//        'prefix' => 'users',
        'namespace' => 'App\Http\Controllers',
        'middleware' => ['auth','Expirations'],
        'as'=>'plugins.'
    ], function () {
        Route::get('plugins', 'Dashboard\PluginsController@index')->name('index');
        Route::post('plugins/connect', 'Dashboard\PluginsController@connect')->name('connect')->middleware('CheckPlanTest');
        Route::post('plugins/getUserPlugin', 'Dashboard\PluginsController@getUserPlugin')->name('getUserPlugin');
        Route::post('plugins/status/{id}', 'Dashboard\PluginsController@status')->name('status')->middleware('CheckPlanTest');

    });
    Route::group([
//        'prefix' => 'users',
        'namespace' => 'App\Http\Controllers',
        'middleware' => ['auth','Expirations'],
        'as'=>'domain.'
    ], function () {
        Route::get('domain/{id?}', 'Dashboard\DomainController@index')->name('index');
        Route::post('domain/connect', 'Dashboard\DomainController@connect')->name('connect')->middleware('CheckPlanTest');
    });
    Route::group([
//        'prefix' => 'users',
        'namespace' => 'App\Http\Controllers',
//        'middleware' => ['auth','Expirations'],
        'as'=>'error.'
    ], function () {
        Route::post('errors', 'Dashboard\ErrorController@store')->name('store');

    });
    Route::group([
//        'prefix' => 'users',
        'namespace' => 'App\Http\Controllers',
        'middleware' => ['auth','Expirations'],
        'as'=>'additional_setting.'
    ], function () {
        Route::get('additional_setting', 'Dashboard\AdditionalSettingController@index')->name('index');
        Route::post('additional_setting/store/update/{id}', 'Dashboard\AdditionalSettingController@additional_setting_store')->name('store.update');
        Route::post('additional_setting/language/{id}', 'Dashboard\AdditionalSettingController@language')->name('language')->middleware('CheckPlanTest');
        Route::post('additional_setting/enableMaintenanceMode', 'Dashboard\AdditionalSettingController@enable_maintenance_mode')->name('enable_maintenance_mode')->middleware('CheckPlanTest');
        Route::post('additional_setting/enableActiveMode', 'Dashboard\AdditionalSettingController@enable_active_mode')->name('enable_active_mode')->middleware('CheckPlanTest');
        Route::post('additional_setting/updateDeactivateMessage', 'Dashboard\AdditionalSettingController@update_deactivate_message')->name('update_deactivate_message');

    });
    Route::group([
//        'prefix' => 'users',
        'namespace' => 'App\Http\Controllers',
        'middleware' => ['auth','Expirations'],
        'as'=>'staff.'
    ], function () {
        Route::get('staff', 'Dashboard\StaffController@index')->name('index');
        Route::get('get_staff', 'Dashboard\StaffController@get_staff')->name('get_staff');
        Route::get('get_permission', 'Dashboard\StaffController@get_permission')->name('get_permission');
        Route::get('staff/create', 'Dashboard\StaffController@create')->name('create');
        Route::post('staff/store', 'Dashboard\StaffController@store')->name('store');
        Route::get('staff/edit/{id}', 'Dashboard\StaffController@edit')->name('edit');
        Route::post('staff/update/{id}', 'Dashboard\StaffController@update')->name('update');
        Route::post('staff/update_password/{id}', 'Dashboard\StaffController@update_password')->name('update_password');

        Route::post('staff/status/{id}', 'Dashboard\StaffController@status')->name('status');
        Route::delete('staff/delete/{id}', 'Dashboard\StaffController@delete')->name('delete');
        Route::delete('staff/delete_all', 'Dashboard\StaffController@delete_all')->name('delete_all');

    });
    Route::group([
//        'prefix' => 'users',
        'namespace' => 'App\Http\Controllers',
        'middleware' => ['auth','Expirations'],
        'as'=>'page.'
    ], function () {
        Route::get('page', 'Dashboard\PageController@index')->name('index');
        Route::get('get_pages', 'Dashboard\PageController@get_pages')->name('get_pages');
        Route::get('page/create', 'Dashboard\PageController@create')->name('create');
        Route::post('page/store', 'Dashboard\PageController@store')->name('store');
        Route::get('page/edit/{id}', 'Dashboard\PageController@edit')->name('edit');
        Route::post('page/update/{id}', 'Dashboard\PageController@update')->name('update');

        Route::post('page/status/{id}', 'Dashboard\PageController@status')->name('status');
        Route::delete('page/delete/{id}', 'Dashboard\PageController@delete')->name('delete');
        Route::delete('page/delete_all', 'Dashboard\PageController@delete_all')->name('delete_all');

    });
    Route::group([
//        'prefix' => 'users',
        'namespace' => 'App\Http\Controllers',
        'middleware' => 'auth',
        'as'=>'plan.'
    ], function () {
        Route::get('plans', 'Dashboard\PlanController@index')->name('index');
        Route::post('plans/subscription/{id}', 'Dashboard\PlanController@subscription')->name('subscription');
        Route::post('plans/stripe', 'Dashboard\PlanController@stripePost')->name('stripe');
        Route::post('plans/bankTransfer', 'Dashboard\PlanController@bankTransfer')->name('bankTransfer');
        Route::post('card/get/{id}', 'Dashboard\PlanController@get_card')->name('get_card');
        Route::delete('card/delete/{id}', 'Dashboard\PlanController@delete')->name('delete');

    });
    Route::group([
//        'prefix' => 'users',
        'namespace' => 'App\Http\Controllers',
        'middleware' => 'auth',
        'as'=>'stripe.'
    ], function () {
        Route::get('lozcart-payments/payments', 'Dashboard\StripeController@index')->name('index');
        Route::post('lozcart-payments/close_dispute/{id}', 'Dashboard\StripeController@close_dispute')->name('close_dispute');
        Route::get('lozcart-payments/accept_dispute/{id}', 'Dashboard\StripeController@accept_dispute')->name('accept_dispute');
        Route::post('lozcart-payments/reply_dispute/{id}', 'Dashboard\StripeController@reply_dispute')->name('reply_dispute');
        Route::get('lozcart-payments/get_payments/', 'Dashboard\StripeController@get_payments')->name('get_payments');


    });
    Route::group([
//        'prefix' => 'users',
        'namespace' => 'App\Http\Controllers',
        'middleware' => ['auth','Expirations'],
        'as'=>'order.'
    ], function () {
        Route::get('orders', 'Dashboard\OrderController@index')->name('index')->middleware('CheckPlanTest');
        Route::get('get_orders', 'Dashboard\OrderController@get_orders')->name('get_orders');
        Route::get('order/show/{id}', 'Dashboard\OrderController@show')->name('show');
        Route::get('order/show/payment/{order_no}', 'Dashboard\OrderController@showOrder')->name('showOrder');
        Route::post('order/status/{id}', 'Dashboard\OrderController@status')->name('status');
        Route::post('order/confirm_delivering/{id}', 'Dashboard\OrderController@confirm_delivering')->name('confirm_delivering');
        Route::delete('order/delete/{id}', 'Dashboard\OrderController@delete')->name('delete');
        Route::delete('order/delete_all', 'Dashboard\OrderController@delete_all')->name('delete_all');

    });
    Route::group([
//        'prefix' => 'users',
        'namespace' => 'App\Http\Controllers',
        'middleware' => ['auth','Expirations'],
        'as'=>'payment.'
    ], function () {
        Route::get('payments/{id?}', 'Dashboard\PaymentController@index')->name('index');
        Route::get('get_bank_accounts', 'Dashboard\PaymentController@get_bank_accounts')->name('get_bank_accounts');
        Route::get('payment/get_banks', 'Dashboard\PaymentController@get_banks')->name('get_banks');
        Route::get('payment/get_payment_method', 'Dashboard\PaymentController@get_payment_method')->name('get_payment_method');
        Route::post('payment/store', 'Dashboard\PaymentController@store')->name('store');
        Route::post('payment/addPayment', 'Dashboard\PaymentController@addPayment')->name('addPayment');
        Route::post('payment/lozCart', 'Dashboard\PaymentController@lozCart')->name('lozCart')->middleware('CheckPlanTest');
        Route::post('payment/lozCart/update', 'Dashboard\PaymentController@lozCartUpdate')->name('lozCartUpdate')->middleware('CheckPlanTest');

        Route::post('payment/payPal', 'Dashboard\PaymentController@payPal')->name('payPal');
        Route::post('payment/deactivate_payPal', 'Dashboard\PaymentController@deactivate_payPal')->name('deactivate_payPal');
        Route::get('payment/edit/{id}', 'Dashboard\PaymentController@edit')->name('edit');
        Route::get('payment/orders/{payment_id}', 'Dashboard\PaymentController@orders')->name('orders');
        Route::get('payment/get_orders/{payment_id}', 'Dashboard\PaymentController@get_orders')->name('get_orders');
        Route::post('payment/update/{id}', 'Dashboard\PaymentController@update')->name('update');
        Route::get('payment/payment_edit/{id}', 'Dashboard\PaymentController@payment_edit')->name('payment_edit');
        Route::post('payment/payment_update/{id}', 'Dashboard\PaymentController@payment_update')->name('payment_update');
        Route::post('payment/status/{id}', 'Dashboard\PaymentController@status')->name('status');
        Route::post('payment/status_payPal/{id}', 'Dashboard\PaymentController@status_payPal')->name('status_payPal');
        Route::post('payment/status_LozCart/{id}', 'Dashboard\PaymentController@status_LozCart')->name('status_LozCart');
        Route::post('payment/status_payment/{id}', 'Dashboard\PaymentController@status_payment')->name('status_payment');

        Route::delete('payment/delete/{id}', 'Dashboard\PaymentController@delete')->name('delete');
        Route::delete('payment/delete_all', 'Dashboard\PaymentController@delete_all')->name('delete_all');
        Route::delete('payment/payment_delete/{id}', 'Dashboard\PaymentController@payment_delete')->name('payment_delete');
        Route::delete('payment/payment_delete_all', 'Dashboard\PaymentController@payment_delete_all')->name('payment_delete_all');

    });
    Route::group([
//        'prefix' => 'users',
        'namespace' => 'App\Http\Controllers',
        'middleware' => ['auth','Expirations'],
        'as'=>'search.'
    ], function () {
        Route::post('search', 'Dashboard\SearchController@index')->name('index');
    });
    Route::group([
//        'prefix' => 'users',
        'namespace' => 'App\Http\Controllers',
        'middleware' => ['auth','Expirations','CheckPlanTest'],
        'as'=>'design.'
    ], function () {
        Route::get('design', 'Dashboard\DesignController@index')->name('index');
        Route::post('design/marketSetting', 'Dashboard\DesignController@marketSetting')->name('marketSetting');
        Route::post('design/updateSorting', 'Dashboard\DesignController@updateSorting')->name('updateSorting');
        Route::post('design/clientsRates/enable', 'Dashboard\DesignController@clientsRates_enable')->name('clientsRates_enable');
        Route::post('design/storeHomeSection', 'Dashboard\DesignController@storeHomeSection')->name('storeHomeSection');
        Route::post('design/storeSection', 'Dashboard\DesignController@storeSection')->name('storeSection');
        Route::post('design/getModelItems', 'Dashboard\DesignController@getModelItems')->name('getModelItems');
        Route::delete('design/deleteHomeSection/{id}', 'Dashboard\DesignController@deleteHomeSection')->name('deleteHomeSection');
    });
    Route::group([
//        'prefix' => 'users',
        'namespace' => 'App\Http\Controllers',
        'middleware' => ['auth','Expirations'],
        'as'=>'country.'
    ], function () {
        Route::get('country', 'Dashboard\CountryController@index')->name('index');
        Route::post('country/store', 'Dashboard\CountryController@store')->name('store')->middleware('CheckPlanTest');
        Route::delete('country/delete/{id}', 'Dashboard\CountryController@delete')->name('delete');
        Route::post('country/status/{id}', 'Dashboard\CountryController@status')->name('status');
        Route::post('country/set_main/{id}', 'Dashboard\CountryController@set_main')->name('set_main');


    });
    Route::group([
//        'prefix' => 'users',
        'namespace' => 'App\Http\Controllers',
        'middleware' => ['auth','Expirations'],
        'as'=>'paypal.'
    ], function () {


//        Route::get('paywithpaypal',  'Dashboard\PaypalController@payWithPaypal')->name('paywithpaypal');
        Route::post('pay', 'Dashboard\PaypalController@payWithPaypal')->name('pay');
        Route::get('paypal/{time}/{plan_id}/{price}',  'Dashboard\PaypalController@status')->name('status');
    });
    Route::group([
        'namespace' => 'App\Http\Controllers',
        'middleware' => ['auth','Expirations'],
        'as'=>'notification.'
    ], function () {
        Route::get('order/show/{order_id}/{notify_id}', 'Dashboard\NotificationController@show')->name('order.show');
        Route::get('read_all', 'Dashboard\NotificationController@read_all')->name('read_all');

//        Route::post('read/{id}', 'Dashboard\NotificationController@read')->name('read');

    });
    Route::group([
        'namespace' => 'App\Http\Controllers\vendor\Chatify',
        'middleware' => 'auth',
        'as'=>'chat.'
    ], function () {
        Route::get('chat', 'MessagesController@index')->name('index');

    });

});
