<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MbtiController;
use App\Http\Controllers\MbtiSortController;
use App\Http\Controllers\FreeController;
use App\Http\Controllers\SuggestController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MbtiCommentController;
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

Auth::routes(['verify'=>true]);

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('/auth')->group(function(){
    Route::get('/register', [UserController::class, 'registerPage'])->name('registerPage');
    Route::post('/register', [UserController::class, 'register'])->name('register');
    Route::get('/login', [UserController::class, 'loginPage'])->name('loginPage');
    Route::post('/login', [UserController::class, 'login'])->name('login');
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
});

Route::get('/mbti', [MbtiController::class, 'index'])->name('mbtis.index');

Route::prefix('/mbti')->group(function(){
    Route::prefix('/enfj')->group(function (){
        Route::get('/', [MbtiSortController::class, 'index'])->name('mbtis.enfj.index');
        Route::get('/create', [MbtiSortController::class, 'create'])->name('mbtis.enfj.create')->middleware('auth');
        Route::post('/', [MbtiSortController::class, 'store'])->name('mbtis.enfj.store')->middleware('auth');
        Route::get('/{enfj}', [MbtiSortController::class, 'show'])->name('mbtis.enfj.show');
        Route::get('/{enfj}/edit', [MbtiSortController::class, 'edit'])->name('mbtis.enfj.edit')->middleware('auth');
        Route::put('/{enfj}', [MbtiSortController::class, 'update'])->name('mbtis.enfj.update')->middleware('auth');
        Route::delete('/{enfj}', [MbtiSortController::class, 'destroy'])->name('mbtis.enfj.destroy')->middleware('auth');
        Route::prefix('/{enfj}/comments')->group(function(){
            Route::post('/', [MbtiCommentController::class, 'commentStore'])->name('enfj.comments.store')->middleware('auth');
            Route::post('/{comment}', [MbtiCommentController::class, 'commentDestroy'])->name('enfj.comments.destroy')->middleware('auth');
            Route::post('/{comment}/reply', [MbtiCommentController::class, 'commentReplyStore'])->name('enfj.comments.reply.store')->middleware('auth');
        });
    });

    Route::prefix('/enfp')->group(function (){
        Route::get('/', [MbtiSortController::class, 'index'])->name('mbtis.enfp.index');
        Route::get('/create', [MbtiSortController::class, 'create'])->name('mbtis.enfp.create')->middleware('auth');
        Route::post('/', [MbtiSortController::class, 'store'])->name('mbtis.enfp.store')->middleware('auth');
        Route::get('/{enfp}', [MbtiSortController::class, 'show'])->name('mbtis.enfp.show');
        Route::get('/{enfp}/edit', [MbtiSortController::class, 'edit'])->name('mbtis.enfp.edit')->middleware('auth');
        Route::put('/{enfp}', [MbtiSortController::class, 'update'])->name('mbtis.enfp.update')->middleware('auth');
        Route::delete('/{enfp}', [MbtiSortController::class, 'destroy'])->name('mbtis.enfp.destroy')->middleware('auth');
    });

    Route::prefix('/entj')->group(function (){
        Route::get('/', [MbtiSortController::class, 'index'])->name('mbtis.entj.index');
        Route::get('/create', [MbtiSortController::class, 'create'])->name('mbtis.entj.create')->middleware('auth');
        Route::post('/', [MbtiSortController::class, 'store'])->name('mbtis.entj.store')->middleware('auth');
        Route::get('/{entj}', [MbtiSortController::class, 'show'])->name('mbtis.entj.show');
        Route::get('/{entj}/edit', [MbtiSortController::class, 'edit'])->name('mbtis.entj.edit')->middleware('auth');
        Route::put('/{entj}', [MbtiSortController::class, 'update'])->name('mbtis.entj.update')->middleware('auth');
        Route::delete('/{entj}', [MbtiSortController::class, 'destroy'])->name('mbtis.entj.destroy')->middleware('auth');
    });

    Route::prefix('/entp')->group(function (){
        Route::get('/', [MbtiSortController::class, 'index'])->name('mbtis.entp.index');
        Route::get('/create', [MbtiSortController::class, 'create'])->name('mbtis.entp.create')->middleware('auth');
        Route::post('/', [MbtiSortController::class, 'store'])->name('mbtis.entp.store')->middleware('auth');
        Route::get('/{entp}', [MbtiSortController::class, 'show'])->name('mbtis.entp.show');
        Route::get('/{entp}/edit', [MbtiSortController::class, 'edit'])->name('mbtis.entp.edit')->middleware('auth');
        Route::put('/{entp}', [MbtiSortController::class, 'update'])->name('mbtis.entp.update')->middleware('auth');
        Route::delete('/{entp}', [MbtiSortController::class, 'destroy'])->name('mbtis.entp.destroy')->middleware('auth');
    });

    Route::prefix('/esfj')->group(function (){
        Route::get('/', [MbtiSortController::class, 'index'])->name('mbtis.esfj.index');
        Route::get('/create', [MbtiSortController::class, 'create'])->name('mbtis.esfj.create')->middleware('auth');
        Route::post('/', [MbtiSortController::class, 'store'])->name('mbtis.esfj.store')->middleware('auth');
        Route::get('/{esfj}', [MbtiSortController::class, 'show'])->name('mbtis.esfj.show');
        Route::get('/{esfj}/edit', [MbtiSortController::class, 'edit'])->name('mbtis.esfj.edit')->middleware('auth');
        Route::put('/{esfj}', [MbtiSortController::class, 'update'])->name('mbtis.esfj.update')->middleware('auth');
        Route::delete('/{esfj}', [MbtiSortController::class, 'destroy'])->name('mbtis.esfj.destroy')->middleware('auth');
    });

    Route::prefix('/esfp')->group(function (){
        Route::get('/', [MbtiSortController::class, 'index'])->name('mbtis.esfp.index');
        Route::get('/create', [MbtiSortController::class, 'create'])->name('mbtis.esfp.create')->middleware('auth');
        Route::post('/', [MbtiSortController::class, 'store'])->name('mbtis.esfp.store')->middleware('auth');
        Route::get('/{esfp}', [MbtiSortController::class, 'show'])->name('mbtis.esfp.show');
        Route::get('/{esfp}/edit', [MbtiSortController::class, 'edit'])->name('mbtis.esfp.edit')->middleware('auth');
        Route::put('/{esfp}', [MbtiSortController::class, 'update'])->name('mbtis.esfp.update')->middleware('auth');
        Route::delete('/{esfp}', [MbtiSortController::class, 'destroy'])->name('mbtis.esfp.destroy')->middleware('auth');
    });

    Route::prefix('/estj')->group(function (){
        Route::get('/', [MbtiSortController::class, 'index'])->name('mbtis.estj.index');
        Route::get('/create', [MbtiSortController::class, 'create'])->name('mbtis.estj.create')->middleware('auth');
        Route::post('/', [MbtiSortController::class, 'store'])->name('mbtis.estj.store')->middleware('auth');
        Route::get('/{estj}', [MbtiSortController::class, 'show'])->name('mbtis.estj.show');
        Route::get('/{estj}/edit', [MbtiSortController::class, 'edit'])->name('mbtis.estj.edit')->middleware('auth');
        Route::put('/{estj}', [MbtiSortController::class, 'update'])->name('mbtis.estj.update')->middleware('auth');
        Route::delete('/{estj}', [MbtiSortController::class, 'destroy'])->name('mbtis.estj.destroy')->middleware('auth');
    });

    Route::prefix('/estp')->group(function (){
        Route::get('/', [MbtiSortController::class, 'index'])->name('mbtis.estp.index');
        Route::get('/create', [MbtiSortController::class, 'create'])->name('mbtis.estp.create');
        Route::post('/', [MbtiSortController::class, 'store'])->name('mbtis.estp.store');
        Route::get('/{estp}', [MbtiSortController::class, 'show'])->name('mbtis.estp.show');
        Route::get('/{estp}/edit', [MbtiSortController::class, 'edit'])->name('mbtis.estp.edit')->middleware('auth');
        Route::put('/{estp}', [MbtiSortController::class, 'update'])->name('mbtis.estp.update')->middleware('auth');
        Route::delete('/{estp}', [MbtiSortController::class, 'destroy'])->name('mbtis.estp.destroy')->middleware('auth');
    });

    Route::prefix('/infj')->group(function (){
        Route::get('/', [MbtiSortController::class, 'index'])->name('mbtis.infj.index');
        Route::get('/create', [MbtiSortController::class, 'create'])->name('mbtis.infj.create')->middleware('auth');
        Route::post('/', [MbtiSortController::class, 'store'])->name('mbtis.infj.store')->middleware('auth');
        Route::get('/{infj}', [MbtiSortController::class, 'show'])->name('mbtis.infj.show');
        Route::get('/{infj}/edit', [MbtiSortController::class, 'edit'])->name('mbtis.infj.edit')->middleware('auth');
        Route::put('/{infj}', [MbtiSortController::class, 'update'])->name('mbtis.infj.update')->middleware('auth');
        Route::delete('/{infj}', [MbtiSortController::class, 'destroy'])->name('mbtis.infj.destroy')->middleware('auth');
    });

    Route::prefix('/infp')->group(function (){
        Route::get('/', [MbtiSortController::class, 'index'])->name('mbtis.infp.index');
        Route::get('/create', [MbtiSortController::class, 'create'])->name('mbtis.infp.create')->middleware('auth');
        Route::post('/', [MbtiSortController::class, 'store'])->name('mbtis.infp.store')->middleware('auth');
        Route::get('/{infp}', [MbtiSortController::class, 'show'])->name('mbtis.infp.show');
        Route::get('/{infp}/edit', [MbtiSortController::class, 'edit'])->name('mbtis.infp.edit')->middleware('auth');
        Route::put('/{infp}', [MbtiSortController::class, 'update'])->name('mbtis.infp.update')->middleware('auth');
        Route::delete('/{infp}', [MbtiSortController::class, 'destroy'])->name('mbtis.infp.destroy')->middleware('auth');
    });

    Route::prefix('/intj')->group(function (){
        Route::get('/', [MbtiSortController::class, 'index'])->name('mbtis.intj.index');
        Route::get('/create', [MbtiSortController::class, 'create'])->name('mbtis.intj.create')->middleware('auth');
        Route::post('/', [MbtiSortController::class, 'store'])->name('mbtis.intj.store')->middleware('auth');
        Route::get('/{intj}', [MbtiSortController::class, 'show'])->name('mbtis.intj.show');
        Route::get('/{intj}/edit', [MbtiSortController::class, 'edit'])->name('mbtis.intj.edit')->middleware('auth');
        Route::put('/{intj}', [MbtiSortController::class, 'update'])->name('mbtis.intj.update')->middleware('auth');
        Route::delete('/{intj}', [MbtiSortController::class, 'destroy'])->name('mbtis.intj.destroy')->middleware('auth');
    });

    Route::prefix('/intp')->group(function (){
        Route::get('/', [MbtiSortController::class, 'index'])->name('mbtis.intp.index');
        Route::get('/create', [MbtiSortController::class, 'create'])->name('mbtis.intp.create')->middleware('auth');
        Route::post('/', [MbtiSortController::class, 'store'])->name('mbtis.intp.store')->middleware('auth');
        Route::get('/{intp}', [MbtiSortController::class, 'show'])->name('mbtis.intp.show');
        Route::get('/{intp}/edit', [MbtiSortController::class, 'edit'])->name('mbtis.intp.edit')->middleware('auth');
        Route::put('/{intp}', [MbtiSortController::class, 'update'])->name('mbtis.intp.update')->middleware('auth');
        Route::delete('/{intp}', [MbtiSortController::class, 'destroy'])->name('mbtis.intp.destroy')->middleware('auth');
    });

    Route::prefix('/isfj')->group(function (){
        Route::get('/', [MbtiSortController::class, 'index'])->name('mbtis.isfj.index');
        Route::get('/create', [MbtiSortController::class, 'create'])->name('mbtis.isfj.create')->middleware('auth');
        Route::post('/', [MbtiSortController::class, 'store'])->name('mbtis.isfj.store')->middleware('auth');
        Route::get('/{isfj}', [MbtiSortController::class, 'show'])->name('mbtis.isfj.show');
        Route::get('/{isfj}/edit', [MbtiSortController::class, 'edit'])->name('mbtis.isfj.edit')->middleware('auth');
        Route::put('/{isfj}', [MbtiSortController::class, 'update'])->name('mbtis.isfj.update')->middleware('auth');
        Route::delete('/{isfj}', [MbtiSortController::class, 'destroy'])->name('mbtis.isfj.destroy')->middleware('auth');
    });

    Route::prefix('/isfp')->group(function (){
        Route::get('/', [MbtiSortController::class, 'index'])->name('mbtis.isfp.index');
        Route::get('/create', [MbtiSortController::class, 'create'])->name('mbtis.isfp.create')->middleware('auth');
        Route::post('/', [MbtiSortController::class, 'store'])->name('mbtis.isfp.store')->middleware('auth');
        Route::get('/{isfp}', [MbtiSortController::class, 'show'])->name('mbtis.isfp.show');
        Route::get('/{isfp}/edit', [MbtiSortController::class, 'edit'])->name('mbtis.isfp.edit')->middleware('auth');
        Route::put('/{isfp}', [MbtiSortController::class, 'update'])->name('mbtis.isfp.update')->middleware('auth');
        Route::delete('/{isfp}', [MbtiSortController::class, 'destroy'])->name('mbtis.isfp.destroy')->middleware('auth');
    });

    Route::prefix('/istj')->group(function (){
        Route::get('/', [MbtiSortController::class, 'index'])->name('mbtis.istj.index');
        Route::get('/create', [MbtiSortController::class, 'create'])->name('mbtis.istj.create')->middleware('auth');
        Route::post('/', [MbtiSortController::class, 'store'])->name('mbtis.istj.store')->middleware('auth');
        Route::get('/{istj}', [MbtiSortController::class, 'show'])->name('mbtis.istj.show');
        Route::get('/{istj}/edit', [MbtiSortController::class, 'edit'])->name('mbtis.istj.edit')->middleware('auth');
        Route::put('/{istj}', [MbtiSortController::class, 'update'])->name('mbtis.istj.update')->middleware('auth');
        Route::delete('/{istj}', [MbtiSortController::class, 'destroy'])->name('mbtis.istj.destroy')->middleware('auth');
    });

    Route::prefix('/istp')->group(function (){
        Route::get('/', [MbtiSortController::class, 'index'])->name('mbtis.istp.index');
        Route::get('/create', [MbtiSortController::class, 'create'])->name('mbtis.istp.create')->middleware('auth');
        Route::post('/', [MbtiSortController::class, 'store'])->name('mbtis.istp.store')->middleware('auth');
        Route::get('/{istp}', [MbtiSortController::class, 'show'])->name('mbtis.istp.show');
        Route::get('/{istp}/edit', [MbtiSortController::class, 'edit'])->name('mbtis.istp.edit')->middleware('auth');
        Route::put('/{istp}', [MbtiSortController::class, 'update'])->name('mbtis.istp.update')->middleware('auth');
        Route::delete('/{istp}', [MbtiSortController::class, 'destroy'])->name('mbtis.istp.destroy')->middleware('auth');
    });
});

