<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Time;

class TimeController extends Controller
{
    public function index()
    {
        $time = Time::all();

        return response()->json([
            'mensagem:' => 'Todos os times!',
            'dados:' => $time,
        ]);
    }

    // Insere o Time.
    public function store(Request $request)
    {
            $request->validate([
                'nome' => 'required',
            ]);

            $time = Time::create($request->all());

            return response()->json([
                'mensagem:' => 'Time Inserido com sucesso!',
                'dados:' => $time,
            ]);

    }
    
    // Mostra o Time
    public function show($id)
    {
        $time = Time::findOrfail($id);

        if (!$time) {
            return response()->json(['error' => 'Time não encontrado'], 404);
        }

        return response()->json([
            'mensagem:' => 'Time Selecionado:',
            'dados:' => $time,
        ]);
    }

    // Atualiza o Time.
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required',
        ]);
        
        $time=Time::find($id);

        if (!$time) {
            return response()->json(['error' => 'Time não encontrado'], 404);
        }

        $time->update($request->all());

        return response()->json([
            'mensagem:' => 'Time Atualizado com sucesso!',
            'dados:' => $time,
        ]);
    }

    // Deleta o Time.
    public function destroy($id)
    {
        $time = Time::findOrFail($id);

        if (!$time) {
            return response()->json(['error' => 'Time não encontrado'], 404);
        }

        $time->delete();
    
        return response()->json([
            'mensagem:' => 'Time Excluido com sucesso!',
            'dados:' => $time,
        ]);
    }

 
}
