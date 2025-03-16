<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

// Route::get("/", [WelcomeController::class, "welcome"])->name("welcome");
// Route::get('/notes', [NoteController::class, 'index'])->name('note.index');
// Route::get('/notes/create', [NoteController::class, 'create'])->name('note.create');
// Route::post('/notes', [NoteController::class,'store'])->name('note.store');
// Route::get('/notes/{note}', [NoteController::class, 'show'])->name('note.show');
// Route::get('/notess/{note}/edit', [NoteController::class, 'edit'])->name('note.edit');
// Route::put('/notes/{note}', [NoteController::class, 'update'])->name('note.update');
// Route::delete('/notes/{note}', [NoteController::class, 'destroy'])->name('note.destroy');

Route::resource('notes', NoteController::class);
