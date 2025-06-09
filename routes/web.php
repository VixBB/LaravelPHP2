<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
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

route::get('/', [HomeController::class, 'home'])->name('home')->middleware('auth');
route::get('/login', [LoginController::class, 'index'])->name('login');
route::post('/login-proses', [LoginController::class, 'login_proses'])->name('login-proses');
route::get('/logout', [LoginController::class, 'logout'])->name('logout');
route::get('/home', [HomeController::class, 'home'])->name('home')->middleware('auth');
route::get('/laptopdetail/{id}', [HomeController::class, 'laptopdetail'])->name('laptopdetail');
route::post('/laptopdetail/pinjam', [HomeController::class, 'pinjam'])->name('pinjam');

route::get('/profile', [HomeController::class, 'profile'])->name('profile')->middleware('auth');
route::post('/profile/update', [HomeController::class, 'updateProfile'])->name('profile.update')->middleware('auth');



route::group(['prefix' => 'admin','middleware' => ['auth','role:admin|siswa'], 'as' => 'admin.'], function(){
    route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

    route::get('/laptop', [HomeController::class, 'index2'])->name('index2');
    route::get('/laptop/create', [HomeController::class, 'create1'])->name('laptop.create1');
    route::post('/laptop/store', [HomeController::class, 'store1'])->name('laptop.store1');
    route::get('/laptop/edit/{id}', [HomeController::class, 'edit1'])->name('laptop.edit1');
    route::put('/laptop/update/{id}', [HomeController::class, 'update1'])->name('laptop.update1');
    route::delete('/laptop/delete/{id}', [HomeController::class, 'delete1'])->name('laptop.delete1');

    route::get('/peminjaman', [HomeController::class, 'index3'])->name('index3');
    route::get('/peminjaman/create', [HomeController::class, 'create2'])->name('peminjaman.create2');
    route::post('/peminjaman/store', [HomeController::class, 'store2'])->name('peminjaman.store2');
    route::get('/peminjaman/edit/{id}', [HomeController::class, 'edit2'])->name('peminjaman.edit2');
    route::put('/peminjaman/update/{id}', [HomeController::class, 'update2'])->name('peminjaman.update2');
    route::delete('/peminjaman/delete/{id}', [HomeController::class, 'delete2'])->name('peminjaman.delete2');

    route::get('/user', [HomeController::class, 'index'])->name('index');
    route::get('/create', [HomeController::class, 'create'])->name('user.create');
    route::post('/store', [HomeController::class, 'store'])->name('user.store');

    route::get('/edit/{id}', [HomeController::class, 'edit'])->name('user.edit');
    route::put('/update/{id}', [HomeController::class, 'update'])->name('user.update');
    route::delete('/delete/{id}', [HomeController::class, 'delete'])->name('user.delete');
});

