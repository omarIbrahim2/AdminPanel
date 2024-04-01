<?php

use App\Models\User;
use App\Utitlities\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Config;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use Spatie\Permission\Models\Role;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get("testRole" , function(){
    $user = User::findOrFail(1);
    $user->assignRole([1]);
});
Route::prefix("dashboard")->middleware('auth')->group(function () {
    Route::resource("users" , UserController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
