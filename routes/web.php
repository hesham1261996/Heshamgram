<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
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
Route::get('/lang-ar' , function(){
    session()->put('lang' , 'ar');
    return back();
});
Route::get('/lang-en' , function(){
    session()->put('lang' , 'en');
    return back();
});
require __DIR__.'/auth.php';


Route::get('/explore' , [PostController::class , 'explore'])->name('explore')->middleware('lang');
Route::middleware(['auth' , 'lang'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/{user:username}' , [UserController::class , 'index'])->name('user_profile')->middleware('lang');
Route::get('/{user:username}/edit', [UserController::class , 'edit'])->middleware(['auth' , 'lang'])->name("edit_profile");
Route::patch('/{user:username}/update' , [UserController::class , 'update'])->middleware(['auth' , 'lang'])->name('updata_profile');

Route::controller(PostController::class)->middleware(['auth' , 'lang'])->group(function(){
    Route::get('/', 'index')->name('home_page');
    Route::get('/p/create'  , 'create')->name('create_post');
    Route::post('/p/create'  , 'store')->name('stors_post');
    Route::get('/p/{post:slug}', 'show')->name('show_post');
    Route::get('/p/{post:slug}/edit' ,'edit')->name('edit_post');
    Route::patch('/p/{post:slug}/update'  ,'update')->name('update_post');
    Route::delete('/p/{post:slug}/delete'  ,'destroy')->name('delete_post');

});


Route::get('/p/{post:slug}/like', LikeController::class )->middleware(['auth' , 'lang']) ;
Route::get('/{user:username}/follow' , [UserController::class , 'follow'])->middleware(['auth' , 'lang'])->name('user_follow');
Route::get('/{user:username}/unfollow' , [UserController::class , 'unfollow'])->middleware(['auth' , 'lang'])->name('user_unfollow');



Route::post('/p/{post:slug}/comment' , [CommentController::class , 'store'])->name('stor_comment')->middleware(['auth' , 'lang']);