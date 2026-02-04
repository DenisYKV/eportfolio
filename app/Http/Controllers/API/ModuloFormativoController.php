<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ModuloFormativoResource;
use App\Models\ModuloFormativo;
use Illuminate\Http\Request;

class ModuloFormativoController extends Controller
{
    public function index(Request $request, $cicloId)
    {
        return ModuloFormativoResource::collection(
            ModuloFormativo::where('ciclo_formativo_id', $cicloId)
                ->orderBy($request->sort ?? 'id', $request->order ?? 'asc')
                ->paginate($request->per_page)
        );
    }

    public function store(Request $request, $cicloId)
    {
        $data = json_decode($request->getContent(), true);
        $data['ciclo_formativo_id'] = $cicloId;

        $modulo = ModuloFormativo::create($data);

        return new ModuloFormativoResource($modulo);
    }

    public function show($cicloId, ModuloFormativo $moduloFormativo)
    {
        if ($moduloFormativo->ciclo_formativo_id != $cicloId) {
            abort(404);
        }

        return new ModuloFormativoResource($moduloFormativo);
    }

    public function update(Request $request, $cicloId, ModuloFormativo $moduloFormativo)
    {
        if ($moduloFormativo->ciclo_formativo_id != $cicloId) {
            abort(404);
        }

        $data = json_decode($request->getContent(), true);
        $data['ciclo_formativo_id'] = $cicloId;

        $moduloFormativo->update($data);

        return new ModuloFormativoResource($moduloFormativo);
    }

    public function destroy($cicloId, ModuloFormativo $moduloFormativo)
    {
        if ($moduloFormativo->ciclo_formativo_id != $cicloId) {
            abort(404);
        }

        try {
            $moduloFormativo->delete();
            return response()->json(null, 204);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error: ' . $e->getMessage()
            ], 400);
        }
    }
}
