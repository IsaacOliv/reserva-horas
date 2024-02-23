<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class ContaController extends Controller
{
    private $id_usuario;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {

            $this->id_usuario = Auth::user()->id;

            return $next($request);
        });
    }

    public function detalhes()
    {
        $usuario = \App\Models\User::with('detalhes')->find($this->id_usuario);
        return view('conta.detalhes-da-conta', compact('usuario'));
    }

    public function update(\App\Http\Requests\DetalhesDaContaRequest $request)
    {
        try {
            $usuario = \App\Models\User::with('detalhes')->find($this->id_usuario);
            if ($request->nome) {
                $usuario->update(['nome' => $request->nome]);
            }
            //verifica se o CPF é valido
            $teste = \App\Http\Repository\ValidarCpf::validarCPF($request->cpf);
            if (!$teste) {
                $response['falha'] = 'CPF inserido é invalido!';
                $response['campo'] = 'cpf';
                return response()->json($response, 401);
            }
            //verifica ano da data
            $verificaData = explode('-', $request->dt_nascimento);
            if (strlen($verificaData[0]) != 4) {
                $response['falha'] = 'Data de nascimento invalida';
                return response()->json($response, 401);
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
                if ($usuario->detalhes->imagem_time != null && $request->file('foto_time')) {
                    if (file_exists(public_path('storage/' . $usuario->detalhes->imagem_time))) {
                        unlink('storage/' . $usuario->detalhes->imagem_time);
                    }
                }
                if ($request->file('foto_time')) {
                    $foto = $request->file('foto_time');
                    $fotoPath = $foto->store('imagens', 'public');
                    $detalhes['imagem_time'] = $fotoPath;
                }
                $usuario->detalhes->update($detalhes);
            }
            $request->file('foto_time') ? $response['imagem'] = $detalhes['imagem_time'] : $response['imagem'] = 0;
            $response['sucesso'] = 'Dados alterados com sucesso!';
            return response()->json($response, 200);
        } catch (\Exception $ex) {
            $response['falha'] = $ex->getMessage();
            return response()->json($response, 401);
        }
    }

    public function horarios()
    {
        $usuarioComHorario = \App\Models\User::with('horariosReservados')->find($this->id_usuario);
        return view('conta.horarios-reservados', compact('usuarioComHorario'));
    }

    public function desmarcar(\Illuminate\Http\Request $request)
    {
        try {
            $horarioReservado = \App\Models\Horario_reservado::find($request->id_horario_reservado);
            if ($horarioReservado) {
                $horarioReservado->update(['reservado' => false]);
                $response['sucesso'] = 'Horario desmarcado com sucesso';
                return response()->json($response, 200);
            } else {
                $response['falha'] = 'Não foi possivel encontrar o horario';
                return response()->json($response, 401);
            }
        } catch (\Exception $ex) {
            $response['falha'] = $ex->getMessage();
            return response()->json($response, 401);
        }
    }
}
