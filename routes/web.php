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

Route::get('/dashboard/agenda', function () {
    return view('dashboard.agenda');
})->name('dashboard.agenda');

Route::get('/dashboard/turnos', function () {
    return view('dashboard.turnos');
})->name('dashboard.turnos');

Route::get('/dashboard/cobros', function () {
    return view('dashboard.cobros');
})->name('dashboard.cobros');

Route::get('/dashboard/adelantos', function () {
    return view('dashboard.adelantos');
})->name('dashboard.adelantos');

Route::get('/dashboard/consumibles', function () {
    return view('dashboard.consumibles');
})->name('dashboard.consumibles');

Route::get('/dashboard/cierres', function () {
    return view('dashboard.cierres');
})->name('dashboard.cierres');

Route::get('/dashboard/servicios', function () {
    return view('dashboard.servicios');
})->name('dashboard.servicios');

Route::get('/reservar', function () {
    return view('turnos.reservar');
})->name('turnos.reservar');

Route::get('/cliente/dashboard', function () {
    return view('cliente.dashboard');
})->name('cliente.dashboard');

Route::get('/agenda-publica', function () {
    return view('cliente.agenda-publica');
})->name('agenda-publica');
