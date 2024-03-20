<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/home', function () {
    return view('home');
})->middleware('auth');

Route::get('/about', function () {
    return view('about');
});

Route::get('/blog', function () {
    return view('posts');
});

Route::get('login', [AuthController::class, 'login']
)->name('login');

Route::post('login', [AuthController::class, 'authenticating']
)->name('login');

Route::get('register', [AuthController::class, 'register']
);

Route::post('register', [AuthController::class, 'registerProcess']
);

