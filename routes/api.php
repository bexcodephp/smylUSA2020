<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group(['namespace' => 'Api'], function () {

    Route::post('login', 'Auth\LoginApiController@login');
    Route::post('register', 'Auth\SignUpApiController@register');

    Route::post('forgot_password', 'Auth\ForgetPasswordApiController@forgot_password');


    Route::post('deleteoperator', 'EmployeeController@status');



    Route::group(['middleware' => 'jwt.auth'], function () {

        Route::post('reset_password', 'Auth\ForgetPasswordApiController@change_password');

        Route::get('me', 'Auth\LoginApiController@me');
        Route::get('products', 'ProductApiController@index');
        Route::get('product-search', 'ProductApiController@search');
        Route::get('product-detail/{slug}', 'ProductApiController@show');
        Route::get('user/profile', 'UserApiController@profile');
        Route::get('user/orders', 'UserApiController@userOrders');
        Route::get('locations', 'UserApiController@locations');

        Route::get('states', 'UserApiController@states');


        Route::post('profile/personal-info', 'UserApiController@updatePersonalInfo');
        Route::post('profile/update-image', 'UserApiController@uploadImage');
        Route::post('profile/delete-teeth-image', 'UserApiController@removeTeethImage');
        Route::post('user/update-password', 'UserApiController@updatePassword');
        Route::get('user/notifications', 'UserApiController@getNotifications');
        Route::post('user/contact-us', 'UserApiController@contactUs');

        Route::post('order', 'CheckoutApiController@store');

        Route::post('book_appointment', 'AppointmentApiController@bookAppointment');
        Route::get('facilities', 'AppointmentApiController@getFacilities');
        Route::post('facility_available_dates', 'AppointmentApiController@getFacilityTime');
        Route::post('facility_available_times', 'AppointmentApiController@getFacilityWeekdaySpan');

        Route::get('user/journey', 'UserApiController@smylJouryney');
        


    });
});