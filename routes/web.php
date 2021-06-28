<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Suggest\SuggestCommentController;
use App\Http\Controllers\TempController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Mbti\MbtiController;
use App\Http\Controllers\Mbti\MbtiSortController;
use App\Http\Controllers\Free\FreeController;
use App\Http\Controllers\Suggest\SuggestController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Mbti\MbtiCommentController;
use \App\Http\Controllers\Free\FreeCommentController;
use \App\Http\Controllers\Suggest\ConfirmPasswordController;
use \App\Http\Controllers\Admin\AdminUserController;
use \App\Http\Controllers\Admin\AllPostController;
use \App\Http\Controllers\Admin\AllCommentController;

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

Auth::routes(['verify' => true]);

Route::get('/login/google', [LoginController::class, 'redirectToProvider'])->name('google.login');
Route::get('/login/google/callback', [LoginController::class, 'handleProviderCallback']);

Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('verified');

Route::prefix('/admin')->group(function () {
    Route::get('/user', [AdminUserController::class, 'getUser'])->name('admin.getUser');
    Route::get('/user/search', [AdminUserController::class, 'search'])->name('admin.user.search');
    Route::get('/user/{id}/posts', [AdminUserController::class, 'userPost'])->name('admin.user.post');
    Route::post('/user/block', [AdminUserController::class, 'block'])->name('admin.user.block');
    Route::post('/user/remove/block', [AdminUserController::class, 'removeBlock'])->name('admin.user.remove.block');
    Route::get('/posts', [AllPostController::class, 'index'])->name('admin.get.post');
    Route::get('/posts/search', [AllPostController::class, 'search'])->name('admin.post.search');
    Route::post('/{post}/{id}/move', [AllPostController::class, 'moveToTemp'])->name('admin.post.move');
    Route::put('{post}/{id}/restore', [AllPostController::class, 'restore'])->name('admin.post.restore');
    Route::get('/comments', [AllCommentController::class, 'index'])->name('admin.get.comment');
});

Route::get('/temps', [TempController::class, 'index'])->name('temp.index');
Route::get('/temps/message', [TempController::class, 'showTempMessage'])->name('temp.message');
Route::get('/temps/{temp}', [TempController::class, 'show'])->name('temp.show');

Route::prefix('/auth',)->group(function () {
    Route::get('/{user}/info', [UserController::class, 'userInfo'])->name('info');
    Route::get('/{user}/posts', [UserController::class, 'userPost'])->name('user.post');
    Route::get('/{user}/comments', [UserController::class, 'userComment'])->name('user.comment');
    Route::get('/{user}/delete', [UserController::class, 'destroyPage'])->name('user.destroy')->middleware('password.confirm');
    Route::delete('/{user}/delete', [UserController::class, 'destroy'])->name('destroy');
});

Route::prefix('/mbti')->group(function () {
    Route::get('/', [MbtiController::class, 'index'])->name('mbtis.index');
    Route::get('/search', [MbtiController::class, 'search'])->name('mbtis.search');
});

Route::prefix('/enfj')->group(function () {
    Route::get('/', [MbtiSortController::class, 'index'])->name('enfj.index');
    Route::get('/search', [MbtiSortController::class, 'search'])->name('enfj.search');
    Route::get('/create', [MbtiSortController::class, 'create'])->name('enfj.create')->middleware('auth');
    Route::post('/', [MbtiSortController::class, 'store'])->name('enfj.store')->middleware('auth');
    Route::get('/{enfj}', [MbtiSortController::class, 'show'])->name('enfj.show');
    Route::get('/{enfj}/edit', [MbtiSortController::class, 'edit'])->name('enfj.edit')->middleware('auth');
    Route::put('/{enfj}', [MbtiSortController::class, 'update'])->name('enfj.update')->middleware('auth');
    Route::delete('/{enfj}', [MbtiSortController::class, 'destroy'])->name('enfj.destroy')->middleware('auth');
    Route::prefix('/{enfj}/comments')->group(function () {
        Route::post('/', [MbtiCommentController::class, 'store'])->name('enfj.comments.store')->middleware('auth');
        Route::put('/{comment}', [MbtiCommentController::class, 'update'])->name('enfj.comments.update')->middleware('auth');
        Route::post('/{comment}', [MbtiCommentController::class, 'destroy'])->name('enfj.comments.destroy')->middleware('auth');
        Route::post('/{comment}/reply', [MbtiCommentController::class, 'replyStore'])->name('enfj.comments.reply.store')->middleware('auth');
    });
});

