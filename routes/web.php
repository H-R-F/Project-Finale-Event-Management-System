<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CreateeventController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\Home;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Models\Createevent;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/event', [EventController::class, 'index'])->name('event.index');
Route::post('/event/store', [EventController::class, 'store'])->name('event.store');

Route::get('/admin', [AdminController::class, 'index']);

Route::get('/calendar', [CalendarController::class, 'index'])->name('calendar.index');
Route::post("/calendar/store" , [CalendarController::class , "store"]);
Route::get("/calendar/show" , [CalendarController::class , "show"]);


Route::put('/calendar/update/{event}', [CalendarController::class, 'update'])->name('event.update');
Route::delete('/calendar/delete/{event}', [CalendarController::class, 'destroy'])->name('event.destroy');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/event/show/{event}', [EventController::class, 'show'])->name('event.show');


Route::get('/events', [CategorieController::class, 'allevents'])->name('allevents.index');
Route::get('/Concerts & Festival', [CategorieController::class, 'Concerts_Festival'])->name('Concerts_Festival.index');
Route::get('/Conference', [CategorieController::class, 'Conference'])->name('Conference.index');
Route::get('/Spor', [CategorieController::class, 'Spor'])->name('Spor.index');
Route::get('/Théâtre Humour', [CategorieController::class, 'Théâtre_Humour'])->name('Théâtre_Humour.index');

Route::post('/event/pay/{showEvent}', [EventController::class, 'session'])->name('event.pay');
Route::get('/success', function () {
    return redirect()->route('home'); // Redirect to the home route after successful payment
})->name('success');

require __DIR__.'/auth.php';
