<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BasicController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\PropelController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\CrmController;
use App\Http\Controllers\Admin\ConceptController;
use App\Http\Controllers\LoginController as UserLoginController;

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



Route::get('/fp', function () {
    return view('email.password', ['fname' => 'Taylor', 'password' => '123', 'email' => 'marko@marko.com']);
});

// Route::view('/wlc', 'email.welcome', ['fname' => 'Taylor', 'password' => '123', 'email' => 'marko@marko.com', 'terms' => 'terms']);

Route::group(['prefix' => LaravelLocalization::setLocale()], function() {
    Auth::routes();
    Route::get('/', [BasicController::class, 'welcome'])->name('welcome');
    Route::get('/return-policy', [BasicController::class, 'returnPolicy'])->name('return');
    Route::get('/coming-soon', [BasicController::class, 'comingSoon'])->name('coming-soon');
// Route::get('/terms', [BasicController::class, 'terms'])->name('terms');
    Route::get('/terms', [BasicController::class, 'termsLocale'])->name('terms');
    Route::get('/subscription-policy', [BasicController::class, 'subscription'])->name('subscription');
    Route::get('/privacy-policy', [BasicController::class, 'privacy'])->name('privacy');
    Route::get('/service', [BasicController::class, 'typeOfService'])->name('type.of.service');
    Route::get('/about-us', [BasicController::class, 'about'])->name('about');
    Route::get('/contact', [BasicController::class, 'contact'])->name('contact');
    Route::get('/complaints_and_disputes', [BasicController::class, 'complaints_and_disputes'])->name('complaints_and_disputes');
    Route::post('/signin', [LoginController::class, 'login'])->name('signin.post');
    Route::get('/signout', [LoginController::class, 'signout'])->name('signout');
    Route::get('/signup', [BasicController::class, 'signup'])->name('signup');
    Route::get('/courses-info', [BasicController::class, 'courses_info'])->name('courses-info');
    Route::get('/courses', [UserController::class, 'courses'])->name('courses');
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    // Route::get('/file/{filename}', [FileController::class, 'getFile'])->where('filename', '^[^/]+$');
    Route::get('/cancel-membership', [UserController::class, 'cancelMembership'])->name('cancelMembership');
    Route::get('/change-password', [UserController::class, 'changePassword'])->name('changePassword');
    Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/cancel-subscription', [UserController::class, 'cancelSubscription'])->name('cancelSubscription');
    Route::get('/unsubscribe', [BasicController::class, 'unsubscribe'])->name('unsubscribe');
    Route::get('password/reset/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/save-change-password', [UserController::class, 'saveChangePassword'])->name('saveChangePassword');
    Route::get('/unsubscribe', [BasicController::class, 'unsubscribe'])->name('unsubscribe');
    Route::post('/unsubscribe-membership', [BasicController::class, 'unsubscribeMembership'])->name('unsubscribeMembership');
    Route::get('/service/{service}', [BasicController::class, 'typeOfService'])->name('service');
    Route::get('/products',  [UserController::class, 'products'])->name('products');
    Route::get('/products/{id}',  [UserController::class, 'productsDownload'])->name('products.download');
   






});

Route::post('/contact-us', [BasicController::class, 'contactUs'])->name('contact-us');

Route::post('/update-profile', [UserController::class, 'updateProfile'])->name('update-profile');
Route::get('/subscriptions', [UserController::class, 'showSubscriptions'])->name('subscriptions');
Route::get('/get-order/{orderId}', [UserController::class, 'getOrder']);
Route::post('/unsubscribe-membership', [BasicController::class, 'unsubscribeMembership'])->name('unsubscribeMembership');

