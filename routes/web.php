<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\StudentController;

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

Route::middleware(['auth', 'verified'])->group(function () {
    Route::redirect('/dashboard', '/admin')->name('dashboard');
});

Route::middleware(['auth', 'admin'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');

    // Student Routes
    Route::get('/students', [StudentController::class, 'index'])->name('students.index');
    Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
    Route::post('/students', [StudentController::class, 'store'])->name('students.store');
    Route::get('/students/{student}', [StudentController::class, 'show'])->name('students.show');
    Route::get('/students/{student}/edit', [StudentController::class, 'edit'])->name('students.edit');
    Route::put('/students/{student}', [StudentController::class, 'update'])->name('students.update');
    Route::delete('/students/{student}', [StudentController::class, 'destroy'])->name('students.destroy');

    // Grade Routes
    Route::get('/students/{student}/grades/create', [StudentController::class, 'createGrade'])->name('students.createGrade');
    Route::post('/students/{student}/grades', [StudentController::class, 'storeGrade'])->name('students.storeGrade');
    Route::get('/students/{student}/grades/{grade}/edit', [StudentController::class, 'editGrade'])->name('students.editGrade');
    Route::put('/students/{student}/grades/{grade}', [StudentController::class, 'updateGrade'])->name('students.updateGrade');
    Route::delete('/students/{student}/grades/{grade}', [StudentController::class, 'destroyGrade'])->name('students.destroyGrade');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
