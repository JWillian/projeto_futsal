<?php

use App\Http\Controllers\JogadoresController;
use App\Http\Controllers\PartidaController;
use App\Http\Controllers\TimeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassificacaoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('api')->get('/user', function (Request $request) {
    return $request->user();
});


// Rotas para acesso ao login e geração do Token /  rota -> api/login. 

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);


// Autenticação para acesso dos dados das requisições - Token. 

/*
TOKEN

colocar o bearer na frente e depois o token!

Exemplo:

bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.
eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2xvZ2luIiwiaWF0IjoxNzA1MDkyODY0LCJleHAiOjE3MDUwOTY0NjQsIm5iZiI6MT
cwNTA5Mjg2NCwianRpIjoiazNKd28xQ0dMc1ZqakRjRyIsInN1YiI6IjEiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.
zN_CfLyUM3VU_75hczSDD6ajYCBT1jKUi1IK0x4DhzY

*/

Route::middleware('jwt.auth')->group(function () {

    Route::get('/jogadores', [JogadoresController::class, 'index']);   // Home jogadores.
    Route::post('/jogadores',[JogadoresController::class, 'store']);  // Insere o Jogador.
    Route::get('/jogadores/{id}',[JogadoresController::class, 'show']);  // Exibe o jogador.
    Route::put('/jogadores/update/{id}', [JogadoresController::class, 'update']); // Atualiza os dados do Jogador.
    Route::delete('/jogadores/delete/{id}', [JogadoresController::class, 'destroy']); // exclui o jogador.  

    Route::get('/times',[TimeController::class, 'index']);   // Home times.
    Route::post('/times',[TimeController::class, 'store']);  // Insere o time.
    Route::get('/times/{id}',[TimeController::class, 'show']);  // Exibe o time.
    Route::put('/times/update/{id}', [TimeController::class, 'update']); // Atualiza os dados do time.
    Route::delete('/times/delete/{id}', [JogadoresController::class, 'destroy']); // exclui o time.

    Route::get('/partidas',[PartidaController::class, 'index']);   // Home partidas.
    Route::post('/partidas',[PartidaController::class, 'store']);  // Insere a partida.
    Route::get('/partidas/{id}',[PartidaController::class, 'show']);  // Exibe a partida.
    Route::put('/partidas/update/{id}', [PartidaController::class, 'update']); // Atualiza a partida.
    Route::delete('/partidas/delete/{id}', [PartidaController::class, 'destroy']); // exclui a partida.

    Route::get('/classificacao',[ClassificacaoController::class, 'index']);   // Home classificação.
    Route::post('/classificacao',[ClassificacaoController::class, 'store']);  // Insere a classificação.
    Route::get('/classificacao/{id}',[ClassificacaoController::class, 'show']);  // Exibe a classificação.
    Route::put('/classificacao/update/{id}', [ClassificacaoController::class, 'update']); // Atualiza a classificação.
    Route::delete('/classificacao/delete/{id}', [ClassificacaoController::class, 'destroy']); // exclui a classificação.

});

