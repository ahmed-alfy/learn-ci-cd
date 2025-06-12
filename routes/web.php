<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('welcome', ['name' => 'John Doe']);
})->name('home');

Route::get('dashboard', function () {
    return inertia('Dashboard', [
        'users' => User::query()->when(request('search'), function ($query) {
            return
                $query->where('name', 'like', '%' . request('search') . '%')
                ->orWhere('email', 'like', '%' . request('search') . '%');
        })->paginate(10)->withQueryString(),
        'can' => [
            'delete' => request()->user()->can('delete', request()->user()),
        ]
    ]);
})->name('dashboard');

Route::get('register', function () {
    return Inertia::render('Auth/Register');
})->name('register');

Route::post('register', [\App\Http\Controllers\AuthController::class, 'register'])
    ->name('register.store');

Route::inertia('loing', 'Auth/Login')->name('login');
Route::post('login', [\App\Http\Controllers\AuthController::class, 'login'])
    ->name('login.store');

Route::post('logout', [\App\Http\Controllers\AuthController::class, 'logout'])
    ->name('logout');
