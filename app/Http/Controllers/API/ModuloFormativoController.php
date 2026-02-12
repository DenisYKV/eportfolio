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
       $search = $request->query('search', '');

        return ModuloFormativoResource::collection(
            ModuloFormativo::where('ciclo_formativo_id', $cicloId)
                ->where(function ($query) use ($search) {
                    $query->where('nombre', 'like', "%{$search}%")
                        ->orWhere('codigo', 'like', "%{$search}%");
                })
                ->orderBy($request->sort ?? 'id', $request->order ?? 'asc')
                ->paginate($request->per_page)
        );
    }

    public function modulosImpartidos(Request $request)
    {
        $search = $request->query('search', '');

        return ModuloFormativoResource::collection(
            ModuloFormativo::where('docente_id', $request->user()->id)
                ->where(function ($query) use ($search) {
                    $query->where('nombre', 'like', "%{$search}%")
                        ->orWhere('codigo', 'like', "%{$search}%");
                })
                ->orderBy($request->sort ?? 'id', $request->order ?? 'asc')
                ->paginate($request->per_page)
        );
    }

    public function store(Request $request, $cicloId)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'codigo' => 'required|string|unique:modulos_formativos,codigo',
            'descripcion' => 'nullable|string',
            'horas_totales' => 'required|integer|min:1',
            'curso_escolar' => 'required|string|max:255',
            'centro' => 'required|string|max:255',
        ]);
        $data['ciclo_formativo_id'] = $cicloId;
        $data['docente_id'] = $request->user()->id;

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
            return response()->json(['message' => 'ModuloFormativo eliminado correctamente'], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error: ' . $e->getMessage()
            ], 400);
        }
    }
}
