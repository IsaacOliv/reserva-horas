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
        dd($request->all());
        $usuario = \App\Models\User::with('detalhes')->find($id);

    }
}
