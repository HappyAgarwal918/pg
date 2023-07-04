<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\frontendController;
use App\Http\Controllers\Owner\ownerPropertyController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\Broker\brokerPropertyController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\vendorFeedbackController;
use App\Http\Controllers\feedbackVendorController;
use App\Http\Controllers\wishlistController;
use App\Http\Controllers\propertyController;

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

Auth::routes(['verify' => false]);

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);
Route::post('verifymobile', [HomeController::class, 'verifymobile'])->name('verifymobile');

Route::get('display-user', [frontendController::class, 'display']);

Route::get('dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
Route::controller(frontendController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('about-us', 'aboutUs')->name('about-us');
    Route::get('contact-us', 'contactUs')->name('contact-us');
    Route::post('contact-us/save', 'contactSave')->name('contact-save');
    Route::get('privacy', 'privacy')->name('privacy');
    Route::get('terms-and-conditions', 'tandc')->name('tandc');
    Route::get('blogs', 'blogs')->name('blogs');
    Route::get('gallery', 'gallery')->name('gallery');    
});

Route::controller(propertyController::class)->group(function () {
    Route::get('properties', 'properties')->name('properties');
    Route::post('sortby', 'sortby')->name('sortby');
    Route::get('search', 'propertysearch')->name('search');
    Route::get('vendors', 'vendors')->name('vendors');
    Route::get('vendor/{id}', 'vendordetail')->name('vendordetail');
});

Route::get('send-mail', [MailController::class, 'index']);

Route::middleware(['auth'])->group(function () {
    Route::controller(propertyController::class)->group(function () {
        Route::get('property/detail/{id}', 'propertydetail')->name('propertydetail');
    });
    Route::controller(profileController::class)->group(function () {
        Route::get('/settings', 'settings')->name('profile.settings');
        Route::post('/profile/update', 'updateprofile')->name('profile.edit');
        Route::post('/password/update','updatepassword')->name('update.password');
        Route::post('/pic/update', 'updatepicture')->name('update.profilepic');
        Route::post('/app/feedback', 'appfeedback')->name('app.feedback'); // To review app
    });
    Route::controller(vendorFeedbackController::class)->group(function () {
        Route::post('/vendor/review', 'vendorreview')->name('vendor.review'); // To review Vendors
    });
    Route::controller(wishlistController::class)->group(function(){
        Route::get('/wishlist', 'wishlist')->name('savedproperty');
        Route::post('/saved/property', 'addtowishlist')->name('addtowishlist');
    });
});

/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::group(['prefix' => 'users'], function () {
        Route::get('/home', [HomeController::class, 'index'])->name('home');
        // Show Users their review given to vendors

        Route::resource('/feedback', feedbackVendorController::class);
    });
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
});

/*------------------------------------------
--------------------------------------------
All Broker Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:broker'])->group(function () {
    Route::group(['prefix' => 'broker'], function () {
        Route::get('/home', [HomeController::class, 'brokerHome'])->name('broker.home');
        Route::resource('/property', brokerPropertyController::class )
        ->names([
            'index' => 'broker.index',
            'create' => 'broker.create', 
            'store' => 'broker.store',
            'show' => 'broker.show', 
            'edit' => 'broker.edit', 
            'update' => 'broker.update',
            'destroy' => 'broker.destroy'
        ]);
        Route::get('/feedback', [vendorFeedbackController::class, 'usersfeedback'])->name('broker.feedback');
    });
});

/*------------------------------------------
--------------------------------------------
All Owner Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:owner'])->group(function () {
    Route::group(['prefix' => 'owner'], function () {
        Route::get('/home', [HomeController::class, 'ownerHome'])->name('owner.home');
        Route::resource('/property', ownerPropertyController::class);
        Route::get('/feedback', [vendorFeedbackController::class, 'usersfeedback'])->name('owner.feedback');
    });
});
