<?php
// VL220247, VG220015, CE211044 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Servicio para listar todos los clientes utilizando la operación GET
Route::get('/list', [ClienteController::class, 'index']);

//Servicio para crear nuevo cliente utilizando la operación POST
Route::post('/insert', [ClienteController::class, 'create']);

//Servicio para consultar un cliente utilizando la operación GET
Route::get('/read/{id}', [ClienteController::class, 'show']);

//Servicio para actualizar un cliente utilizando la operación PUT
Route::put('/cliente/{id}', [ClienteController::class, 'edit']);

//Servicio para actualizar un cliente utilizando la operación PUT
Route::patch('/edit/{id}', [ClienteController::class, 'editC']);

//Servicio para eliminar un cliente utilizando la operación DELETE
Route::delete('/delete/{id}', [ClienteController::class, 'destroy']);