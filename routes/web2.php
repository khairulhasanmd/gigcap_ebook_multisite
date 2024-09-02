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



Route::get('/fp', function () {
    return view('email.password', ['fname' => 'Taylor', 'password' => '123', 'email' => 'marko@marko.com']);
});

Route::view('/wlc', 'email.welcome', ['fname' => 'Taylor', 'password' => '123', 'email' => 'marko@marko.com', 'terms' => 'terms']);

Auth::routes();
Route::get('/', 'BasicController@welcome')->name('welcome');
Route::get('/return-policy', 'BasicController@returnPolicy')->name('return');
Route::get('/coming-soon', 'BasicController@comingSoon')->name('coming-soon');
Route::get('/terms', 'BasicController@terms')->name('terms');
Route::get('/privacy-policy', 'BasicController@privacy')->name('privacy');
Route::get('/about-us', 'BasicController@about')->name('about');
Route::get('/contact', 'BasicController@contact')->name('contact');
Route::get('/signup', 'BasicController@signup')->name('signup');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/products', 'UserController@products')->name('products');
Route::get('/course/{id}', 'UserController@courseTopics')->name('course.topics');
Route::get('/topic/{id}', 'UserController@courseSubTopics')->name('topic.sub.topics');
Route::get('/subtopic/{id}', 'UserController@courseSubTopicsDetail')->name('sub.topics.detail');
Route::get('/practice/{id}', 'UserController@coursePractice')->name('practice');
Route::get('/profile', 'UserController@profile')->name('profile');
Route::get('/file/{filename}', 'FileController@getFile')->where('filename', '^[^/]+$');
Route::post('/contact-us', 'BasicController@contactUs')->name('contact-us');



Route::post('/update-profile', 'UserController@updateProfile')->name('update-profile');
Route::get('/change-password', 'UserController@changePassword')->name('changePassword');
Route::post('/save-change-password', 'UserController@saveChangePassword')->name('saveChangePassword');
Route::get('/cancel-subscription', 'UserController@cancelSubscription')->name('cancelSubscription');
Route::get('/subscriptions', 'UserController@showSubscriptions')->name('subscriptions');
Route::get('/get-order/{orderId}', 'UserController@getOrder');
Route::get('/blog-creator', 'UserController@blogCreator')->name('blogCreator');
Route::get('/cancel-membership', 'UserController@cancelMembership')->name('cancelMembership');
//Route::get('/get-user-performance', 'UserController@userPerformance')->name('user.performance');
Route::get('/get-user-performance', 'BasicController@userPerformance')->name('user.performance');
Route::get('/update-user-performance', 'BasicController@updateUserPerformance')->name('update.performance');

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');



Route::post('/api/user', 'PropelController@postSubscriptionSuccessAction');
Route::get('/send-forgot-password', 'PropelController@forgotPassword')->name('forgotPassword');
Route::post('/send-forgot-password', 'PropelController@sendForgotPassword')->name('sendForgotPassword');
Route::post('/api/v1/user', 'PropelController@postSubscriptionSuccessAction');

Route::group(['prefix' => '/api/s/v1'], function () {

    // Route::any('/subscription/success.json', 'PropelController@postSubscriptionSuccessAction');
    Route::post('/subscription/cancel', 'PropelController@cancelSubscriptionAction');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/dashboard', 'Admin\DashboardController@index')->name('dashboard.index');
    // Route::resource('/course', 'Admin\CourseCrudController');
    // Route::resource('/topics', 'Admin\TopicsCrudController');
    // Route::resource('/subtopics', 'Admin\SubTopicsCrudController');
    // Route::get('/find-topics/{id}', 'Admin\SubTopicsCrudController@findTopics')->name('find.topics');
    // Route::post('subtopics/image-upload', 'Admin\CKEditorController@upload')->name('ckeditor.image-upload');
    Route::resource('/product', 'Admin\ProductCrudController');
    Route::resource('/tags', 'Admin\TagController');
});

