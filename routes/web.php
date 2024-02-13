<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    if (auth()->user()->user_type == 'tourist') {
        return redirect()->route('tourist.dashboard');
    }elseif (auth()->user()->user_type == 'tourist spot') {
        return redirect()->route('tourist-spot.dashboard');
    }elseif (auth()->user()->user_type == 'municipal') {
      return redirect()->route('municipal.dashboard');
    }else{
       return redirect()->route('provincial.dashboard');
    }
})->middleware(['auth', 'verified'])->name('dashboard');


//tourist route
Route::prefix('tourist')->group(function(){
    Route::get('/dashboard', function () {
        return view('tourist.index');
    })->name('tourist.dashboard');
    Route::get('/appointments', function () {
        return view('tourist.appointment');
    })->name('tourist.appointment');
    Route::get('/profile', function () {
        return view('tourist.profile');
    })->name('tourist.profile');
});


//tourist spot route
Route::prefix('tourist-spot')->group(function(){
    Route::get('/dashboard', function () {
        return view('tourist-spot.index');
    })->name('tourist-spot.dashboard');
    Route::get('/settings', function () {
        return view('tourist-spot.settings');
    })->name('tourist-spot.settings');
    Route::get('/appointments', function () {
        return view('tourist-spot.appointments');
    })->name('tourist-spot.appointments');
    Route::get('/tourists', function () {
        return view('tourist-spot.tourists');
    })->name('tourist-spot.tourists');
});

//municipal route
Route::prefix('municipal')->group(function(){
    Route::get('/dashboard', function () {
        return view('municipal.index');
    })->name('municipal.dashboard');
    Route::get('/Tourist-spots', function () {
        return view('municipal.tourist-spots');
    })->name('municipal.tourist-spots');
    Route::get('/reports', function () {
        return view('municipal.reports');
    })->name('municipal.reports');
});

Route::prefix('provincial')->group(function(){
    Route::get('/dashboard', function () {
        return view('provincial.index');
    })->name('provincial.dashboard');

    Route::get('/reports', function () {
        return view('provincial.reports');
    })->name('provincial.reports');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
