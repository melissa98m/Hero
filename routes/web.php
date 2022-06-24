<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HeroController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\UniverseController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('heroes', HeroController::class);
Route::resource('skills', SkillController::class);
Route::resource('universes', UniverseController::class);


Route::get('/contact-us', [ContactController::class, 'createForm']);
Route::post('/contact-us', [ContactController::class, 'ContactForm'])->name('contact.store');

require __DIR__.'/auth.php';
