<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ResultadoAprendizajeResource;
use App\Models\ModuloFormativo;
use App\Models\ResultadoAprendizaje;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\AssignOp\Mod;

class ResultadoAprendizajeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, ModuloFormativo $moduloFormativo)
    {
        $search = $request->query('search', '');

        return ResultadoAprendizajeResource::collection(
            ResultadoAprendizaje::where('modulo_formativo_id', $moduloFormativo->id)
                ->where(function ($query) use ($search) {
                    $query->where('codigo', 'like', "%{$search}%")
                        ->orWhere('descripcion', 'like', "%{$search}%");
                })
                ->orderBy($request->sort ?? 'id', $request->order ?? 'asc')
                ->paginate($request->per_page)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $moduloId)
    {
        $data = $request->validate([
            'codigo' => 'required|string|unique:resultados_aprendizaje,codigo',
            'descripcion' => 'required|string',
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
    public function show($moduloId, ResultadoAprendizaje $resultadoAprendizaje)
    {
        if ($resultadoAprendizaje->modulo_formativo_id != $moduloId) {
            abort(404);
        }

        return new ResultadoAprendizajeResource($resultadoAprendizaje);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $moduloId, ResultadoAprendizaje $resultadoAprendizaje)
    {
        if ($resultadoAprendizaje->modulo_formativo_id != $moduloId) {
            abort(404);
        }

        $data = json_decode($request->getContent(), true);
        $data['modulo_formativo_id'] = $moduloId;

        $resultadoAprendizaje->update($data);

        return new ResultadoAprendizajeResource($resultadoAprendizaje);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($moduloId, ResultadoAprendizaje $resultadoAprendizaje)
    {

        if ($resultadoAprendizaje->modulo_formativo_id != $moduloId) {
            abort(404);
        }

        try {
            $resultadoAprendizaje->delete();
            return response()->json(['message' => 'ResultadoAprendizaje eliminado correctamente'], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error: ' . $e->getMessage()
            ], 400);
        }

    }

}
