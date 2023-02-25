<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ReplyController;
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

Route::get('/', function () {

    $comments = \App\Models\Comment::with('user','replies.user')
    ->orderBy('id','DESC')
    ->paginate();
    
    $users = \App\Models\User::orderBy('id','DESC')->take(10)->get();

    return view('welcome',['comments' => $comments, 'users' => $users]);

})->middleware(['auth', 'verified'])->name('home');;


Route::post('/comments',[CommentController::class, 'store'])->name('comments.store')->middleware('auth');

Route::post('/replies/{comment}',[ReplyController::class, 'store'])->name('replies.store')->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