Route::prefix('/enfp')->group(function () {
    Route::get('/', [MbtiSortController::class, 'index'])->name('enfp.index');
    Route::get('/search', [MbtiSortController::class, 'search'])->name('enfp.search');
    Route::get('/create', [MbtiSortController::class, 'create'])->name('enfp.create')->middleware('auth');
    Route::post('/', [MbtiSortController::class, 'store'])->name('enfp.store')->middleware('auth');
    Route::get('/{enfp}', [MbtiSortController::class, 'show'])->name('enfp.show');
    Route::get('/{enfp}/edit', [MbtiSortController::class, 'edit'])->name('enfp.edit')->middleware('auth');
    Route::put('/{enfp}', [MbtiSortController::class, 'update'])->name('enfp.update')->middleware('auth');
    Route::delete('/{enfp}', [MbtiSortController::class, 'destroy'])->name('enfp.destroy')->middleware('auth');
    Route::prefix('/{enfp}/comments')->group(function () {
        Route::post('/', [MbtiCommentController::class, 'store'])->name('enfp.comments.store')->middleware('auth');
        Route::put('/{comment}', [MbtiCommentController::class, 'update'])->name('enfp.comments.update')->middleware('auth');
        Route::post('/{comment}', [MbtiCommentController::class, 'destroy'])->name('enfp.comments.destroy')->middleware('auth');
        Route::post('/{comment}/reply', [MbtiCommentController::class, 'replyStore'])->name('enfp.comments.reply.store')->middleware('auth');
    });
});

Route::prefix('/entj')->group(function () {
    Route::get('/', [MbtiSortController::class, 'index'])->name('entj.index');
    Route::get('/search', [MbtiSortController::class, 'search'])->name('entj.search');
    Route::get('/create', [MbtiSortController::class, 'create'])->name('entj.create')->middleware('auth');
    Route::post('/', [MbtiSortController::class, 'store'])->name('entj.store')->middleware('auth');
    Route::get('/{entj}', [MbtiSortController::class, 'show'])->name('entj.show');
    Route::get('/{entj}/edit', [MbtiSortController::class, 'edit'])->name('entj.edit')->middleware('auth');
    Route::put('/{entj}', [MbtiSortController::class, 'update'])->name('entj.update')->middleware('auth');
    Route::delete('/{entj}', [MbtiSortController::class, 'destroy'])->name('entj.destroy')->middleware('auth');
    Route::prefix('/{entj}/comments')->group(function () {
        Route::post('/', [MbtiCommentController::class, 'store'])->name('entj.comments.store')->middleware('auth');
        Route::put('/{comment}', [MbtiCommentController::class, 'update'])->name('entj.comments.update')->middleware('auth');
        Route::post('/{comment}', [MbtiCommentController::class, 'destroy'])->name('entj.comments.destroy')->middleware('auth');
        Route::post('/{comment}/reply', [MbtiCommentController::class, 'replyStore'])->name('entj.comments.reply.store')->middleware('auth');
    });
});

Route::prefix('/entp')->group(function () {
    Route::get('/', [MbtiSortController::class, 'index'])->name('entp.index');
    Route::get('/search', [MbtiSortController::class, 'search'])->name('entp.search');
    Route::get('/create', [MbtiSortController::class, 'create'])->name('entp.create')->middleware('auth');
    Route::post('/', [MbtiSortController::class, 'store'])->name('entp.store')->middleware('auth');
    Route::get('/{entp}', [MbtiSortController::class, 'show'])->name('entp.show');
    Route::get('/{entp}/edit', [MbtiSortController::class, 'edit'])->name('entp.edit')->middleware('auth');
    Route::put('/{entp}', [MbtiSortController::class, 'update'])->name('entp.update')->middleware('auth');
    Route::delete('/{entp}', [MbtiSortController::class, 'destroy'])->name('entp.destroy')->middleware('auth');
    Route::prefix('/{entp}/comments')->group(function () {
        Route::post('/', [MbtiCommentController::class, 'store'])->name('entp.comments.store')->middleware('auth');
        Route::put('/{comment}', [MbtiCommentController::class, 'update'])->name('entp.comments.update')->middleware('auth');
        Route::post('/{comment}', [MbtiCommentController::class, 'destroy'])->name('entp.comments.destroy')->middleware('auth');
        Route::post('/{comment}/reply', [MbtiCommentController::class, 'replyStore'])->name('entp.comments.reply.store')->middleware('auth');
    });
});

