<?php

namespace App\Http\Controllers;

use App\Models\CriterioEvaluacion;
use Illuminate\Http\Request;

class CriteriosController extends Controller
{


    public function getIndex()
    {
        $criterios = CriterioEvaluacion::all();
        return view('criteriosEvaluacion.index', [
            'criterios' => $criterios
        ]);
    }

    public function getShow($id)
    {
        $criterios = CriterioEvaluacion::findOrFail($id);
        return view('criteriosEvaluacion.show')
            ->with('criterio', $criterios)
            ->with('id', $id);
    }

    public function getCreate()
    {
        return view('criteriosEvaluacion.create');
    }

    public function getEdit($id)
    {
        $criterios = CriterioEvaluacion::findOrFail($id);
        return view('criteriosEvaluacion.edit')
            ->with('criterio', $criterios)
            ->with('id', $id);
    }

    public function postCreate(Request $request)
    {
        $criterio = new CriterioEvaluacion();
        $criterio->codigo = $request->input('codigo');
        $criterio->descripcion = $request->input('descripcion');
        $criterio->orden = $request->input('orden');
        $criterio->save();

        return redirect()->route('criterios.show', ['id' => $criterio->id]);
    }
    public function update(Request $request, $id)
    {
        $criterio = CriterioEvaluacion::findOrFail($id);
        $criterio->codigo = $request->input('codigo');
        $criterio->descripcion = $request->input('descripcion');
        $criterio->orden = $request->input('orden');
        $criterio->save();

        return redirect()->route('criterios.show', [$criterio->id]);
    }
};
