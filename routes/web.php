<?php

use App\Http\Controllers\ConversationsController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\UpdateLastSeenMiddleware;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
})->name('/');

Route::get('/app', function () {
    return view('appComponents.chatView');
})->middleware(['auth', 'verified',UpdateLastSeenMiddleware::class])->name('dashboard');


Route::middleware(['auth',UpdateLastSeenMiddleware::class])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/users', function () {
    $list_users=User::latest()->simplePaginate(8);
    return view('appComponents.usersPage',compact('list_users'));
})->middleware(UpdateLastSeenMiddleware::class,'auth')->name('users');

Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('/');
})->name('logout');

Route::post('/sendMessage',[MessagesController::class,'sendMess'])->middleware(UpdateLastSeenMiddleware::class,'auth')->name('sendMessage');
Route::get('/Loadconversation',[ConversationsController::class,'HandleConversation'])->middleware(UpdateLastSeenMiddleware::class,'auth')->name('Loadconversation');
Route::get('/unseenMessages',[ConversationsController::class,'getUnseenMessages'])->middleware(UpdateLastSeenMiddleware::class,'auth')->name('unseenMessages');
Route::get('/getConversations',[ConversationsController::class,'getConversations'])->middleware(UpdateLastSeenMiddleware::class,'auth')->name('getConversations');

Route::get('/settings', [ProfileController::class, 'edit'])->middleware(['auth', 'verified'])->middleware(UpdateLastSeenMiddleware::class,'auth')->name('settings');

require __DIR__.'/auth.php';