Route::prefix('/esfj')->group(function () {
    Route::get('/', [MbtiSortController::class, 'index'])->name('esfj.index');
    Route::get('/search', [MbtiSortController::class, 'search'])->name('esfj.search');
    Route::get('/create', [MbtiSortController::class, 'create'])->name('esfj.create')->middleware('auth');
    Route::post('/', [MbtiSortController::class, 'store'])->name('esfj.store')->middleware('auth');
    Route::get('/{esfj}', [MbtiSortController::class, 'show'])->name('esfj.show');
    Route::get('/{esfj}/edit', [MbtiSortController::class, 'edit'])->name('esfj.edit')->middleware('auth');
    Route::put('/{esfj}', [MbtiSortController::class, 'update'])->name('esfj.update')->middleware('auth');
    Route::delete('/{esfj}', [MbtiSortController::class, 'destroy'])->name('esfj.destroy')->middleware('auth');
    Route::prefix('/{esfj}/comments')->group(function () {
        Route::post('/', [MbtiCommentController::class, 'store'])->name('esfj.comments.store')->middleware('auth');
        Route::put('/{comment}', [MbtiCommentController::class, 'update'])->name('esfj.comments.update')->middleware('auth');
        Route::post('/{comment}', [MbtiCommentController::class, 'destroy'])->name('esfj.comments.destroy')->middleware('auth');
        Route::post('/{comment}/reply', [MbtiCommentController::class, 'replyStore'])->name('esfj.comments.reply.store')->middleware('auth');
    });
});

Route::prefix('/esfp')->group(function () {
    Route::get('/', [MbtiSortController::class, 'index'])->name('esfp.index');
    Route::get('/search', [MbtiSortController::class, 'search'])->name('esfp.search');
    Route::get('/create', [MbtiSortController::class, 'create'])->name('esfp.create')->middleware('auth');
    Route::post('/', [MbtiSortController::class, 'store'])->name('esfp.store')->middleware('auth');
    Route::get('/{esfp}', [MbtiSortController::class, 'show'])->name('esfp.show');
    Route::get('/{esfp}/edit', [MbtiSortController::class, 'edit'])->name('esfp.edit')->middleware('auth');
    Route::put('/{esfp}', [MbtiSortController::class, 'update'])->name('esfp.update')->middleware('auth');
    Route::delete('/{esfp}', [MbtiSortController::class, 'destroy'])->name('esfp.destroy')->middleware('auth');
    Route::prefix('/{esfp}/comments')->group(function () {
        Route::post('/', [MbtiCommentController::class, 'store'])->name('esfp.comments.store')->middleware('auth');
        Route::put('/{comment}', [MbtiCommentController::class, 'update'])->name('esfp.comments.update')->middleware('auth');
        Route::post('/{comment}', [MbtiCommentController::class, 'destroy'])->name('esfp.comments.destroy')->middleware('auth');
        Route::post('/{comment}/reply', [MbtiCommentController::class, 'replyStore'])->name('esfp.comments.reply.store')->middleware('auth');
    });
});

Route::prefix('/estj')->group(function () {
    Route::get('/', [MbtiSortController::class, 'index'])->name('estj.index');
    Route::get('/search', [MbtiSortController::class, 'search'])->name('estj.search');
    Route::get('/create', [MbtiSortController::class, 'create'])->name('estj.create')->middleware('auth');
    Route::post('/', [MbtiSortController::class, 'store'])->name('estj.store')->middleware('auth');
    Route::get('/{estj}', [MbtiSortController::class, 'show'])->name('estj.show');
    Route::get('/{estj}/edit', [MbtiSortController::class, 'edit'])->name('estj.edit')->middleware('auth');
    Route::put('/{estj}', [MbtiSortController::class, 'update'])->name('estj.update')->middleware('auth');
    Route::delete('/{estj}', [MbtiSortController::class, 'destroy'])->name('estj.destroy')->middleware('auth');
    Route::prefix('/{estj}/comments')->group(function () {
        Route::post('/', [MbtiCommentController::class, 'store'])->name('estj.comments.store')->middleware('auth');
        Route::put('/{comment}', [MbtiCommentController::class, 'update'])->name('estj.comments.update')->middleware('auth');
        Route::post('/{comment}', [MbtiCommentController::class, 'destroy'])->name('estj.comments.destroy')->middleware('auth');
        Route::post('/{comment}/reply', [MbtiCommentController::class, 'replyStore'])->name('estj.comments.reply.store')->middleware('auth');
    });
});

