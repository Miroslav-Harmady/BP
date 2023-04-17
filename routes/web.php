<?php

use Illuminate\Support\Facades\Route;
use App\Models\Bisection;
use App\Models\Cholesky;
use App\Models\LURozklad;
use App\Models\Integral;
use App\Models\Jacobi;
use App\Models\Newton;

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
    return view('welcome'); 
})->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/bisekcia', function(){
    return view('bisection', ['collection' => Bisection::all()]);
});

Route::get('/LURozklad', function(){
    return view('LURozklad', ['collection' => LURozklad::all()]);
});

Route::get('/cholesky', function(){
    return view('cholesky', ['collection' => Cholesky::all()]);
});

Route::get('/integral', function(){
    return view('integral', ['collection' => Integral::all()]);
});

Route::get('/jacobi', function(){
    return view('jacobi', ['collection' => Jacobi::all()]);
});
Route::get('/newton', function(){
    return view('newton', ['collection' => Newton::all()]);
});

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.'], function () {
    
    Route::get('/', function(){
        return view("admin.index");
    });

    Route::group([
        'prefix' => 'cholesky',
        'as' => 'cholesky.'
    ], function(){
        Route::get('index', [App\Http\Controllers\Admin\Cholesky::class, 'index'])->name("index");
        Route::get('create', [App\Http\Controllers\Admin\Cholesky::class, 'create'])->name("create");
        Route::post('save', [App\Http\Controllers\Admin\Cholesky::class, 'save'])->name("save");
        Route::get('edit/{id}', [App\Http\Controllers\Admin\Cholesky::class, 'edit'])->name("edit");
        Route::put('update/{id}', [App\Http\Controllers\Admin\Cholesky::class, 'update'])->name("update");
        Route::delete('delete/{id}', [App\Http\Controllers\Admin\Cholesky::class, 'delete'])->name("delete");
    });
    
    Route::group([
        'prefix' => 'LURozklad',
        'as' => 'LU.'
    ], function(){
        Route::get('index', [App\Http\Controllers\Admin\LURozklad::class, 'index'])->name("index");
        Route::get('create', [App\Http\Controllers\Admin\LURozklad::class, 'create'])->name("create");
        Route::post('save', [App\Http\Controllers\Admin\LURozklad::class, 'save'])->name("save");
        Route::get('edit/{id}', [App\Http\Controllers\Admin\LURozklad::class, 'edit'])->name("edit");
        Route::put('update/{id}', [App\Http\Controllers\Admin\LURozklad::class, 'update'])->name("update");
        Route::delete('delete/{id}', [App\Http\Controllers\Admin\LURozklad::class, 'delete'])->name("delete");
    });

    Route::group([
        'prefix' => 'jacobi',
        'as' => 'jacobi.'
    ], function(){
        Route::get('index', [App\Http\Controllers\Admin\Jacobi::class, 'index'])->name("index");
        Route::get('create', [App\Http\Controllers\Admin\Jacobi::class, 'create'])->name("create");
        Route::post('save', [App\Http\Controllers\Admin\Jacobi::class, 'save'])->name("save");
        Route::get('edit/{id}', [App\Http\Controllers\Admin\Jacobi::class, 'edit'])->name("edit");
        Route::put('update/{id}', [App\Http\Controllers\Admin\Jacobi::class, 'update'])->name("update");
        Route::delete('delete/{id}', [App\Http\Controllers\Admin\Jacobi::class, 'delete'])->name("delete");
    });

    Route::group([
        'prefix' => 'bisection',
        'as' => 'bisection.'
    ], function(){
        Route::get('index', [App\Http\Controllers\Admin\Bisection::class, 'index'])->name("index");
        Route::get('create', [App\Http\Controllers\Admin\Bisection::class, 'create'])->name("create");
        Route::post('save', [App\Http\Controllers\Admin\Bisection::class, 'save'])->name("save");
        Route::get('edit/{id}', [App\Http\Controllers\Admin\Bisection::class, 'edit'])->name("edit");
        Route::put('update/{id}', [App\Http\Controllers\Admin\Bisection::class, 'update'])->name("update");
        Route::delete('delete/{id}', [App\Http\Controllers\Admin\Bisection::class, 'delete'])->name("delete");
    });
    

    Route::group([
        'prefix' => 'integral',
        'as' => 'integral.'
    ], function(){
        Route::get('index', [App\Http\Controllers\Admin\Integral::class, 'index'])->name("index");
        Route::get('create', [App\Http\Controllers\Admin\Integral::class, 'create'])->name("create");
        Route::post('save', [App\Http\Controllers\Admin\Integral::class, 'save'])->name("save");
        Route::get('edit/{id}', [App\Http\Controllers\Admin\Integral::class, 'edit'])->name("edit");
        Route::put('update/{id}', [App\Http\Controllers\Admin\Integral::class, 'update'])->name("update");
        Route::delete('delete/{id}', [App\Http\Controllers\Admin\Integral::class, 'delete'])->name("delete");
    });

    Route::group([
        'prefix' => 'newton',
        'as' => 'newton.'
    ], function(){
        Route::get('index', [App\Http\Controllers\Admin\Newton::class, 'index'])->name("index");
        Route::get('create', [App\Http\Controllers\Admin\Newton::class, 'create'])->name("create");
        Route::post('save', [App\Http\Controllers\Admin\Newton::class, 'save'])->name("save");
        Route::get('edit/{id}', [App\Http\Controllers\Admin\Newton::class, 'edit'])->name("edit");
        Route::put('update/{id}', [App\Http\Controllers\Admin\Newton::class, 'update'])->name("update");
        Route::delete('delete/{id}', [App\Http\Controllers\Admin\Newton::class, 'delete'])->name("delete");
    });
});