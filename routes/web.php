<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuizController;
use App\Livewire\Quiz;
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
Route::get('/mis-quiz', [QuizController::class, 'index'])->middleware('auth')->name('quiz');
Route::get('/sala/finalizar/{sala}/{resumen}', [QuizController::class, 'finalizar'])->name('quiz-finalizar');
Route::get('sala/resumen/{sala}', [QuizController::class, 'verResumen'])->middleware('auth')->name('show.resumen');
// Route::get('sala/{sala}/editar', [QuizController::class, 'editar'])->middleware('auth')->name('sala.editar');
Route::get('/sala/{pin}/{nombre}', [QuizController::class, 'Game'])->name('game');


Route::get('/crear', function () {
    return view('quiz.crearQuiz');
})->middleware('auth')->name('crear-quiz');

Route::get('/welcome', function () {
    return view('welcome');
})->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