Route::prefix('/estp')->group(function () {
    Route::get('/', [MbtiSortController::class, 'index'])->name('estp.index');
    Route::get('/search', [MbtiSortController::class, 'search'])->name('estp.search');
    Route::get('/create', [MbtiSortController::class, 'create'])->name('estp.create');
    Route::post('/', [MbtiSortController::class, 'store'])->name('estp.store');
    Route::get('/{estp}', [MbtiSortController::class, 'show'])->name('estp.show');
    Route::get('/{estp}/edit', [MbtiSortController::class, 'edit'])->name('estp.edit')->middleware('auth');
    Route::put('/{estp}', [MbtiSortController::class, 'update'])->name('estp.update')->middleware('auth');
    Route::delete('/{estp}', [MbtiSortController::class, 'destroy'])->name('estp.destroy')->middleware('auth');
    Route::prefix('/{estp}/comments')->group(function () {
        Route::post('/', [MbtiCommentController::class, 'store'])->name('estp.comments.store')->middleware('auth');
        Route::put('/{comment}', [MbtiCommentController::class, 'update'])->name('estp.comments.update')->middleware('auth');
        Route::post('/{comment}', [MbtiCommentController::class, 'destroy'])->name('estp.comments.destroy')->middleware('auth');
        Route::post('/{comment}/reply', [MbtiCommentController::class, 'replyStore'])->name('estp.comments.reply.store')->middleware('auth');
    });
});

Route::prefix('/infj')->group(function () {
    Route::get('/', [MbtiSortController::class, 'index'])->name('infj.index');
    Route::get('/search', [MbtiSortController::class, 'search'])->name('infj.search');
    Route::get('/create', [MbtiSortController::class, 'create'])->name('infj.create')->middleware('auth');
    Route::post('/', [MbtiSortController::class, 'store'])->name('infj.store')->middleware('auth');
    Route::get('/{infj}', [MbtiSortController::class, 'show'])->name('infj.show');
    Route::get('/{infj}/edit', [MbtiSortController::class, 'edit'])->name('infj.edit')->middleware('auth');
    Route::put('/{infj}', [MbtiSortController::class, 'update'])->name('infj.update')->middleware('auth');
    Route::delete('/{infj}', [MbtiSortController::class, 'destroy'])->name('infj.destroy')->middleware('auth');
    Route::prefix('/{infj}/comments')->group(function () {
        Route::post('/', [MbtiCommentController::class, 'store'])->name('infj.comments.store')->middleware('auth');
        Route::put('/{comment}', [MbtiCommentController::class, 'update'])->name('infj.comments.update')->middleware('auth');
        Route::post('/{comment}', [MbtiCommentController::class, 'destroy'])->name('infj.comments.destroy')->middleware('auth');
        Route::post('/{comment}/reply', [MbtiCommentController::class, 'replyStore'])->name('infj.comments.reply.store')->middleware('auth');
    });
});

