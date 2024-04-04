<?php

use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\UserController;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/teste', function(){
    echo "ola mundo";
});

Route::get('/products', [ProductController::class, 'index']); // busca Todos

Route::post('/products', [ProductController::class, 'save']); // cria produto

Route::get('/{id}', [ProductController::class, 'show']); // busca pelo id apenas 1

Route::put('/products' , [ProductController::class, 'update']); // leva tanto pela url tantto pelo post  

Route::delete('/{id}' , [ProductController::class, 'delete']); // leva tanto pela url tantto pelo post 

Route::resource('/users', [UserController::class, 'index']);

