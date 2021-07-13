<?php

use App\Http\Controllers\Home;
use App\Http\Controllers\user;
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

//Default route to  user signup section
Route::get('/', function () {
    return view('/auth/signup');
});

//Route for user signup section
Route::get('/signup', [user::class, 'signup'])->Name('auth.signup');
//Route for user login section
Route::get('/login', [user::class, 'login'])->Name('auth.login');
//Route for save data in DB
Route::post('/saved', [user::class, 'saved'])->Name('saved');
//Route for verify user login
Route::post('/verify', [user::class, 'verify'])->Name('auth.verify');

Route::group(['middleware' => 'authcheck'], function () {

    //Route for home page
    Route::get('/Home', [Home::class, 'show'])->Name('Home.Main');

//Route for house-owners dashboard
    Route::get('/Home/Houseowner', [Home::class, 'houseowner'])->Name('Houseowner.Houseowners');

//Route for house owner room creation
    Route::get('/Home/Houseowner/rooms', [Home::class, 'rooms'])->Name('Houseowners.rooms');

//Route for tranfer rooms form data to controller
    Route::post('/save', [Home::class, 'save'])->Name('Rooms.save');

//Route for edit owners room information
    Route::get('edit/{id}', [Home::class, 'edit']);

//Route for edit owners room information
    Route::put('update/{id}', [Home::class, 'update']);

//Route for delete owners rooms
    Route::get('delete/{id}', [Home::class, 'delete']);

//route for room booking confirmation
    Route::get('confirm/{id}', [Home::class, 'confirm']);

//Route for room booking
    Route::post('/booking', [Home::class, 'booking'])->Name('booking');

//Routr for mybooking dashboard
    Route::get('/Mybookings', [Home::class, 'mybooking'])->Name('Customers.mybooking');

//Route for logout
    Route::get('/logout', [Home::class, 'logout'])->Name('logout');

});
