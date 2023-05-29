<?php

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {



    Route::get('/dashboard', function () {


//  dd(auth()->user());

        return view('dashboard');
    })->name('dashboard');


    Route::resource('product', \App\Http\Controllers\Admin\ProductController::class, ['as' => 'user']);

});

Route::prefix('admin')
    ->middleware([
        // check if the user is logged in
        'auth',
        // check if the user has the role "admin"
        'role:admin'
    ])
    ->name('admin.')
    ->group(function () {

        // check if the user has the admin role - Gate::check('accessAdministration')

        Route::get('dashboard', function () {
            return view('dashboard');
        })->name('dashboard');

        Route::resource('product', \App\Http\Controllers\Admin\ProductController::class);
    });

    // Route::prefix('profile')
    // ->middleware([
    //     // check if the user is logged in
    //     'auth',
    //     // check if the user has the role "admin"
    //     'role:user'
    // ])
    // ->name('user.')
    // ->group(function () {

    //     // check if the user has the admin role - Gate::check('accessAdministration')

    //     Route::get('dashboard', function () {
    //         return view('dashboard');
    //     })->name('dashboard');


    // });


Route::get('/', \App\Http\Controllers\HomeController::class)
    ->name('home');

Route::get('/products', [\App\Http\Controllers\ProductController::class, 'index'])
    ->name('product.index');

Route::get('/product/{product}', [\App\Http\Controllers\ProductController::class, 'show'])
    ->name('product.show');



Route::get('/promotions', \App\Http\Controllers\HomeController::class)
    ->name('promotions');

Route::get('/contact', \App\Http\Controllers\HomeController::class)
    ->name('contact');
