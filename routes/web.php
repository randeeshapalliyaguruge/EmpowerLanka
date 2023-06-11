<?php

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;

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

        Route::resource('/category', AdminCategoryController::class)->only([
            'index', 'create', 'edit', 'destroy'
        ]);

        Route::get('user', [AdminUserController::class, 'index'])
            ->name('user.index');
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

Route::get('/products', [\App\Http\Controllers\ProductController::class, 'index'])
    ->name('product.index');

Route::get('/product/{product}', [\App\Http\Controllers\ProductController::class, 'show'])
    ->name('product.show');

Route::get('/featured', \App\Http\Controllers\HomeController::class)
    ->name('featured');


Route::get('/contact-us', [ContactController::class, 'contact'])
    ->name('contact-us');

Route::post('/send-email', [ContactController::class, 'sendEmail'])
    ->name('send-email');

Route::get('/', \App\Http\Controllers\HomeController::class)
->name('home');
