<?php

use Illuminate\Support\Facades\Route;


Route::get('', [\App\Http\Controllers\V0\IndexController::class,  'index'])->name('index');
Route::get('posts', [\App\Http\Controllers\V0\IndexController::class,  'posts'])->name('index.posts');
Route::get('faq', [\App\Http\Controllers\V0\IndexController::class,  'faq'])->name('index.faq');
Route::get('posts/show/{post}', [\App\Http\Controllers\V0\IndexController::class,  'posts_show'])->name('index.posts.show');

Route::post('posts/search/{category}', [\App\Http\Controllers\V0\IndexController::class,  'posts_search'])->name('index.posts.search');
Route::post('posts/like/{post}', [\App\Http\Controllers\V0\IndexController::class,  'post_like'])->name('index.posts.like');

Route::group(['prefix' => 'v1'], function () {
    Route::get('register', [\App\Http\Controllers\V0\IndexController::class, 'register'])
        ->name('register');
    Route::get('login', [\App\Http\Controllers\V0\IndexController::class, 'login'])
        ->name('login');

    Route::get('logout', [\App\Http\Controllers\V0\AuthController::class, 'logout'])
        ->name('logout');

    Route::post('register/post', [\App\Http\Controllers\V0\AuthController::class, 'register'])
        ->name('register.post');

    Route::post('login/post', [\App\Http\Controllers\V0\AuthController::class, 'login'])
        ->name('login.post');
});

Route::group(['prefix' =>  'admin' ,'middleware' => ['admin']], function () {

    Route::get('', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');

    Route::group(['prefix' => 'users'], function () {
        Route::get('', [\App\Http\Controllers\AdminController::class, 'usersIndex'])
            ->name('admin.users.index');

        Route::get('create', [\App\Http\Controllers\AdminController::class, 'usersCreate'])
            ->name('admin.users.create');

        Route::get('show/{user}', [\App\Http\Controllers\AdminController::class, 'usersShow'])
            ->name('admin.users.show');

        Route::get('edit/{user}', [\App\Http\Controllers\AdminController::class, 'usersEdit'])
            ->name('admin.users.edit');

        Route::post('store', [\App\Http\Controllers\UserController::class, 'store'])
            ->name('admin.users.store');

        Route::patch('update/{user}', [\App\Http\Controllers\UserController::class, 'update'])
            ->name('admin.users.update');

        Route::delete('delete/{user}', [\App\Http\Controllers\UserController::class, 'delete'])
            ->name('admin.users.delete');

        Route::post('search', [\App\Http\Controllers\UserController::class, 'search'])
            ->name('admin.users.search');
    });

    Route::group(['prefix' => 'categories'], function () {
        Route::get('', [\App\Http\Controllers\AdminController::class, 'categoriesIndex'])
            ->name('admin.categories.index');

        Route::get('create', [\App\Http\Controllers\AdminController::class, 'categoriesCreate'])
            ->name('admin.categories.create');

        Route::get('show/{category}', [\App\Http\Controllers\AdminController::class, 'categoriesShow'])
            ->name('admin.categories.show');

        Route::get('edit/{category}', [\App\Http\Controllers\AdminController::class, 'categoriesEdit'])
            ->name('admin.categories.edit');

        Route::post('store', [\App\Http\Controllers\CategoryController::class, 'store'])
            ->name('admin.categories.store');

        Route::patch('update/{category}', [\App\Http\Controllers\CategoryController::class, 'update'])
            ->name('admin.categories.update');

        Route::delete('delete/{category}', [\App\Http\Controllers\CategoryController::class, 'delete'])
            ->name('admin.categories.delete');

        Route::post('search', [\App\Http\Controllers\CategoryController::class, 'search'])
            ->name('admin.categories.search');
    });

    Route::group(['prefix' => 'posts'], function () {
        Route::get('', [\App\Http\Controllers\AdminController::class, 'postsIndex'])
            ->name('admin.posts.index');

        Route::get('create', [\App\Http\Controllers\AdminController::class, 'postsCreate'])
            ->name('admin.posts.create');

        Route::get('show/{post}', [\App\Http\Controllers\AdminController::class, 'postsShow'])
            ->name('admin.posts.show');

        Route::get('edit/{post}', [\App\Http\Controllers\AdminController::class, 'postsEdit'])
            ->name('admin.posts.edit');

        Route::post('store', [\App\Http\Controllers\PostController::class, 'store'])
            ->name('admin.posts.store');

        Route::patch('update/{post}', [\App\Http\Controllers\PostController::class, 'update'])
            ->name('admin.posts.update');

        Route::delete('delete/{post}', [\App\Http\Controllers\PostController::class, 'delete'])
            ->name('admin.posts.delete');

        Route::post('search', [\App\Http\Controllers\PostController::class, 'search'])
            ->name('admin.posts.search');
    });

});
