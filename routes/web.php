<?php

use App\Http\Livewire\StudentsComponent;
use App\Http\Livewire\RestoreComponent;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('students', StudentsComponent::class)->name('student');
Route::get('students-restoe', RestoreComponent::class)->name('st-restore');
    Route::get('students-restoe/{id}', [RestoreComponent::class, 'trashed'])->name('st-restore.res');
