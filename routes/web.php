<?php

use Illuminate\Support\Facades\Route;
use Laravel\Jetstream\Rules\Role;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/',[HomeController::class,'home']); 

Route::get('/show_post/{id}',[HomeController::class,'show_post'])->name('home.show_post');
Route::get('/create_post',[HomeController::class,'create_post'])->middleware('auth');
Route::post('/user_post',[HomeController::class,'user_post'])->middleware('auth')->name('user_post');
Route::get('/my_post',[HomeController::class,'my_post'])->middleware('auth')->name('my_post');
Route::delete('/delete/{id}', [HomeController::class, 'delete'])->name('delete_post');
Route::get('/edit/{id}', [HomeController::class, 'edit_post'])->middleware('auth')->name('home.edit');
Route::put('/update/{id}', [HomeController::class, 'update_post'])->middleware('auth')->name('home.update');
Route::get('/about_us',[HomeController::class,'about_us']);
Route::get('/blogs',[HomeController::class,'blogs']);





 

Route::get('/home',[AdminController:: class,'index'])->name('home');
Route::get('/post_page',[AdminController::class,'post_page']);

Route::post('/admin/posts/store', [AdminController::class, 'storePost'])->name('admin.posts.store');

Route::get('view_post',[AdminController::class, 'view_post'])->name('admin.view_post');
Route::get('/posts/{id}', [AdminController::class, 'show'])->name('admin.show');
Route::delete('/admin/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
Route::get('/admin/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
Route::put('/admin/update/{id}', [AdminController::class, 'update'])->name('admin.update');
Route::get('/accept_post/{id}', [AdminController::class, 'accept_post']);
Route::get('/reject_post/{id}', [AdminController::class, 'reject_post']);


