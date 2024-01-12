<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Jogador;

class JogadoresController extends Controller
{
    public function index()
    {
        $jogador = Jogador::all();

        return response()->json([
            'mensagem:' => 'Todos os jogadores!',
            'dados:' => $jogador,
        ]);
    }

    // Insere o Jogador.
    public function store(Request $request)
    {
            $request->validate([
                'nome' => 'required',
                'numeroDaCamiseta' => 'required',
                'id_time' => 'required',
            ]);

            $jogador = Jogador::create($request->all());

            return response()->json([
                'mensagem:' => 'Jogador Inserido com sucesso!',
                'dados:' => $jogador,
            ]);

    }
    
    // Mostra o Jogador.
    public function show($id)
    {
        $jogador = Jogador::findOrfail($id);

        if (!$jogador) {
            return response()->json(['error' => 'Jogador não encontrado'], 404);
        }

        return response()->json([
            'mensagem:' => 'Jogador Selecionado:',
            'dados:' => $jogador,
        ]);
    }

    // Atualiza o Jogador.
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required',
            'numeroDaCamiseta' => 'required',
            'id_time' => 'required',
        ]);
        
        $jogador=Jogador::find($id);


        if (!$jogador) {
            return response()->json(['error' => 'Jogador não encontrado'], 404);
        }

        $jogador->update($request->all());

        return response()->json([
            'mensagem:' => 'Jogador Atualizado com sucesso!',
            'dados:' => $jogador,
        ]);
    
    }

    // Deleta o Jogador.
    public function destroy($id)
{
    $jogador = Jogador::findOrFail($id);

    if (!$jogador) {
        return response()->json(['error' => 'Jogador não encontrado'], 404);
    }

    $jogador->delete();

    return response()->json([
        'mensagem:' => 'Jogador deletado com sucesso!',
        'dados:' => $jogador,
    ]);

   
}

 
}
