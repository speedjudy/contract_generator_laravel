<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AdminpanelController;

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
Route::controller(MainController::class)->group(function () {
    Route::get('/', 'signin');
    Route::get('/forgot-password', 'forgot_password');
    Route::get('/signin/checkuser', 'check_user');
    Route::get('/secure/checktoken', 'check_token');
    
});

Route::controller(AdminpanelController::class)->group(function () {
    Route::get('/users', 'users');
    Route::post('/users/add_user', 'users_add');
    Route::get('/users/get_users', 'users_get');
    Route::get('/users/get_user_info', 'user_info_get');
    Route::get('/users/remove_user', 'user_remove');

    Route::get('/shortcodes', 'shortcodes');
    Route::post('/shortcodes/add_shortcode', 'shortcodes_add');
    Route::get('/shortcodes/get_shortcodes', 'shortcodes_get');
    Route::get('/shortcodes/get_shortcode_info', 'shortcode_info_get');
    Route::get('/shortcodes/remove_shortcode', 'shortcode_remove');
});
