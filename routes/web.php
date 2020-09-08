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

use App\Shop\Orders\Order;
use App\Mail\UserRegistration;
use App\Shop\Customers\Customer;
use App\Mail\FillMedicalHistoryForm;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('/registration', function () {
//     $order = Order::where('reference', '8fa3b7fb-dd46-4ddb-bef0-c2a7e23c0d84')->first();
//     return new FillMedicalHistoryForm($order, $order->customer);
// });
/**
 * Admin routes
 */

Route::namespace('Admin')->group(function () {
    Route::get('admin/login', 'LoginController@showLoginForm')->name('admin.login');
    Route::post('admin/login', 'LoginController@login')->name('admin.login');
    Route::get('admin/logout', 'LoginController@logout')->name('admin.logout');
});

Route::group(['prefix' => 'admin', 'middleware' => ['employee'], 'as' => 'admin.' ], function () {
    Route::namespace('Admin')->group(function () {
        Route::group(['middleware' => ['role:admin|superadmin, guard:employee']], function () {
            Route::get('/', 'DashboardController@index')->name('dashboard');
            Route::namespace('Products')->group(function () {
                Route::resource('products', 'ProductController');
                Route::get('remove-image-product', 'ProductController@removeImage')->name('product.remove.image');
                Route::get('remove-image-thumb', 'ProductController@removeThumbnail')->name('product.remove.thumb');
            });
            Route::namespace('Customers')->group(function () {
                Route::resource('customers', 'CustomerController');
            Route::resource('customers.addresses', 'CustomerAddressController');
            });

            Route::namespace('Categories')->group(function () {
                Route::resource('categories', 'CategoryController');
                Route::get('remove-image-category', 'CategoryController@removeImage')->name('category.remove.image');
            });

            Route::namespace('Orders')->group(function () {
                Route::get('orders/voodoo', 'OrderController@voodoo')->name('orders.voodoo');
                Route::get('orders/ajax', 'OrderController@details')->name('orders.ajax');
                Route::post('orders/StateDentist', 'OrderController@StateDentist')->name('orders.StateDentist');
                Route::post('assignedTo', 'OrderController@assignedTo')->name('orders.assignedTo');
                Route::post('orders/voodooApi', 'OrderController@voodooApi')->name('orders.voodooApi');
                Route::resource('orders', 'OrderController');
                Route::resource('order-statuses', 'OrderStatusController');

                Route::post('order/update_tracking_number', 'OrderController@updateTrackingNumber')->name('orders.updateTrackingNumber');
                Route::get('orders/{id}/invoice', 'OrderController@generateInvoice')->name('orders.invoice.generate');
            });

            Route::get('facilities/appointments', 'FacilityController@getAppointments')->name('facilities.appointments');
            Route::resource('facilities', 'FacilityController');
            Route::get('facilities/{facility_id}/weekday/{weekday}', 'FacilityController@updateSpan')->name('facilities.updateSpan');
            Route::post('facilities/{facility_id}/weekday/{weekday}', 'FacilityController@updateFacilityTimespan')->name('facilities.updateFacilityTimespan');
            Route::post('facilities/updateTime/{facility_id}', 'FacilityController@updateTime')->name('facilities.updateTime');
            Route::post('facilities/addNonAvailabilityTime', 'FacilityController@addNonAvailabilityTime')->name('addNonAvailabilityTime');
            Route::post('facilities/updateNaHours/{id}', 'FacilityController@updateNonAvailabilityTime');
            Route::delete('facilities/deleteNaHours/{id}', 'FacilityController@destroyNonAvailabilityTime')->name('deleteNaHours');
            Route::post('facilities/getcity', 'FacilityController@getcity');
            
            Route::resource('addresses', 'Addresses\AddressController');
            Route::resource('countries', 'Countries\CountryController');
            Route::resource('countries.provinces', 'Provinces\ProvinceController');
            Route::resource('countries.provinces.cities', 'Cities\CityController');
            Route::resource('couriers', 'Couriers\CourierController');
            Route::resource('attributes', 'Attributes\AttributeController');
            Route::resource('attributes.values', 'Attributes\AttributeValueController');
            Route::resource('brands', 'Brands\BrandController');

            Route::get('subscribers', 'DashboardController@subscribers')->name('subscribers');
            Route::get('user-assessments', 'UserAssessmentController@index')->name('user_assessment');

            Route::resource('employees', 'EmployeeController');
            Route::post('employees/delete_certificate/{id}', 'EmployeeController@deleteCertificate');
            Route::post('employees/filter', 'EmployeeController@filter')->name('filter');
            Route::post('employees/delete/{id}', 'EmployeeController@destroy')->name('delete');
            Route::post('employees/status', 'EmployeeController@status')->name('status');
            Route::post('employees/get_location', 'EmployeeController@getLocation')->name('get_location');
            Route::get('employees/{id}/orders', 'EmployeeController@dentist_orders')->name('employee.dentist_orders');
            Route::get('employees/{id}/profile', 'EmployeeController@getProfile')->name('employee.profile');
            Route::put('employees/{id}/profile', 'EmployeeController@updateProfile')->name('employee.profile.update');
            Route::resource('roles', 'Roles\RoleController');
            Route::resource('permissions', 'Permissions\PermissionController');
            Route::resource('operators', 'OperatorController');
        });
    });
});

/**
 * Frontend routes
 */

Auth::routes(['verify' => true]);

Route::namespace('Auth')->group(function () {
    Route::get('cart/login', 'CartLoginController@showLoginForm')->name('cart.login');
    Route::post('cart/login', 'CartLoginController@login')->name('cart.login');
    Route::get('logout', 'LoginController@logout');
    Route::get('/login', 'LoginController@patientLogin');
    
    Route::group(['prefix' => 'pharmacist'], function(){
        Route::get('login', 'LoginController@pharmaLoginFormShow');
        Route::post('login', 'LoginController@userLogin')->name('pharma_login');
        Route::post('register', 'UserRegisterController@register')->name('pharma_register');
    });

    Route::group(['prefix' => 'dentist'], function(){
        Route::get('login', 'LoginController@dentistLoginFormShow');
        Route::post('login', 'LoginController@userLogin')->name('dentist_login');
        Route::post('register', 'UserRegisterController@register')->name('dentist_register');
    });

    Route::group(['prefix' => 'vendor'], function(){
        Route::get('login', 'LoginController@vendorLoginFormShow');
        Route::post('login', 'LoginController@userLogin')->name('vendor_login');
        Route::post('register', 'UserRegisterController@register')->name('vendor_register');
    });
});

Route::namespace('Front')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('about-us', 'HomeController@about')->name('about');
    Route::get('team', 'HomeController@team')->name('team');
    Route::get('team', 'HomeController@team')->name('team');
    Route::get('faq', 'HomeController@faq')->name('faq');
    Route::view('reviews', 'front.reviews')->name('reviews');
    Route::get('how-it-works', 'HomeController@howItWorks')->name('howitworks');
    Route::get('pricing', 'HomeController@pricing')->name('pricing');
    Route::get('locations/{facility?}', 'HomeController@locations')->name('locations');
    Route::view('landing-page', 'front.landing-page')->name('landing-page');
    Route::view('landing_page', 'front.landing-page2')->name('landing-page2');
    Route::view('assessment-form', 'front.form_assessment')->name('assessment_form');
    Route::view('video-page', 'front.video')->name('video');
    Route::view('contact-us', 'front.contact')->name('contact');
    Route::get('team', 'HomeController@team')->name('team');
    Route::post('contact', 'HomeController@contactUs')->name('contactUs');


    Route::get('payment-success', 'HomeController@paymentSuccessView');
    Route::post('payment-success', 'HomeController@paymentSuccess');


    Route::get('email-verify/{code}', 'HomeController@verifyEmail')->name('verifyEmail');
    Route::post('voodoo_response', 'HomeController@voodooResponse');

    Route::post('booking', 'HomeController@bookAppointment')->name('bookAppointment');
    Route::post('getLocations', 'HomeController@getLocations')->name('getLocations');
    Route::post('getFacilityTime', 'HomeController@getFacilityTime')->name('getFacilityTime');
    Route::post('getFacilityWeekdaySpan', 'HomeController@getFacilityWeekdaySpan')->name('getFacilityWeekdaySpan');

    Route::post('subscribe', 'HomeController@subscribe')->name('subscribe');

    Route::post('cart/updateCartQty', 'CartController@updateCartQty')->name('cart.updateCartQty');
    Route::get('cart/delete/{id}', 'CartController@destroy')->name('cart.delete');
    Route::resource('cart', 'CartController');
    Route::get("category/{slug}", 'CategoryController@getCategory')->name('front.category.slug');
    Route::get("search", 'ProductController@search')->name('search.product');

    Route::get('checkout', 'CheckoutController@index')->name('checkout.index');
    Route::post('checkout', 'CheckoutController@store')->name('checkout.store');
    Route::post('checkout/medical-form', 'CheckoutController@storeMedicalForm')->name('checkout.storeMedicalForm');
    Route::get('checkout/execute', 'CheckoutController@executePayPalPayment')->name('checkout.execute');
    Route::post('checkout/execute/{order_id}', 'CheckoutController@charge')->name('checkout.execute');
    Route::get('checkout/cancel/{order_id}', 'CheckoutController@cancel')->name('checkout.cancel');
    Route::get('checkout/success/{order_id}', 'CheckoutController@success')->name('checkout.success');

    Route::get('booking/success/{appointment_id}', 'HomeController@appointmentSuccess')->name('appointment.success');

    Route::post('assementForm', 'HomeController@assessmentForm')->name('assessmentForm');

    Route::namespace('Payments')->group(function () {
        Route::get('bank-transfer', 'BankTransferController@index')->name('bank-transfer.index');
        Route::post('bank-transfer', 'BankTransferController@store')->name('bank-transfer.store');
    });

    Route::group(['middleware' => ['usertype', 'web']], function () {
        Route::group(['prefix' => 'dentist'], function(){

            Route::get('profile', 'DentistController@profile')->name('dentist.profile');
            Route::get('new-case', 'DentistController@newCase')->name('dentist.new-case');
            Route::get('approved-case', 'DentistController@approvedCase')->name('dentist.approved-case');
            Route::get('rejected-case', 'DentistController@rejectedCase')->name('dentist.rejected-case');

            Route::post('profile/personal-info', 'DentistController@updatePersonalInfo')->name('dentist.personal_info');
            Route::post('profile/employee/update-avatar', 'DentistController@updateAvatar')->name('dentist.updateAvatar');
            Route::post('profile/update-password', 'DentistController@updatePassword')->name('dentist.updatePassword');
        });


        Route::group(['prefix' => 'operator'], function () {
            Route::get('dashboard', 'OperatorController@dashboard')->name('operator.dashboard');
            Route::get('profile', 'OperatorController@profile')->name('operator.profile');
            Route::get('new-case/{appointment_id}', 'OperatorController@newCase')->name('operator.new-case');
            Route::get('patient-in-location', 'OperatorController@patientsInLocation')->name('operator.patient-in-location');
            Route::get('fulfilled-patients', 'OperatorController@fulfilledPatients')->name('operator.fulfilled-patients');
            Route::get('commission', 'OperatorController@commission')->name('operator.commission');

            Route::post('profile/personal-info', 'OperatorController@updatePersonalInfo')->name('operator.personal_info');
            Route::post('profile/employee/update-avatar', 'OperatorController@updateAvatar')->name('employee.updateAvatar');
            Route::post('employee/update-password', 'OperatorController@updatePassword')->name('employee.updatePassword');
            Route::post('case/submit', 'OperatorController@submitCase')->name('operator.submitCase');
        });




        Route::group(['prefix' => 'vendor'], function () {
            Route::get('dashboard', 'VendorController@dashboard')->name('vendor.dashboard');
            Route::get('profile', 'VendorController@profile')->name('vendor.profile');
            Route::get('new-case', 'VendorController@newCase')->name('vendor.new-case');
            Route::get('case-sent', 'VendorController@caseSent')->name('vendor.case-sent');
            Route::get('approved-case', 'VendorController@approvedCase')->name('vendor.approved-case');
            Route::get('completed-case', 'VendorController@completedCase')->name('vendor.completed-case');

            Route::post('send-case-for-approval', 'VendorController@sendCaseForApproval')->name('vendor.sendCaseForApproval');
            Route::post('update-case-status', 'VendorController@updateCaseStatus')->name('vendor.updateCaseStatus');

            Route::post('profile/personal-info', 'VendorController@updatePersonalInfo')->name('vendor.personal_info');
            Route::post('profile/employee/update-avatar', 'VendorController@updateAvatar')->name('vendor.updateAvatar');
            Route::post('profile/update-password', 'VendorController@updatePassword')->name('vendor.updatePassword');

        });



        Route::namespace('Addresses')->group(function () {
            Route::resource('country.state', 'CountryStateController');
            Route::resource('state.city', 'StateCityController');
        });

        Route::get('medical_form/{order_id?}', 'AccountsController@medicalForm')->name('medical_form');
        Route::post('medical_form/{order_id?}', 'AccountsController@submitMedicalForm')->name('submitMedicalForm');
        Route::get('resources', 'AccountsController@resources')->name('resources');
        Route::get('profile', 'AccountsController@profile')->name('profile');
        Route::get('orders', 'AccountsController@orders')->name('orders');
        Route::get('orders/{id}', 'AccountsController@ordersShow')->name('orders.show');
        Route::get('calendar', 'AccountsController@calendar')->name('calendar');
        Route::get('accounts', 'AccountsController@index')->name('accounts');
        Route::patch('accounts', 'AccountsController@update')->name('accounts.update');

        Route::resource('customer.address', 'CustomerAddressController');

        Route::post('profile/personal-info', 'AccountsController@updatePersonalInfo')->name('user.personal_info');
        Route::post('profile/address-info', 'AccountsController@updateAddressInfo')->name('user.address_info');
        Route::post('profile/update-avatar', 'AccountsController@updateAvatar')->name('user.updateAvatar');
        Route::post('profile/update-teeth-images', 'AccountsController@updateTeethImages')->name('user.updateTeethImages');
        Route::get('profile/delete-teeth-images/{image}', 'AccountsController@removeTeethImage')->name('user.removeTeethImage');
        Route::post('update-password', 'AccountsController@updatePassword')->name('updatePassword');
    });


    Route::get("products", 'ProductController@index')->name('front.get.product_all');
    Route::get("product/{product}", 'ProductController@show')->name('front.get.product');
});
