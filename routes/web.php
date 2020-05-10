<?php

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
Route::group(['middleware' => 'revalidate'],function(){

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['web'])->group(function () {

    Route::post('serviceProvider/selfStore', '\App\Http\Controllers\ServiceProviderController@store');
    Route::get('auth/login', '\App\Http\Controllers\Auth\LoginController@viewLogin')->name('login');
    Route::post('auth/login', '\App\Http\Controllers\Auth\LoginController@doLogin')->name('do_login');
    Route::get('auth/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');
    Route::post('auth/forgetPassword', '\App\Http\Controllers\Auth\LoginController@forgetPassword')->name('resetPassword');

  Route::middleware(['auth'])->group(function () {
    // this point
    Route::get('/', '\App\Http\Controllers\OrderController@view')->name('home');
    Route::get('auth/changePassword', '\App\Http\Controllers\Auth\LoginController@changePassword')->name('changePassword');
    Route::post('auth/changePasswordSave', '\App\Http\Controllers\Auth\LoginController@changePasswordSave')->name('changePasswordSave');
    // SP
    Route::get('serviceProvider/view', '\App\Http\Controllers\ServiceProviderController@view');
    Route::post('serviceProvider/list', '\App\Http\Controllers\ServiceProviderController@index');
    Route::post('serviceProvider/{id}', '\App\Http\Controllers\ServiceProviderController@update');
    Route::resource('serviceProvider', '\App\Http\Controllers\ServiceProviderController');
    Route::get('serviceProvider/{id}/payments/list', '\App\Http\Controllers\ServiceProviderController@paymentsList');
    Route::post('serviceProvider/{id}/payments', '\App\Http\Controllers\ServiceProviderController@payments');
    Route::post('serviceProvider/{spId}/contact', '\App\Http\Controllers\ServiceProviderController@contact');
    // SR
    Route::get('serviceRequester/view', '\App\Http\Controllers\ServiceRequesterController@view');
    Route::post('serviceRequester/list', '\App\Http\Controllers\ServiceRequesterController@index');
    Route::resource('serviceRequester', '\App\Http\Controllers\ServiceRequesterController');
    Route::post('serviceRequester/{srId}/contact', '\App\Http\Controllers\ServiceRequesterController@contact');
    // Order
    Route::get('orders/new', '\App\Http\Controllers\OrderController@new');
    Route::get('orders/view', '\App\Http\Controllers\OrderController@view');
    Route::post('orders/list', '\App\Http\Controllers\OrderController@index');
    Route::resource('orders', '\App\Http\Controllers\OrderController');
    Route::post('orders/{id}/toggleInterest', '\App\Http\Controllers\OrderController@toggleInterest');
    Route::get('orders/{id}/interestedServiceProviders/view', '\App\Http\Controllers\OrderController@interestedServiceProvidersView');
    Route::post('orders/{id}/interestedServiceProviders', '\App\Http\Controllers\OrderController@interestedServiceProviders');
    Route::get('orders/sp/{id}/view', '\App\Http\Controllers\OrderController@spOrdersView');
    Route::get('orders/sr/{id}/view', '\App\Http\Controllers\OrderController@srOrdersView');
    Route::post('orders/sp/{id}/list/{status?}', '\App\Http\Controllers\OrderController@spOrders');
    Route::post('orders/sr/{id}/list/{status?}', '\App\Http\Controllers\OrderController@srOrders');
    // Assigne
    Route::post('orders/{orderId}/toggleAssignTo/{serviceProviderId}', '\App\Http\Controllers\OrderController@toggleAssignTo');
    //Session
    Route::get('orders/{id}/sessions/view', '\App\Http\Controllers\SessionController@view');
    Route::get('orders/{id}/mysessions/view', '\App\Http\Controllers\SessionController@mySession');
    Route::post('orders/{id}/sessions/list', '\App\Http\Controllers\SessionController@index');
    Route::resource('orders/{id}/sessions', '\App\Http\Controllers\SessionController');
    Route::get('sessions/today/view', '\App\Http\Controllers\SessionController@todaySessionsView');
    Route::post('sessions/today', '\App\Http\Controllers\SessionController@todaySessions');
    Route::post('orders/{orderId}/sessions/{sessionId}/toggleDone', '\App\Http\Controllers\SessionController@toggleDone');
    // Payments
    Route::post('sessions/payments/list/{sessionId?}', '\App\Http\Controllers\PaymentController@index');
    Route::resource('sessions/payments', '\App\Http\Controllers\PaymentController');
    // SA
    Route::get('serviceAdmins/view', '\App\Http\Controllers\ServiceAdminController@view');
    Route::post('serviceAdmins/list', '\App\Http\Controllers\ServiceAdminController@index');
    Route::resource('serviceAdmins', '\App\Http\Controllers\ServiceAdminController');
    Route::post('serviceAdmins/{id}/toggleActive', '\App\Http\Controllers\ServiceAdminController@toggleActive');
    // Me Routes
    Route::post('/me/toggleActive', '\App\Http\Controllers\ServiceProviderController@toggleActive');
    Route::get('/me/orders/view', '\App\Http\Controllers\ServiceProviderController@myOrders');
    Route::get('/me/orders/view/interest', '\App\Http\Controllers\ServiceProviderController@myInterestOrders');
    Route::post('/me/orders/{status?}', '\App\Http\Controllers\ServiceProviderController@orders');
    Route::get('/me/profile', '\App\Http\Controllers\MeController@profile');
    Route::post('/me/updateProfile', '\App\Http\Controllers\MeController@updateProfile');
    Route::get('/me', '\App\Http\Controllers\MeController@me');

    Route::get('/me/payments/list', '\App\Http\Controllers\ServiceProviderController@paymentsList');

    Route::post('test', '\App\Http\Controllers\ServiceProviderController@test');
  });

});
});
