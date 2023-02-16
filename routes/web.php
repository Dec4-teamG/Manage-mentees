<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\QiitaController;
use App\Http\Controllers\MenteesController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\ArticleSearchController;

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

Route::resource('manage', EvaluationController::class);

Route::resource('permission', PermissionController::class);

Route::resource('user', UserController::class);

Route::get('/article', [ArticleSearchController::class, 'create'])->name('article');
Route::get('/article/search', [ArticleSearchController::class, 'index'])->name('article.search');

// Route::resource('qiita', QiitaController::class);

Route::get('permission/{permission}/createNew',[PermissionController::class,'createNew'])->name('permission.createNew');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/article', [QiitaController::class, 'index'])->name('article');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/article', function () {
//     return view('manage.article');
// })->name('article');

Route::resource('mypage', MypageController::class);

Route::resource('mentees', MenteesController::class);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




require __DIR__.'/auth.php';