Route::prefix('/infp')->group(function () {
    Route::get('/', [MbtiSortController::class, 'index'])->name('infp.index');
    Route::get('/search', [MbtiSortController::class, 'search'])->name('infp.search');
    Route::get('/create', [MbtiSortController::class, 'create'])->name('infp.create')->middleware('auth');
    Route::post('/', [MbtiSortController::class, 'store'])->name('infp.store')->middleware('auth');
    Route::get('/{infp}', [MbtiSortController::class, 'show'])->name('infp.show');
    Route::get('/{infp}/edit', [MbtiSortController::class, 'edit'])->name('infp.edit')->middleware('auth');
    Route::put('/{infp}', [MbtiSortController::class, 'update'])->name('infp.update')->middleware('auth');
    Route::delete('/{infp}', [MbtiSortController::class, 'destroy'])->name('infp.destroy')->middleware('auth');
    Route::prefix('/{infp}/comments')->group(function () {
        Route::post('/', [MbtiCommentController::class, 'store'])->name('infp.comments.store')->middleware('auth');
        Route::put('/{comment}', [MbtiCommentController::class, 'update'])->name('infp.comments.update')->middleware('auth');
        Route::post('/{comment}', [MbtiCommentController::class, 'destroy'])->name('infp.comments.destroy')->middleware('auth');
        Route::post('/{comment}/reply', [MbtiCommentController::class, 'replyStore'])->name('infp.comments.reply.store')->middleware('auth');
    });
});

Route::prefix('/intj')->group(function () {
    Route::get('/', [MbtiSortController::class, 'index'])->name('intj.index');
    Route::get('/search', [MbtiSortController::class, 'search'])->name('intj.search');
    Route::get('/create', [MbtiSortController::class, 'create'])->name('intj.create')->middleware('auth');
    Route::post('/', [MbtiSortController::class, 'store'])->name('intj.store')->middleware('auth');
    Route::get('/{intj}', [MbtiSortController::class, 'show'])->name('intj.show');
    Route::get('/{intj}/edit', [MbtiSortController::class, 'edit'])->name('intj.edit')->middleware('auth');
    Route::put('/{intj}', [MbtiSortController::class, 'update'])->name('intj.update')->middleware('auth');
    Route::delete('/{intj}', [MbtiSortController::class, 'destroy'])->name('intj.destroy')->middleware('auth');
    Route::prefix('/{intj}/comments')->group(function () {
        Route::post('/', [MbtiCommentController::class, 'store'])->name('intj.comments.store')->middleware('auth');
        Route::put('/{comment}', [MbtiCommentController::class, 'update'])->name('intj.comments.update')->middleware('auth');
        Route::post('/{comment}', [MbtiCommentController::class, 'destroy'])->name('intj.comments.destroy')->middleware('auth');
        Route::post('/{comment}/reply', [MbtiCommentController::class, 'replyStore'])->name('intj.comments.reply.store')->middleware('auth');
    });
});

Route::prefix('/intp')->group(function () {
    Route::get('/', [MbtiSortController::class, 'index'])->name('intp.index');
    Route::get('/search', [MbtiSortController::class, 'search'])->name('intp.search');
    Route::get('/create', [MbtiSortController::class, 'create'])->name('intp.create')->middleware('auth');
    Route::post('/', [MbtiSortController::class, 'store'])->name('intp.store')->middleware('auth');
    Route::get('/{intp}', [MbtiSortController::class, 'show'])->name('intp.show');
    Route::get('/{intp}/edit', [MbtiSortController::class, 'edit'])->name('intp.edit')->middleware('auth');
    Route::put('/{intp}', [MbtiSortController::class, 'update'])->name('intp.update')->middleware('auth');
    Route::delete('/{intp}', [MbtiSortController::class, 'destroy'])->name('intp.destroy')->middleware('auth');
    Route::prefix('/{intp}/comments')->group(function () {
        Route::post('/', [MbtiCommentController::class, 'store'])->name('intp.comments.store')->middleware('auth');
        Route::put('/{comment}', [MbtiCommentController::class, 'update'])->name('intp.comments.update')->middleware('auth');
        Route::post('/{comment}', [MbtiCommentController::class, 'destroy'])->name('intp.comments.destroy')->middleware('auth');
        Route::post('/{comment}/reply', [MbtiCommentController::class, 'replyStore'])->name('intp.comments.reply.store')->middleware('auth');
    });
});

