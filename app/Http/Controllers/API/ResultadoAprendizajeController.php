<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ResultadoAprendizajeResource;
use App\Models\ResultadoAprendizaje;
use Illuminate\Http\Request;

class ResultadoAprendizajeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query('search', '');

        $query = ResultadoAprendizaje::query();

        if($search) {
            $query->orWhere('codigo', 'like', '%' .$search . '%');
        }

        return ResultadoAprendizajeResource::collection(
            $query->orderBy($request->sort ?? 'id', $request->order ?? 'asc')
            ->paginate($request->per_page));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $moduloId)
    {
        $data = $request->validate([
            'modulo_formativo_id' => 'required|integer|exists:modulos_formativos,id',
            'codigo' => 'required|string|unique:resultados_aprendizaje,codigo',
            'descripcion' => 'nullable|string',
            'peso_porcentaje' => 'required|numeric|min:0|max:100',
            'orden' => 'required|integer|min:1'
        ]);

        $data['modulo_formativo_id'] = $moduloId;

        $resultadoAprendizaje = ResultadoAprendizaje::create($data);

        return new ResultadoAprendizajeResource($resultadoAprendizaje);
    }

    /**
     * Display the specified resource.
     */
    public function show(ResultadoAprendizaje $resultadoAprendizaje)
    {
        return new ResultadoAprendizajeResource($resultadoAprendizaje);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ResultadoAprendizaje $resultadoAprendizaje)
    {
        $resultadoAprendizajeData = json_decode($request->getContent(), true);
        $resultadoAprendizaje->update($resultadoAprendizajeData);

        return new ResultadoAprendizajeResource($resultadoAprendizaje);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ResultadoAprendizaje $resultadoAprendizaje)
    {
        try {
            $resultadoAprendizaje->delete();
            return response()->json(null, 204);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error: ' . $e->getMessage()
            ], 400);
        }
    }
}
