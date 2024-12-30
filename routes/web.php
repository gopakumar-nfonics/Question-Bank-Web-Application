<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', function () {
    if (Auth::user()->isAdmin()) {
        return redirect(route('dashboard'));
    }
    if (Auth::user()->isPapersetter()) {
        return redirect(route('dashboard'));
    }
   
})->name('dashboard');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
Route::resource('subject',\App\Http\Controllers\resource\subject::class);
Route::resource('topic',\App\Http\Controllers\resource\topic::class);
Route::resource('question',\App\Http\Controllers\resource\question::class);
Route::get('/topics/{subject}', [\App\Http\Controllers\resource\topic::class, 'getTopics']);