Route::prefix('/isfj')->group(function () {
    Route::get('/', [MbtiSortController::class, 'index'])->name('isfj.index');
    Route::get('/search', [MbtiSortController::class, 'search'])->name('isfj.search');
    Route::get('/create', [MbtiSortController::class, 'create'])->name('isfj.create')->middleware('auth');
    Route::post('/', [MbtiSortController::class, 'store'])->name('isfj.store')->middleware('auth');
    Route::get('/{isfj}', [MbtiSortController::class, 'show'])->name('isfj.show');
    Route::get('/{isfj}/edit', [MbtiSortController::class, 'edit'])->name('isfj.edit')->middleware('auth');
    Route::put('/{isfj}', [MbtiSortController::class, 'update'])->name('isfj.update')->middleware('auth');
    Route::delete('/{isfj}', [MbtiSortController::class, 'destroy'])->name('isfj.destroy')->middleware('auth');
    Route::prefix('/{isfj}/comments')->group(function () {
        Route::post('/', [MbtiCommentController::class, 'store'])->name('isfj.comments.store')->middleware('auth');
        Route::put('/{comment}', [MbtiCommentController::class, 'update'])->name('isfj.comments.update')->middleware('auth');
        Route::post('/{comment}', [MbtiCommentController::class, 'destroy'])->name('isfj.comments.destroy')->middleware('auth');
        Route::post('/{comment}/reply', [MbtiCommentController::class, 'replyStore'])->name('isfj.comments.reply.store')->middleware('auth');
    });
});

Route::prefix('/isfp')->group(function () {
    Route::get('/', [MbtiSortController::class, 'index'])->name('isfp.index');
    Route::get('/search', [MbtiSortController::class, 'search'])->name('isfp.search');
    Route::get('/create', [MbtiSortController::class, 'create'])->name('isfp.create')->middleware('auth');
    Route::post('/', [MbtiSortController::class, 'store'])->name('isfp.store')->middleware('auth');
    Route::get('/{isfp}', [MbtiSortController::class, 'show'])->name('isfp.show');
    Route::get('/{isfp}/edit', [MbtiSortController::class, 'edit'])->name('isfp.edit')->middleware('auth');
    Route::put('/{isfp}', [MbtiSortController::class, 'update'])->name('isfp.update')->middleware('auth');
    Route::delete('/{isfp}', [MbtiSortController::class, 'destroy'])->name('isfp.destroy')->middleware('auth');
    Route::prefix('/{isfp}/comments')->group(function () {
        Route::post('/', [MbtiCommentController::class, 'store'])->name('isfp.comments.store')->middleware('auth');
        Route::put('/{comment}', [MbtiCommentController::class, 'update'])->name('isfp.comments.update')->middleware('auth');
        Route::post('/{comment}', [MbtiCommentController::class, 'destroy'])->name('isfp.comments.destroy')->middleware('auth');
        Route::post('/{comment}/reply', [MbtiCommentController::class, 'replyStore'])->name('isfp.comments.reply.store')->middleware('auth');
    });
});

Route::prefix('/istj')->group(function () {
    Route::get('/', [MbtiSortController::class, 'index'])->name('istj.index');
    Route::get('/search', [MbtiSortController::class, 'search'])->name('istj.search');
    Route::get('/create', [MbtiSortController::class, 'create'])->name('istj.create')->middleware('auth');
    Route::post('/', [MbtiSortController::class, 'store'])->name('istj.store')->middleware('auth');
    Route::get('/{istj}', [MbtiSortController::class, 'show'])->name('istj.show');
    Route::get('/{istj}/edit', [MbtiSortController::class, 'edit'])->name('istj.edit')->middleware('auth');
    Route::put('/{istj}', [MbtiSortController::class, 'update'])->name('istj.update')->middleware('auth');
    Route::delete('/{istj}', [MbtiSortController::class, 'destroy'])->name('istj.destroy')->middleware('auth');
    Route::prefix('/{istj}/comments')->group(function () {
        Route::post('/', [MbtiCommentController::class, 'store'])->name('istj.comments.store')->middleware('auth');
        Route::put('/{comment}', [MbtiCommentController::class, 'update'])->name('istj.comments.update')->middleware('auth');
        Route::post('/{comment}', [MbtiCommentController::class, 'destroy'])->name('istj.comments.destroy')->middleware('auth');
        Route::post('/{comment}/reply', [MbtiCommentController::class, 'replyStore'])->name('istj.comments.reply.store')->middleware('auth');
    });
});

