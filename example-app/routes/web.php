<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\KanbanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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

Route::get('/userprofile', function() {
    return view('userProfile');
});

Route::get('/userparticipate' , function () {
    return view('userParticipate');
});

Route::resource('/users', UserController::class);

Route::controller(EventController::class)->group(function () {
   Route::get('/events', [EventController::class, 'index'] )->name('events.index');
   Route::get('/events/myevents', [EventController::class, 'myevents'] )->name('events.myevents');
   Route::get('/events/create', [EventController::class, 'create'] )->name('events.create');
   Route::post('/events/store', [EventController::class, 'store'] )->name('events.store');
   Route::get('/events/show/{event}', [EventController::class, 'show'] )->name('events.show');
   Route::get('/events/edit/{event}', [EventController::class, 'edit'] )->name('events.edit');
   Route::put('/events/update/{event}', [EventController::class, 'update'] )->name('events.update');
   Route::get('/events/pending', [EventController::class, 'pending'] )->name('events.pending');
   Route::get('/events/join', [EventController::class, 'join'] )->name('events.join');
});

Route::resource('/kanban', KanbanController::class);

Route::get('/staffdashboard' , function () {
    return view('staffDashboard');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('/events' , EventController::class);
});

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

//Route::middleware('auth')->group(function () {
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//});

Route::post('/postIt/update',[KanbanController::class, 'updatePostIt'])->name('postit.update');

require __DIR__.'/auth.php';
