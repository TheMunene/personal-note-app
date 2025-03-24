<?php

use App\Http\Controllers\NoteController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::redirect('/', '/notes')->name('dashboard');

Route::middleware('auth', 'verified')->group(function (){
    // Route::get("/", [WelcomeController::class, "welcome"])->name("welcome");
// Route::get('/notes', [NoteController::class, 'index'])->name('note.index');
// Route::get('/notes/create', [NoteController::class, 'create'])->name('note.create');
// Route::post('/notes', [NoteController::class,'store'])->name('note.store');
// Route::get('/notes/{note}', [NoteController::class, 'show'])->name('note.show');
// Route::get('/notess/{note}/edit', [NoteController::class, 'edit'])->name('note.edit');
// Route::put('/notes/{note}', [NoteController::class, 'update'])->name('note.update');
// Route::delete('/notes/{note}', [NoteController::class, 'destroy'])->name('note.destroy');

Route::resource('notes', NoteController::class);

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';