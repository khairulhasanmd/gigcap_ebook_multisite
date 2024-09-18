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
    Route::get('/signin', [UserLoginController::class, 'signin'])->name('login');
    Route::post('/signin', [LoginController::class, 'login'])->name('signin.post');
    Route::get('/signout', [UserLoginController::class, 'signout'])->name('signout');
    Route::get('/signup', [BasicController::class, 'signup'])->name('signup');
    Route::get('/courses-info', [BasicController::class, 'courses_info'])->name('courses-info');
    Route::get('/courses', [UserController::class, 'courses'])->name('courses');
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::get('/file/{filename}', [FileController::class, 'getFile'])->where('filename', '^[^/]+$');
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
    Route::get('/mydashboard', [UserController::class, 'financeDashboard'])->name('finance-dashboard');
    Route::get('/mycvdashboard', [UserController::class, 'cvdashboard'])->name('cv-dashboard');
    Route::get('/service/{service}', [BasicController::class, 'typeOfService'])->name('service');
    Route::get('/products',  [UserController::class, 'products'])->name('products');
    Route::get('/products/{id}',  [UserController::class, 'productsDownload'])->name('products.download');





});

Route::post('/contact-us', [BasicController::class, 'contactUs'])->name('contact-us');

Route::post('/update-profile', [UserController::class, 'updateProfile'])->name('update-profile');
Route::get('/subscriptions', [UserController::class, 'showSubscriptions'])->name('subscriptions');
Route::get('/get-order/{orderId}', [UserController::class, 'getOrder']);
Route::post('/unsubscribe-membership', [BasicController::class, 'unsubscribeMembership'])->name('unsubscribeMembership');

Route::post('password/email', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [App\Http\Controllers\Auth\ResetPasswordController::class, 'reset'])->name('password.update');
Route::get('/check-lang-file', [BasicController::class, 'checkLangFile'])->name('checkLangFile');

// Route::get('/send-forgot-password', [PropelController::class, 'forgotPassword'])->name('forgotPassword');
// Route::post('/send-forgot-password', [PropelController::class, 'sendForgotPassword'])->name('sendForgotPassword');

Route::group(['prefix' => '/api'], function () {
    Route::any('/s/v1/subscription/success.json', [PropelController::class, 'postSubscriptionSuccessAction']);
    Route::post('/s/v1/subscription/cancel', [PropelController::class, 'cancelSubscriptionAction']);
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

Route::prefix('/administrator')->namespace('App\\Http\\Controllers')->group(function () {
    Route::get('/login',[LoginController::class,'showAdminLoginForm'])->name('admin.login-view');
    Route::get('/dashboard', [DashboardController::class, 'home'])->name('admin.dashboard');
    Route::resource('companies', CompanyController::class);
    Route::resource('crm', CrmController::class);
    Route::resource('concept', ConceptController::class);
    Route::get('concept/info/{id}',  [ConceptController::class, 'getInfo'])->name('concept.company.info');
    Route::get('concept/clone/{id}',  [ConceptController::class, 'cloneInfo'])->name('concept.clone');
    Route::get('concept/translate/{id}',  [ConceptController::class, 'getTranslationLang'])->name('concept.company.translate.lang');
    Route::post('concept/translate/{id}',  [ConceptController::class, 'getTranslation'])->name('concept.company.translate');
})->middleware(['auth', 'admin']);


Route::get('/where_am_i', function(){
    return response()->json(['server' => '52North Multisite']);
});
