<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;

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
//     return view('home');
// });
Route::get('home',[HomeController::class,'index']);

Route::get('/about', function () {
    return view('about');
});
Route::get('/departements', function () {
    return view('departements');
});
Route::get('doctors', function(){
    return view('doctors');
});
Route::get('contact',function(){
    return view('contact');
});
Route::get('docteurs/chat', function () {
    return view('docteur.chat');
});
Route::get('/',[UserController::class,'index'])->name('docteur.home')->middleware(['auth','verified']);
Route::get('patients/envoyer', [MessageController::class,'envoyer'])->name('envoyer');
Route::post('patients/envoyer',[MessageController::class,'envoi'])->name('envoi');

Route::get('/docteurs/messages',[UserController::class,'messages'])->name('docteurs.messages')->middleware(['auth','verified']);
Route::get('/docteurs/messages/{id}',[UserController::class,'show'])->name('docteurs.show')->middleware(['auth','verified']);
Route::post('/docteurs/messages/{id}',[UserController::class,'reponse'])->name('docteurs.reponse')->middleware(['auth','verified']);
Route::get('/docteurs/repondre/{id}',[UserController::class,'repondre'])->name('docteurs.repondre')->middleware(['auth','verified']);
Route::post('/docteurs/repondre/envoi/{id}',[UserController::class,'envoi'])->name('message.store')->middleware(['auth','verified']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
