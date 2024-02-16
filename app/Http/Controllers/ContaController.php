<?php

namespace App\Http\Controllers;

class ContaController extends Controller
{
    public function detalhes($id)
    {
        if (\Illuminate\Support\Facades\Auth::user()->id != $id) {
            return redirect()->back();
        }
        $usuario = \App\Models\User::with('detalhes')->find($id);
        return view('conta.detalhes-da-conta', compact('usuario'));
    }

    public function update($id, \Illuminate\Http\Request $request)
    {
        if (\Illuminate\Support\Facades\Auth::user()->id != $id) {
            return redirect()->back();
        }

        try {
            $usuario = \App\Models\User::with('detalhes')->find($id);
            if($request->nome){
                $usuario->update(['nome' => $request->nome]);
            }

            $detalhes = [
                'sobrenome' => $request->sobrenome,
                'endereco' => $request->endereco,
                'cpf' => $request->cpf,
                'telefone' => $request->telefone,
                'dt_nascimento' => $request->dt_nascimento,
                'id_usuario' => \Illuminate\Support\Facades\Auth::user()->id
            ];
            if ($usuario->detalhes == null) {
                if ($request->file('foto_time')) {
                    $foto = $request->file('foto_time');
                    $fotoPath = $foto->store('imagens', 'public');
                    $detalhes['imagem_time'] = $fotoPath;
                }
                \App\Models\Detalhes_usuario::create($detalhes);
            } else {
                if ($usuario->detalhes->imagem_time !== null && $request->file('foto_time')) {
                    if (file_exists(public_path('storage/'.$usuario->detalhes->imagem_time))) {
                        unlink('storage/' . $usuario->detalhes->imagem_time);
                    }
                    $foto = $request->file('foto_time');
                    $fotoPath = $foto->store('imagens', 'public');
                    $detalhes['imagem_time'] = $fotoPath;
                }
                \App\Models\Detalhes_usuario::find($usuario->detalhes->id)->update($detalhes);
            }
            $request->file('foto_time') ? $response['imagem'] = $detalhes['imagem_time'] : $response['imagem'] = 0;
            $response['sucesso'] = 'Dados alterados com sucesso!';
            return response()->json($response, 200);
        } catch (\Exception $ex) {
            $response['falha'] = $ex->getMessage();
            return response()->json($response, 401);

        }
    }
}