Route::prefix('/frees')->group(function(){
    Route::get('/', [FreeController::class, 'index'])->name('frees.index');
    Route::get('/create', [FreeController::class, 'create'])->name('frees.create')->middleware('auth');
    Route::post('/', [FreeController::class, 'store'])->name('frees.store')->middleware('auth');
    Route::get('/{free}', [FreeController::class, 'show'])->name('frees.show');
    Route::get('/{free}/edit', [FreeController::class, 'edit'])->name('frees.edit')->middleware('auth');
    Route::put('/{free}', [FreeController::class, 'update'])->name('frees.update')->middleware('auth');
    Route::delete('/{free}', [FreeController::class, 'destroy'])->name('frees.destroy')->middleware('auth');
});

Route::prefix('/suggests')->group(function(){
    Route::get('/', [SuggestController::class, 'index'])->name('suggests.index');
    Route::get('/create', [SuggestController::class, 'create'])->name('suggests.create')->middleware('auth');
    Route::post('/', [SuggestController::class, 'store'])->name('suggests.store')->middleware('auth');
    Route::get('/{suggest}', [SuggestController::class, 'show'])->name('suggests.show');
    Route::get('/{suggest}/edit', [SuggestController::class, 'edit'])->name('suggests.edit')->middleware('auth');
    Route::put('/{suggest}', [SuggestController::class, 'update'])->name('suggests.update')->middleware('auth');
    Route::delete('/{suggest}', [SuggestController::class, 'destroy'])->name('suggests.destroy')->middleware('auth');
});
