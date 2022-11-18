<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\VilleController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\DocumentController;

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

Route::get('/', [ EtudiantController::class, 'index'])->name('etudiant.index');

Route::get('/etudiant/{etudiant}', [ EtudiantController::class, 'show'])->name('etudiant.show');
Route::get('/etudiant-create', [ EtudiantController::class, 'create'])->name('etudiant.create');
Route::post('/etudiant-create', [ EtudiantController::class, 'store'])->name('etudiant.store');

Route::get('/etudiant-edit/{etudiant}', [ EtudiantController::class, 'edit'])->name('etudiant.edit');
Route::put('/etudiant-edit/{etudiant}', [ EtudiantController::class, 'update'])->name('etudiant.update');
Route::delete('/etudiant-edit/{etudiant}', [ EtudiantController::class, 'destroy'])->name('etudiant.destroy');

Route::get('/login', [CustomAuthController::class, 'index'])->name('login');
Route::post('/login', [CustomAuthController::class, 'authentication'])->name('login.authentication');
Route::get('/registration', [CustomAuthController::class, 'create'])->name('user.registration');
Route::post('/registration-store', [CustomAuthController::class, 'store'])->name('user.store');

Route::get('/dashboard', [CustomAuthController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::get('/logout', [CustomAuthController::class, 'logout'])->name('logout');

Route::get('/lang/{locale}', [LocalizationController::class, 'index'])->name('lang');

// article
Route::get('/article', [ ArticleController::class, 'index'])->name('article.index')->middleware('auth');
Route::get('/article/{article}', [ ArticleController::class, 'show'])->name('article.show')->middleware('auth');
Route::get('/article-create', [ ArticleController::class, 'create'])->name('article.create')->middleware('auth');
Route::post('/article-create', [ ArticleController::class, 'store'])->name('article.store')->middleware('auth');

Route::get('/article-edit/{article}', [ ArticleController::class, 'edit'])->name('article.edit')->middleware('auth');
Route::put('/article-edit/{article}', [ ArticleController::class, 'update'])->name('article.update')->middleware('auth');
Route::delete('/article-edit/{article}', [ ArticleController::class, 'destroy'])->name('article.destroy')->middleware('auth');

//document
Route::get('/document', [ DocumentController::class, 'index' ])->name('document.index')->middleware('auth');
Route::get('/document-add', [ DocumentController::class, 'create' ])->name('document.create')->middleware('auth');
Route::post('/document-add', [ DocumentController::class, 'store' ])->name('document.store')->middleware('auth');
Route::get('/document-download/{document}', [ DocumentController::class, 'download'])->name('document.download')->middleware('auth');
Route::get('/document-edit/{document}', [ DocumentController::class, 'edit'])->name('document.edit')->middleware('auth');
Route::put('/document/{document}', [ DocumentController::class, 'update'])->name('document.update')->middleware('auth');
Route::delete('/document-edit/{document}', [ DocumentController::class, 'destroy'])->name('document.destroy')->middleware('auth');