Route::post('password/email', [App\Http\Controllers\Auth\ResetPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [App\Http\Controllers\Auth\ResetPasswordController::class, 'reset'])->name('password.update');
Route::get('/check-lang-file', [BasicController::class, 'checkLangFile'])->name('checkLangFile');
Route::get('/service/{service}', [BasicController::class, 'typeOfService'])->name('service');


// Route::get('/send-forgot-password', [PropelController::class, 'forgotPassword'])->name('forgotPassword');
// Route::post('/send-forgot-password', [PropelController::class, 'sendForgotPassword'])->name('sendForgotPassword');

Route::group(['prefix' => '/api'], function () {
    // Route::any('/s/v1/subscription/success.json', [PropelController::class, 'postSubscriptionSuccessAction']);
    // Route::post('/s/v1/subscription/cancel', [PropelController::class, 'cancelSubscriptionAction']);
});

// Route::group(['prefix' => '/administrator'], function () {
//     Route::get('/login',[LoginController::class,'showAdminLoginForm'])->name('admin.login-view');
//     Route::get('/dashboard', [DashboardController::class, 'home'])->name('admin.dashboard');
//     Route::resource('companies', CompanyController::class);
//     Route::resource('crm', CrmController::class);
//     Route::resource('concept', ConceptController::class);
//     Route::get('concept/info/{id}',  [ConceptController::class, 'getInfo'])->name('concept.company.info');
//     Route::get('concept/clone/{id}',  [ConceptController::class, 'cloneInfo'])->name('concept.clone');
// });

Route::group(['prefix'=>'admin'], function () {
    //admin routes
    Route::get('categories', [CategoryController::class, 'index'])->name('admin.categories');
    Route::post('categories', [CategoryController::class, 'store'])->name('admin.categories.store');
    Route::get('categories/edit/{id}', [CategoryController::class, 'edit']);
    Route::post('categories/edit/{id}', [CategoryController::class, 'update']);
    Route::get('categories/delete/{id}', [CategoryController::class, 'destroy']);


    Route::get('tags', [TagController::class, 'index'])->name('admin.tags');
    Route::post('tags', [TagController::class, 'store'])->name('admin.tags.store');
    Route::get('tags/edit/{id}', [TagController::class, 'edit']);
    Route::post('tags/edit/{id}', [TagController::class, 'update']);
    Route::get('tags/delete/{id}', [TagController::class, 'destroy']);

    Route::get('contents/{categorySlug}', [ContentController::class, 'index']);
    Route::post('contents/{categorySlug}', [ContentController::class, 'store']);
    Route::get('contents/{categorySlug}/edit/{id}', [ContentController::class, 'edit']);
    Route::post('contents/{categorySlug}/edit/{id}', [ContentController::class, 'update']);
    Route::get('contents/{categorySlug}/delete/{id}', [ContentController::class, 'destroy']);

    Route::get('crms', [CrmController::class, 'index']);
    Route::post('crms', [CrmController::class, 'store']);
    Route::get('crms/edit/{id}', [CrmController::class, 'edit']);
    Route::post('crms/edit/{id}', [CrmController::class, 'update']);
    Route::get('crms/delete/{id}', [CrmController::class, 'destroy']);

    Route::get('concepts', [ConceptController::class, 'index']);
    Route::post('concepts', [ConceptController::class, 'store']);
    Route::get('concepts/edit/{id}', [ConceptController::class, 'edit']);
    Route::post('concepts/edit/{id}', [ConceptController::class, 'update']);
    Route::get('concepts/delete/{id}', [ConceptController::class, 'destroy']);
    Route::get('templates/list', [ConceptController::class, 'get_templates_list']);
    Route::get('concept/info/{id}',  [ConceptController::class, 'getInfo'])->name('concept.company.info');


     Route::name("admin.")->prefix("admin")->group(function ($router) { });
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('profile', [UserProfileController::class, 'index'])->name('admin.profile');
    Route::Patch('profile/update/{id}', [UserProfileController::class, 'update'])->name('admin.profile.update');
    Route::get('password', [UpdatePasswordController::class, 'index'])->name('admin.update.password');
    Route::patch('update-password/{id}', [UpdatePasswordController::class, 'update'])->name('admin.new.password');

    Route::resource('roles', UserRoleController::class)->names('admin.roles');
    Route::resource('users', UserController::class)->names('admin.users');
});




Route::get('/where_am_i', function(){
    return response()->json(['server' => '52North Multisite']);
});
