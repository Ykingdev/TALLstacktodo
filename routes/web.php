<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
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

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('completeNote/{id}', [NoteController::class, 'CompleteNote'])->name('completeNote');
Route::get('delete/{id}', [NoteController::class, 'delete'])->name('deleteNote');
Route::view('create', 'notes.create')->name('notes.create');
Route::get('setToDo/{id}', [NoteController::class, 'setToDo'])->name('setToDo');
Route::get('setInProgress/{id}', [NoteController::class, 'setInProgress'])->name('setInProgress');

require __DIR__.'/auth.php';
