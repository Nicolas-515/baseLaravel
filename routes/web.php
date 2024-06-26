<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
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

Route::get('/', [HomeController::class, 'fetchHomeData'])->name('home');
Route::get('/sobre', [HomeController::class, 'sobre'])->name('sobre');
Route::get('/personagens', [HomeController::class, 'fetchCharatacterData'])->name('home.index_character');
Route::any('/personagens/save', [HomeController::class, 'saveCharacterToUser'])->middleware(['auth', 'verified'])->name('home.saveCharacterToUser');
Route::any('/personagens/mine', [HomeController::class, 'showUserCharacters'])->middleware(['auth', 'verified'])->name('home.showUserCharacters');
Route::any('/personagens/mine/{character}/edit', [HomeController::class, 'editCharacterFromUser'])->middleware(['auth', 'verified'])->name('home.editCharacterFromUser');
Route::any('/personagens/mine/{character}/delete', [HomeController::class, 'deleteCharacterFromUser'])->middleware(['auth', 'verified'])->name('home.deleteCharacterFromUser');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

#Dashboard Routes

Route::middleware(['auth','role:user'])->group(
    function(){
        Route::get('/user/dashboard', [UserController::class, 'userDashboard'])->name('user.user_dashboard');
        Route::get('/user/logout', [UserController::class, 'userLogout'])->name('user.user_logout');
    }
);

Route::get('/user/login', [UserController::class, 'userLogin'])->name('user.user_login');

Route::middleware(['auth','role:admin'])->group(
    function(){
        Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard'])->name('admin.dashboard');
        Route::get('/admin/logout', [AdminController::class, 'adminLogout'])->name('admin.logout');
    }
);

Route::get('/admin/login', [AdminController::class, 'adminLogin'])->name('admin.login');

