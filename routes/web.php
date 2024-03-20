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


Route::view('/kalender', 'kalender.index')->name('kalender.index');


// Route::resource('projects', ProjectController::class);
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');

Route::get('/events', [EventController::class, 'index'])->name('events.index');

Route::resource('locations', LocationController::class);



Route::get('/calendar', [CalendarController::class, 'index']);

Route::middleware('auth')->group(function () {
    // projects

    Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
    Route::post('/projects/store', [ProjectController::class, 'store'])->name('projects.store');
    Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit'); // Voeg {project} parameter toe
    Route::put('/projects/{project}/update', [ProjectController::class, 'update'])->name('projects.update'); // Voeg {project} parameter toe
    Route::delete('/projects/{project}/delete', [ProjectController::class, 'destroy'])->name('projects.destroy'); // Voeg {project} parameter toe

    // events
    Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
    Route::post('/events/store', [EventController::class, 'store'])->name('events.store');
    Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit'); // Voeg {event} parameter toe
    Route::put('/events/{event}/update', [EventController::class, 'update'])->name('events.update'); // Voeg {event} parameter toe
    Route::delete('/events/{event}/delete', [EventController::class, 'destroy'])->name('events.destroy'); // Voeg {event} parameter toe

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/over_ons', [AboutUsController::class, 'index'])->name('about_us.index');
    Route::get('/about_us/edit', [AboutUsController::class, 'editAboutUs'])->name('about_us.edit');
    Route::post('/about_us/update', [AboutUsController::class, 'updateAboutUs'])->name('about_us.update');

    // Employees
    Route::get('/about_us/employees/{employee}', [AboutUsController::class, 'editEmployee'])->name('about_us.employeesEdit');
    Route::put('/about_us/employees/{employee}', [AboutUsController::class, 'updateEmployee'])->name('about_us.employees.update');
    Route::get('/about_us/employeesCreate', [AboutUsController::class, 'createEmployee'])->name('about_us.employeesCreate');
    Route::post('/about_us/employees/store', [AboutUsController::class, 'storeEmployee'])->name('about_us.employees.store');
    Route::delete('/about_us/employees/{employee}', [AboutUsController::class, 'destroyEmployee'])->name('about_us.employees.destroy');

    // Partners
    Route::get('/about_us/partners/{partner}', [AboutUsController::class, 'editPartner'])->name('about_us.partnersEdit');
    Route::put('/about_us/partners/{partner}', [AboutUsController::class, 'updatePartner'])->name('about_us.partners.update');
    Route::get('/about_us/partnersCreate', [AboutUsController::class, 'createPartner'])->name('about_us.partnersCreate');
    Route::post('/about_us/partners/store', [AboutUsController::class, 'storePartner'])->name('about_us.partners.store');
    Route::delete('/about_us/partners/{partner}', [AboutUsController::class, 'destroyPartner'])->name('about_us.partners.destroy');
});

Route::view('/kalender', 'kalender.index')->name('kalender.index');







Route::resource('locations', LocationController::class);



Route::get('/calendar', [CalendarController::class, 'index']);


require __DIR__ . '/auth.php';
