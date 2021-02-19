<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/users', function () {
    return view('userPanel/home');
});
// Route::get('/adminpanel2', function () {
//     return view('adminPanel/home2');
// });
// Route::get('/adminpanel', function () {
//     return view('adminPanel/home');
// });

Route::resource('admin/customer', 'CustomerController');
Route::resource('admin/product', 'ProductController');
Route::resource('admin/SerialNumber', 'SerialNumberController');
// Route::resource('admin/SerialNumber{id}', 'SerialNumberController');
