<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UiController;

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
    return view('signup');
});

Route::get('/greeting', function () {
    return view('signup');
});

Route::get(
    '/user',
    [UiController::class, 'index']
);

Route::post(
  '/create-user',
[UiController::class, 'create']);


Route::post(
        '/edit',
        [UiController::class, 'edit']);
    
Route::get(
        '/welcome',
        [UiController::class, 'welcome'])->name('welcome');
    
Route::get(
            '/read',
            [UiController::class, 'read'])->name('read');
        
            // Route::get('/edit-record', function () {
            //     return view('edit');
            // });
Route::post(
                '/edit/{id}',
                [UiController::class, 'update']);
Route::get(
                    '/dashboard',
                    [UiController::class, 'dashboard']);
                

Route::post(
                    '/newfilter',
                    [UiController::class, 'newfilter']);
                

Route::get(
                    '/filter',
                    [UiController::class, 'filter']);
                