Route::prefix('/istp')->group(function () {
    Route::get('/', [MbtiSortController::class, 'index'])->name('istp.index');
    Route::get('/search', [MbtiSortController::class, 'search'])->name('istp.search');
    Route::get('/create', [MbtiSortController::class, 'create'])->name('istp.create')->middleware('auth');
    Route::post('/', [MbtiSortController::class, 'store'])->name('istp.store')->middleware('auth');
    Route::get('/{istp}', [MbtiSortController::class, 'show'])->name('istp.show');
    Route::get('/{istp}/edit', [MbtiSortController::class, 'edit'])->name('istp.edit')->middleware('auth');
    Route::put('/{istp}', [MbtiSortController::class, 'update'])->name('istp.update')->middleware('auth');
    Route::delete('/{istp}', [MbtiSortController::class, 'destroy'])->name('istp.destroy')->middleware('auth');
    Route::prefix('/{istp}/comments')->group(function () {
        Route::post('/', [MbtiCommentController::class, 'store'])->name('istp.comments.store')->middleware('auth');
        Route::put('/{comment}', [MbtiCommentController::class, 'update'])->name('istp.comments.update')->middleware('auth');
        Route::post('/{comment}', [MbtiCommentController::class, 'destroy'])->name('istp.comments.destroy')->middleware('auth');
        Route::post('/{comment}/reply', [MbtiCommentController::class, 'replyStore'])->name('istp.comments.reply.store')->middleware('auth');
    });
});


Route::prefix('/frees')->group(function () {
    Route::get('/', [FreeController::class, 'index'])->name('frees.index');
    Route::get('/search', [FreeController::class, 'search'])->name('frees.search');
    Route::get('/create', [FreeController::class, 'create'])->name('frees.create')->middleware(['auth']);
    Route::post('/', [FreeController::class, 'store'])->name('frees.store')->middleware('auth');
    Route::get('/{free}', [FreeController::class, 'show'])->name('frees.show');
    Route::get('/{free}/edit', [FreeController::class, 'edit'])->name('frees.edit')->middleware('auth');
    Route::put('/{free}', [FreeController::class, 'update'])->name('frees.update')->middleware('auth');
    Route::delete('/{free}', [FreeController::class, 'destroy'])->name('frees.destroy')->middleware('auth');
    Route::prefix('/{free}/comments')->group(function () {
        Route::post('/', [FreeCommentController::class, 'store'])->name('frees.comments.store')->middleware('auth');
        Route::put('/{comment}', [FreeCommentController::class, 'update'])->name('frees.comments.update')->middleware('auth');
        Route::delete('/{comment}', [FreeCommentController::class, 'destroy'])->name('frees.comments.destroy')->middleware('auth');
        Route::post('/{comment}/reply', [FreeCommentController::class, 'replyStore'])->name('frees.comments.reply.store')->middleware('auth');
    });
});

Route::prefix('/suggests')->group(function () {
    Route::get('/', [SuggestController::class, 'index'])->name('suggests.index');
    Route::get('/create', [SuggestController::class, 'create'])->name('suggests.create')->middleware('auth');
    Route::post('/', [SuggestController::class, 'store'])->name('suggests.store')->middleware('auth');
    Route::get('/{suggest}', [SuggestController::class, 'show'])->name('suggests.show')->middleware(['auth', 'suggest.confirm']);
    Route::get('/{suggest}/edit', [SuggestController::class, 'edit'])->name('suggests.edit')->middleware('auth');
    Route::put('/{suggest}', [SuggestController::class, 'update'])->name('suggests.update')->middleware('auth');
    Route::delete('/{suggest}', [SuggestController::class, 'destroy'])->name('suggests.destroy')->middleware('auth');
    Route::get('password/confirm', [ConfirmPasswordController::class, 'confirmPage'])->name('suggests.confirm');
    Route::post('password/confirm', [ConfirmPasswordController::class, 'confirm']);
    Route::prefix('/{suggest}/comments')->group(function () {
        Route::post('/', [SuggestCommentController::class, 'store'])->name('suggests.comments.store')->middleware('auth');
        Route::put('/{comment}', [SuggestCommentController::class, 'update'])->name('suggests.comments.update')->middleware('auth');
        Route::delete('/{comment}', [SuggestCommentController::class, 'destroy'])->name('suggests.comments.destroy')->middleware('auth');
        Route::post('/{comment}/reply', [SuggestCommentController::class, 'replyStore'])->name('suggests.comments.reply.store')->middleware('auth');
    });
});

