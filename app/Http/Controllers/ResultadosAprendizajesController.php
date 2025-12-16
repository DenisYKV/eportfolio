<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ResultadoAprendizaje;

class ResultadosAprendizajesController extends Controller
{
    public function getIndex()
    {
        $resultados = ResultadoAprendizaje::all();

        return view('resultadosAprendizaje.index', [
            'resultadosAprendizajes' => $resultados
        ]);
    }

    public function getShow($id)
    {
        $resultado = ResultadoAprendizaje::findOrFail($id);

        return view('resultadosAprendizaje.show')
            ->with('resultado', $resultado)
            ->with('id', $id);
    }

    public function getCreate()
    {
        return view('resultadosAprendizaje.create');
    }

    public function getEdit($id)
    {
        $resultado = ResultadoAprendizaje::findOrFail($id);

        return view('resultadosAprendizaje.edit')
            ->with('resultado', $resultado)
            ->with('id', $id);
    }

    public function postCreate(Request $request)
    {
        $resultado = new ResultadoAprendizaje();

        $resultado->modulo_formativo_id = $request->input('modulo_formativo_id');
        $resultado->codigo = $request->input('codigo');
        $resultado->descripcion = $request->input('descripcion');
        $resultado->peso_porcentaje = $request->input('peso_porcentaje');
        $resultado->orden = $request->input('orden');

        $resultado->save();

        return redirect()->route('resultados-aprendizaje.show', ['id' => $resultado->id]);
    }

    public function update(Request $request, $id)
    {
        $resultado = ResultadoAprendizaje::findOrFail($id);

        $resultado->modulo_formativo_id = $request->input('modulo_formativo_id');
        $resultado->codigo = $request->input('codigo');
        $resultado->descripcion = $request->input('descripcion');
        $resultado->peso_porcentaje = $request->input('peso_porcentaje');
        $resultado->orden = $request->input('orden');

        $resultado->save();

        return redirect()->route('resultados-aprendizaje.show', ['id' => $resultado->id]);
    }
}
