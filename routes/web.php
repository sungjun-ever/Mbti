<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MbtiController;
use App\Http\Controllers\MbtiSortController;
use App\Http\Controllers\FreeController;
use App\Http\Controllers\SuggestController;
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

Route::get('/', function () {
    return view('home');
})->name('home');

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
        Route::get('/create', [MbtiSortController::class, 'create'])->name('mbtis.enfj.create');
        Route::post('/', [MbtiSortController::class, 'store'])->name('mbtis.enfj.store');
        Route::get('/{enfj}', [MbtiSortController::class, 'show'])->name('mbtis.enfj.show');
        Route::get('/{enfj}/edit', [MbtiSortController::class, 'edit'])->name('mbtis.enfj.edit');
        Route::put('/{enfj}', [MbtiSortController::class, 'update'])->name('mbtis.enfj.update');
        Route::delete('/{enfj}', [MbtiSortController::class, 'destroy'])->name('mbtis.enfj.destroy');
    });

    Route::prefix('/enfp')->group(function (){
        Route::get('/', [MbtiSortController::class, 'index'])->name('mbtis.enfp.index');
        Route::get('/create', [MbtiSortController::class, 'create'])->name('mbtis.enfp.create');
        Route::post('/', [MbtiSortController::class, 'store'])->name('mbtis.enfp.store');
        Route::get('/{enfp}', [MbtiSortController::class, 'show'])->name('mbtis.enfp.show');
        Route::get('/{enfp}/edit', [MbtiSortController::class, 'edit'])->name('mbtis.enfp.edit');
        Route::put('/{enfp}', [MbtiSortController::class, 'update'])->name('mbtis.enfp.update');
        Route::delete('/{enfp}', [MbtiSortController::class, 'destroy'])->name('mbtis.enfp.destroy');
    });

    Route::prefix('/entj')->group(function (){
        Route::get('/', [MbtiSortController::class, 'index'])->name('mbtis.entj.index');
        Route::get('/create', [MbtiSortController::class, 'create'])->name('mbtis.entj.create');
        Route::post('/', [MbtiSortController::class, 'store'])->name('mbtis.entj.store');
        Route::get('/{entj}', [MbtiSortController::class, 'show'])->name('mbtis.entj.show');
        Route::get('/{entj}/edit', [MbtiSortController::class, 'edit'])->name('mbtis.entj.edit');
        Route::put('/{entj}', [MbtiSortController::class, 'update'])->name('mbtis.entj.update');
        Route::delete('/{entj}', [MbtiSortController::class, 'destroy'])->name('mbtis.entj.destroy');
    });

    Route::prefix('/entp')->group(function (){
        Route::get('/', [MbtiSortController::class, 'index'])->name('mbtis.entp.index');
        Route::get('/create', [MbtiSortController::class, 'create'])->name('mbtis.entp.create');
        Route::post('/', [MbtiSortController::class, 'store'])->name('mbtis.entp.store');
        Route::get('/{entp}', [MbtiSortController::class, 'show'])->name('mbtis.entp.show');
        Route::get('/{entp}/edit', [MbtiSortController::class, 'edit'])->name('mbtis.entp.edit');
        Route::put('/{entp}', [MbtiSortController::class, 'update'])->name('mbtis.entp.update');
        Route::delete('/{entp}', [MbtiSortController::class, 'destroy'])->name('mbtis.entp.destroy');
    });

    Route::prefix('/esfj')->group(function (){
        Route::get('/', [MbtiSortController::class, 'index'])->name('mbtis.esfj.index');
        Route::get('/create', [MbtiSortController::class, 'create'])->name('mbtis.esfj.create');
        Route::post('/', [MbtiSortController::class, 'store'])->name('mbtis.esfj.store');
        Route::get('/{esfj}', [MbtiSortController::class, 'show'])->name('mbtis.esfj.show');
        Route::get('/{esfj}/edit', [MbtiSortController::class, 'edit'])->name('mbtis.esfj.edit');
        Route::put('/{esfj}', [MbtiSortController::class, 'update'])->name('mbtis.esfj.update');
        Route::delete('/{esfj}', [MbtiSortController::class, 'destroy'])->name('mbtis.esfj.destroy');
    });

    Route::prefix('/esfp')->group(function (){
        Route::get('/', [MbtiSortController::class, 'index'])->name('mbtis.esfp.index');
        Route::get('/create', [MbtiSortController::class, 'create'])->name('mbtis.esfp.create');
        Route::post('/', [MbtiSortController::class, 'store'])->name('mbtis.esfp.store');
        Route::get('/{esfp}', [MbtiSortController::class, 'show'])->name('mbtis.esfp.show');
        Route::get('/{esfp}/edit', [MbtiSortController::class, 'edit'])->name('mbtis.esfp.edit');
        Route::put('/{esfp}', [MbtiSortController::class, 'update'])->name('mbtis.esfp.update');
        Route::delete('/{esfp}', [MbtiSortController::class, 'destroy'])->name('mbtis.esfp.destroy');
    });

    Route::prefix('/estj')->group(function (){
        Route::get('/', [MbtiSortController::class, 'index'])->name('mbtis.estj.index');
        Route::get('/create', [MbtiSortController::class, 'create'])->name('mbtis.estj.create');
        Route::post('/', [MbtiSortController::class, 'store'])->name('mbtis.estj.store');
        Route::get('/{estj}', [MbtiSortController::class, 'show'])->name('mbtis.estj.show');
        Route::get('/{estj}/edit', [MbtiSortController::class, 'edit'])->name('mbtis.estj.edit');
        Route::put('/{estj}', [MbtiSortController::class, 'update'])->name('mbtis.estj.update');
        Route::delete('/{estj}', [MbtiSortController::class, 'destroy'])->name('mbtis.estj.destroy');
    });

    Route::prefix('/estp')->group(function (){
        Route::get('/', [MbtiSortController::class, 'index'])->name('mbtis.estp.index');
        Route::get('/create', [MbtiSortController::class, 'create'])->name('mbtis.estp.create');
        Route::post('/', [MbtiSortController::class, 'store'])->name('mbtis.estp.store');
        Route::get('/{estp}', [MbtiSortController::class, 'show'])->name('mbtis.estp.show');
        Route::get('/{estp}/edit', [MbtiSortController::class, 'edit'])->name('mbtis.estp.edit');
        Route::put('/{estp}', [MbtiSortController::class, 'update'])->name('mbtis.estp.update');
        Route::delete('/{estp}', [MbtiSortController::class, 'destroy'])->name('mbtis.estp.destroy');
    });

    Route::prefix('/infj')->group(function (){
        Route::get('/', [MbtiSortController::class, 'index'])->name('mbtis.infj.index');
        Route::get('/create', [MbtiSortController::class, 'create'])->name('mbtis.infj.create');
        Route::post('/', [MbtiSortController::class, 'store'])->name('mbtis.infj.store');
        Route::get('/{infj}', [MbtiSortController::class, 'show'])->name('mbtis.infj.show');
        Route::get('/{infj}/edit', [MbtiSortController::class, 'edit'])->name('mbtis.infj.edit');
        Route::put('/{infj}', [MbtiSortController::class, 'update'])->name('mbtis.infj.update');
        Route::delete('/{infj}', [MbtiSortController::class, 'destroy'])->name('mbtis.infj.destroy');
    });

    Route::prefix('/infp')->group(function (){
        Route::get('/', [MbtiSortController::class, 'index'])->name('mbtis.infp.index');
        Route::get('/create', [MbtiSortController::class, 'create'])->name('mbtis.infp.create');
        Route::post('/', [MbtiSortController::class, 'store'])->name('mbtis.infp.store');
        Route::get('/{infp}', [MbtiSortController::class, 'show'])->name('mbtis.infp.show');
        Route::get('/{infp}/edit', [MbtiSortController::class, 'edit'])->name('mbtis.infp.edit');
        Route::put('/{infp}', [MbtiSortController::class, 'update'])->name('mbtis.infp.update');
        Route::delete('/{infp}', [MbtiSortController::class, 'destroy'])->name('mbtis.infp.destroy');
    });

    Route::prefix('/intj')->group(function (){
        Route::get('/', [MbtiSortController::class, 'index'])->name('mbtis.intj.index');
        Route::get('/create', [MbtiSortController::class, 'create'])->name('mbtis.intj.create');
        Route::post('/', [MbtiSortController::class, 'store'])->name('mbtis.intj.store');
        Route::get('/{intj}', [MbtiSortController::class, 'show'])->name('mbtis.intj.show');
        Route::get('/{intj}/edit', [MbtiSortController::class, 'edit'])->name('mbtis.intj.edit');
        Route::put('/{intj}', [MbtiSortController::class, 'update'])->name('mbtis.intj.update');
        Route::delete('/{intj}', [MbtiSortController::class, 'destroy'])->name('mbtis.intj.destroy');
    });

    Route::prefix('/intp')->group(function (){
        Route::get('/', [MbtiSortController::class, 'index'])->name('mbtis.intp.index');
        Route::get('/create', [MbtiSortController::class, 'create'])->name('mbtis.intp.create');
        Route::post('/', [MbtiSortController::class, 'store'])->name('mbtis.intp.store');
        Route::get('/{intp}', [MbtiSortController::class, 'show'])->name('mbtis.intp.show');
        Route::get('/{intp}/edit', [MbtiSortController::class, 'edit'])->name('mbtis.intp.edit');
        Route::put('/{intp}', [MbtiSortController::class, 'update'])->name('mbtis.intp.update');
        Route::delete('/{intp}', [MbtiSortController::class, 'destroy'])->name('mbtis.intp.destroy');
    });

    Route::prefix('/isfj')->group(function (){
        Route::get('/', [MbtiSortController::class, 'index'])->name('mbtis.isfj.index');
        Route::get('/create', [MbtiSortController::class, 'create'])->name('mbtis.isfj.create');
        Route::post('/', [MbtiSortController::class, 'store'])->name('mbtis.isfj.store');
        Route::get('/{isfj}', [MbtiSortController::class, 'show'])->name('mbtis.isfj.show');
        Route::get('/{isfj}/edit', [MbtiSortController::class, 'edit'])->name('mbtis.isfj.edit');
        Route::put('/{isfj}', [MbtiSortController::class, 'update'])->name('mbtis.isfj.update');
        Route::delete('/{isfj}', [MbtiSortController::class, 'destroy'])->name('mbtis.isfj.destroy');
    });

    Route::prefix('/isfp')->group(function (){
        Route::get('/', [MbtiSortController::class, 'index'])->name('mbtis.isfp.index');
        Route::get('/create', [MbtiSortController::class, 'create'])->name('mbtis.isfp.create');
        Route::post('/', [MbtiSortController::class, 'store'])->name('mbtis.isfp.store');
        Route::get('/{isfp}', [MbtiSortController::class, 'show'])->name('mbtis.isfp.show');
        Route::get('/{isfp}/edit', [MbtiSortController::class, 'edit'])->name('mbtis.isfp.edit');
        Route::put('/{isfp}', [MbtiSortController::class, 'update'])->name('mbtis.isfp.update');
        Route::delete('/{isfp}', [MbtiSortController::class, 'destroy'])->name('mbtis.isfp.destroy');
    });

    Route::prefix('/istj')->group(function (){
        Route::get('/', [MbtiSortController::class, 'index'])->name('mbtis.istj.index');
        Route::get('/create', [MbtiSortController::class, 'create'])->name('mbtis.istj.create');
        Route::post('/', [MbtiSortController::class, 'store'])->name('mbtis.istj.store');
        Route::get('/{istj}', [MbtiSortController::class, 'show'])->name('mbtis.istj.show');
        Route::get('/{istj}/edit', [MbtiSortController::class, 'edit'])->name('mbtis.istj.edit');
        Route::put('/{istj}', [MbtiSortController::class, 'update'])->name('mbtis.istj.update');
        Route::delete('/{istj}', [MbtiSortController::class, 'destroy'])->name('mbtis.istj.destroy');
    });

    Route::prefix('/istp')->group(function (){
        Route::get('/', [MbtiSortController::class, 'index'])->name('mbtis.istp.index');
        Route::get('/create', [MbtiSortController::class, 'create'])->name('mbtis.istp.create');
        Route::post('/', [MbtiSortController::class, 'store'])->name('mbtis.istp.store');
        Route::get('/{istp}', [MbtiSortController::class, 'show'])->name('mbtis.istp.show');
        Route::get('/{istp}/edit', [MbtiSortController::class, 'edit'])->name('mbtis.istp.edit');
        Route::put('/{istp}', [MbtiSortController::class, 'update'])->name('mbtis.istp.update');
        Route::delete('/{istp}', [MbtiSortController::class, 'destroy'])->name('mbtis.istp.destroy');
    });

    Route::resource('/frees', FreeController::class);
    Route::resource('/suggests', SuggestController::class);
});
