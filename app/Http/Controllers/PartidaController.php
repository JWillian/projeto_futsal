<?php

namespace App\Http\Controllers;
use App\Models\Partida;

use Illuminate\Http\Request;

class PartidaController extends Controller
{
    
    public function index()
    {
        $partida = Partida::all();
        return response()->json([
            'mensagem:' => 'Todas as partidas',
            'dados:' => $partida,
        ]);
    }

    public function show($id)
    {
        $partida = Partida::findOrfail($id);

        if (!$partida) {
            return response()->json(['error' => 'Partida não encontrado'], 404);
        }

        return response()->json([
            'mensagem:' => 'Partida Selecionada',
            'dados:' => $partida,
        ]);
    }


    public function store(Request $request)
    {
        $partida = Partida::create($request->all());
        return response()->json([
            'mensagem:' => 'Partida inserida com sucesso!',
            'dados:' => $partida,
        ]);
    }


    public function update(Request $request, $id)
    {

        $partida = Partida::find($id);

        if (!$partida) {
            return response()->json(['error' => 'Partida não encontrado'], 404);
        }

        $partida->update($request->all());

        return response()->json([
            'mensagem:' => 'Partida atualizada com sucesso!',
            'dados:' => $partida,
        ]);
    }


    public function destroy(Partida $id)
    {
        $partida = Partida::findOrFail($id);
        
        if (!$partida) {
            return response()->json(['error' => 'Partida não encontrado'], 404);
        }
        
        $partida->delete();

        return response()->json([
            'mensagem:' => 'Partida excluida com sucesso!',
            'dados:' => $partida,
        ]);

    }

}
