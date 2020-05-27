<?php

Route::get('{any?}', function () {
    return view('app');
})->where('any', '.*');

Route::get('/redirect/{provider}', 'Api\AuthController@redirect');
Route::get('/callback/{provider}', 'Api\AuthController@callback');


Route::middleware(['auth'])->namespace('backend')->prefix('admin')->name('admin.')->group(function(){
    Route::get('/','DashboardController@index')->name('index');
    Route::get('/setting','SettingsController@index')->name('setting.index');
    Route::post('/setting/store','SettingsController@store')->name('setting.store');
    Route::post('/setting/setwebhook','SettingsController@setwebhook')->name('setting.setwebhook');
    Route::post('/setting/getwebhookinfo','SettingsController@getwebhookinfo')->name('setting.getwebhookinfo');
});
Route::post(Telegram::getAccessToken(),'Backend\TelegramController@webhook');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
