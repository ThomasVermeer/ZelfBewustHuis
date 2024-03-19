<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Models\Project;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocationController;

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
//     return view('homepage');
// });



Route::get('/', [HomeController::class, 'index'])->name('homepage');

Route::get('/over_ons_pagina', [AboutUsController::class, 'publicIndex'])->name('over_ons_pagina');

Route::middleware('auth')->group(function () {
    Route::get('/over_ons', [AboutUsController::class, 'index'])->name('about_us.index');
    Route::get('/about_us/edit', [AboutUsController::class, 'editAboutUs'])->name('about_us.edit');
    Route::post('/about_us/update', [AboutUsController::class, 'updateAboutUs'])->name('about_us.update');

    //employees
    Route::get('/about_us/employees', [AboutUsController::class, 'editEmployee'])->name('about_us.employees.edit');
    Route::post('/about_us/employees', [AboutUsController::class, 'updateEmployee'])->name('about_us.employees.update');
    Route::get('/about_us/employees/create', [AboutUsController::class, 'createEmployee'])->name('about_us.employees.create');
    Route::delete('/about_us/employees/{employee}', [AboutUsController::class, 'destroyEmployee'])->name('about_us.employees.destroy');

    //partners
    Route::get('/about_us/partners', [AboutUsController::class, 'editPartner'])->name('about_us.partners.edit');
    Route::post('/about_us/partners', [AboutUsController::class, 'updatePartner'])->name('about_us.partners.update');
    Route::get('/about_us/partners/create', [AboutUsController::class, 'createPartner'])->name('about_us.partners.create');
    Route::delete('/about_us/partners/{partner}', [AboutUsController::class, 'destroyPartner'])->name('about_us.partners.destroy');
});

Route::view('/kalender', 'kalender.index')->name('kalender.index');


// Route::resource('projects', ProjectController::class);
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');


Route::resource('locations', LocationController::class);

Route::resource('events', EventController::class);


Route::get('/calendar', [CalendarController::class, 'index']);

Route::middleware('auth')->group(function () {
    // projects
    Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
    Route::post('/projects/store', [ProjectController::class, 'store'])->name('projects.store');
    Route::get('/projects/edit', [ProjectController::class, 'edit'])->name('projects.edit');
    Route::put('/projects/{project}/update', [ProjectController::class, 'update'])->name('projects.update');
    Route::delete('/projects/{project}/delete', [ProjectController::class, 'destroy'])->name('projects.destroy');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
