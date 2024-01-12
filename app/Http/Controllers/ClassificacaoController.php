<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Classificacao;

class ClassificacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
     public function index()
     {
         $classificacao = Classificacao::all();
         return response()->json([
            'mensagem:' => 'Classificação!',
            'dados:' => $classificacao,
        ]);
     }
 
     public function show($id)
     {
         $classificacao = Classificacao::find($id);
 
         if (!$classificacao) {
             return response()->json(['error' => 'Classificação não encontrada'], 404);
         }
 
         return response()->json([
            'mensagem:' => 'Classificação Selecionada!',
            'dados:' => $classificacao,
        ]);
     }
 
     public function store(Request $request)
     {
         $this->validate($request, [
             'id_time' => 'required|exists:times,id',
             'pontos' => 'required|integer',
             'quantidade_gols' => 'required|integer',
         ]);
 
         $classificacao = Classificacao::create($request->all());

         return response()->json([
            'mensagem:' => 'Classificação inserida com sucesso! !',
            'dados:' => $classificacao,
        ]);
     }
 
     public function update(Request $request, $id)
     {
         $classificacao = Classificacao::find($id);
 
         if (!$classificacao) {
             return response()->json(['error' => 'Classificação não encontrada'], 404);
         }
 
         $this->validate($request, [
             'id_time' => 'required|exists:times,id',
             'pontos' => 'required|integer',
             'quantidade_gols' => 'required|integer',
         ]);
 
         $classificacao = $classificacao->update($request->all());
 
         return response()->json([
            'mensagem:' => 'Classificação atualizada com sucesso!',
            'dados:' => $classificacao,
        ]);
     }
 
     public function destroy($id)
     {
         $classificacao = Classificacao::find($id);
         $classificacao->delete();
 
         if (!$classificacao) {
             return response()->json(['error' => 'Classificação não encontrada'], 404);
         }
     
         return response()->json([
             'mensagem:' => 'Classificação removida com sucesso!',
             'dados:' => $classificacao,
         ]);
     

     }

}
