<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\User;
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
require __DIR__.'/auth.php';


Route::get('/explore' , [PostController::class , 'explore'])->name('explore');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/{user:username}' , [UserController::class , 'index'])->middleware('auth')->name('user_profile');
Route::get('/{user:username}/edit', [UserController::class , 'edit'])->middleware('auth')->name("edit_profile");
Route::patch('/{user:username}/update' , [UserController::class , 'update'])->middleware('auth')->name('updata_profile');

Route::controller(PostController::class)->middleware('auth')->group(function(){
    Route::get('/', 'index')->name('home_page');
    Route::get('/p/create'  , 'create')->name('create_post');
    Route::post('/p/create'  , 'store')->name('stors_post');
    Route::get('/p/{post:slug}', 'show')->name('show_post');
    Route::get('/p/{post:slug}/edit' ,'edit')->name('edit_post');
    Route::patch('/p/{post:slug}/update'  ,'update')->name('update_post');
    Route::delete('/p/{post:slug}/delete'  ,'destroy')->name('delete_post');

});
Route::post('/p/{post:slug}/comment' , [CommentController::class , 'store'])->name('stor_comment')->middleware('auth');