<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/registro', function () {
    return view('auth.register');
})->name('register');

Route::get('/dashboard/usuarios', function () {
    return view('dashboard.index');
})->name('dashboard.usuarios');

Route::get('/dashboard/perfiles', function () {
    return view('dashboard.perfiles');
})->name('dashboard.perfiles');
