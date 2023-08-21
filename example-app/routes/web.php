<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\ProcessController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\CertificateController;
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

Route::controller(CertificateController::class)->group(function () {
    Route::get('/certificates/{user}', [CertificateController::class, 'index'])->name('certificates.index');
    Route::post('/certificates.store', [CertificateController::class, 'store'])->name('certificates.store');
});

Route::controller(UserController::class)->group(function () {
    Route::get('/users.show', [UserController::class, 'show'])->name('users.show');
    Route::get('/users.edit', [UserController::class, 'edit'])->name('users.edit');
    Route::post('/users.update', [UserController::class, 'update'])->name('users.update');
});

Route::controller(EventController::class)->group(function () {
   Route::get('/events', [EventController::class, 'index'] )->name('events.index');
   Route::get('/events/myevents', [EventController::class, 'myevents'] )->name('events.myevents');
   Route::get('/events/create', [EventController::class, 'create'] )->name('events.create');
   Route::post('/events/store', [EventController::class, 'store'] )->name('events.store');
   Route::get('/events/show/{event}', [EventController::class, 'show'] )->name('events.show');
   Route::get('/events/edit/{event}', [EventController::class, 'edit'] )->name('events.edit');
   Route::put('/events/update/{event}', [EventController::class, 'update'] )->name('events.update');
   Route::get('/events/pending', [EventController::class, 'pending'] )->name('events.pending');
   Route::get('/events/join/{event}', [EventController::class, 'join'] )->name('events.join');
   Route::get('/events/approve/{event}', [EventController::class, 'approve'] )->name('events.approve');
   Route::get('/events/accept/{event}/{participant}', [EventController::class, 'accept'] )->name('events.accept');
   Route::get('/events/reject/{event}/{participant}', [EventController::class, 'reject'] )->name('events.reject');

   Route::get('/events/acceptEvent/{event}', [EventController::class, 'acceptEvent'] )->name('events.acceptEvent');
   Route::get('/events/rejectEvent/{event}', [EventController::class, 'rejectEvent'] )->name('events.rejectEvent');
   Route::get('/events/endEvent/{event}', [EventController::class, 'endEvent'] )->name('events.endEvent');
});

Route::controller(ProcessController::class)->group(function () {
    Route::get('/processes/{event}', [ProcessController::class, 'index'])->name('processes.index');
    Route::post('/processes/store/{event}', [ProcessController::class, 'store'] )->name('processes.store');
    Route::put('/processes/update/{process}', [ProcessController::class, 'update'] )->name('processes.update');
    Route::get('/processes/destroy/{process}/{event}', [ProcessController::class, 'destroy'] )->name('processes.destroy');
});

Route::controller(ImageController::class)->group(function () {
    Route::post('/upload-image', [ImageController::class, 'upload'])->name('upload.image');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('/events' , EventController::class);
    Route::resource('/users' , UserController::class);
    Route::resource('/processes', ProcessController::class);
    Route::resource('/certificates', CertificateController::class);
});

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

//Route::middleware('auth')->group(function () {
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//});

Route::post('/postIt/update',[ProcessController::class, 'updatePostIt'])->name('postit.update');

require __DIR__.'/auth.php';
