<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BasicController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\PropelController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminCourseCrudController;
use App\Http\Controllers\AdminTopicsCrudController;
use App\Http\Controllers\AdminSubTopicsCrudController;
use App\Http\Controllers\AdminCKEditorController;
use App\Http\Controllers\AdminProductCrudController;
use App\Http\Controllers\AdminTagController;



// Route::get('/', function () {
//     return view('welcome');
// });



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

Route::view('/wlc', 'email.welcome', ['fname' => 'Taylor', 'password' => '123', 'email' => 'marko@marko.com', 'terms' => 'terms']);

Auth::routes();
Route::get('/', [BasicController::class, 'welcome'])->name('welcome');
Route::get('/return-policy', [BasicController::class, 'returnPolicy'])->name('return');
Route::get('/coming-soon', [BasicController::class, 'comingSoon'])->name('coming-soon');
Route::get('/terms', [BasicController::class, 'terms'])->name('terms');
Route::get('/privacy-policy', [BasicController::class, 'privacy'])->name('privacy');
Route::get('/about-us', [BasicController::class, 'about'])->name('about');
Route::get('/contact', [BasicController::class, 'contact'])->name('contact');
Route::get('/signup', [BasicController::class, 'signup'])->name('signup');
Route::get('/logout', [AuthLoginController::class, 'logout'])->name('logout');
Route::get('/products', [UserController::class, 'products'])->name('products');
Route::get('/course/{id}', [UserController::class, 'courseTopics'])->name('course.topics');
Route::get('/topic/{id}', [UserController::class, 'courseSubTopics'])->name('topic.sub.topics');
Route::get('/subtopic/{id}', [UserController::class, 'courseSubTopicsDetail'])->name('sub.topics.detail');
Route::get('/practice/{id}', [UserController::class, 'coursePractice'])->name('practice');
Route::get('/profile', [UserController::class, 'profile'])->name('profile');
Route::get('/file/{filename}', [FileController::class, 'getFile'])->where('filename', '^[^/]+$');
Route::post('/contact-us', [BasicController::class, 'contactUs'])->name('contact-us');



Route::post('/update-profile', [UserController::class, 'updateProfile'])->name('update-profile');
Route::get('/change-password', [UserController::class, 'changePassword'])->name('changePassword');
Route::post('/save-change-password', [UserController::class, 'saveChangePassword'])->name('saveChangePassword');
Route::get('/cancel-subscription', [UserController::class, 'cancelSubscription'])->name('cancelSubscription');
Route::get('/subscriptions', [UserController::class, 'showSubscriptions'])->name('subscriptions');
Route::get('/get-order/{orderId}', [UserController::class, 'getOrder']);
Route::get('/blog-creator', [UserController::class, 'blogCreator'])->name('blogCreator');
Route::get('/cancel-membership', [UserController::class, 'cancelMembership'])->name('cancelMembership');
//Route::get('/get-user-performance', [UserController::class, 'userPerformance'])->name('user.performance');
Route::get('/get-user-performance', [BasicController::class, 'userPerformance'])->name('user.performance');
Route::get('/update-user-performance', [BasicController::class, 'updateUserPerformance'])->name('update.performance');

Route::get('password/reset', [AuthForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [AuthForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [AuthResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [AuthResetPasswordController::class, 'reset'])->name('password.update');



Route::post('/api/user', [PropelController::class, 'postSubscriptionSuccessAction']);
Route::get('/send-forgot-password', [PropelController::class, 'forgotPassword'])->name('forgotPassword');
Route::post('/send-forgot-password', [PropelController::class, 'sendForgotPassword'])->name('sendForgotPassword');
Route::post('/api/v1/user', [PropelController::class, 'postSubscriptionSuccessAction']);

Route::group(['prefix' => '/api/s/v1'], function () {

    // Route::any('/subscription/success.json', [PropelController::class, 'postSubscriptionSuccessAction']);
    Route::post('/subscription/cancel', [PropelController::class, 'cancelSubscriptionAction']);
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard.index');
    // Route::resource('/course', [AdminCourseCrudController::class, ');
    // Route::resource('/topics', [AdminTopicsCrudController::class, ');
    // Route::resource('/subtopics', [AdminSubTopicsCrudController::class, ');
    // Route::get('/find-topics/{id}', [AdminSubTopicsCrudController::class, 'findTopics'])->name('find.topics');
    // Route::post('subtopics/image-upload', [AdminCKEditorController::class, 'upload'])->name('ckeditor.image-upload');
    Route::resource('/product', AdminProductCrudController::class);
    Route::resource('/tags', AdminTagController::class);
});

