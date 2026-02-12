<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CicloFormativoResource;
use App\Models\CicloFormativo;
use App\Models\FamiliaProfesional;
use FFI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CicloFormativoController extends Controller
{
    public function index(Request $request, FamiliaProfesional $familiaProfesional)
    {
        $search = $request->query('search', '');

        return CicloFormativoResource::collection(
            CicloFormativo::where('familia_profesional_id', $familiaProfesional->id)
                ->where(function ($query) use ($search) {
                    $query->where('nombre', 'like', "%{$search}%")
                        ->orWhere('codigo', 'like', "%{$search}%");
                })
                ->orderBy($request->sort ?? 'id', $request->order ?? 'asc')
                ->paginate($request->per_page)
        );
    }

    public function store(Request $request, CicloFormativo $cicloFormativo, FamiliaProfesional $familiaProfesional)
    {
        Gate::authorize('create', $cicloFormativo);


        $d = $request->validate([
            'nombre' => 'required|string|max:255',
            'codigo' => 'required|string|unique:ciclos_formativos,codigo',
            'grado' => 'required|in:basico,medio,superior',
            'descripcion' => 'nullable|string',
        ]);
        $d['familia_profesional_id'] = $familiaProfesional->id;

        $cicloFormativo = CicloFormativo::create($d);

        return new CicloFormativoResource($cicloFormativo);
    }

    public function show(FamiliaProfesional $familiaProfesional, CicloFormativo $cicloFormativo)
    {
        if ($cicloFormativo->familia_profesional_id != $familiaProfesional->id) {
            abort(404);
        }

        return new CicloFormativoResource($cicloFormativo);
    }

    public function update(Request $request, FamiliaProfesional $familiaProfesional, CicloFormativo $cicloFormativo)
    {
        Gate::authorize('update', $cicloFormativo);
        if ($cicloFormativo->familia_profesional_id != $familiaProfesional->id) {
            abort(404);
        }

        $data = json_decode($request->getContent(), true);
        $data['familia_profesional_id'] = $familiaProfesional->id;

        $cicloFormativo->update($data);

        return new CicloFormativoResource($cicloFormativo);
    }

    public function destroy(FamiliaProfesional $familiaProfesional, CicloFormativo $cicloFormativo)
    {

        Gate::authorize('delete', $cicloFormativo);

        if ($cicloFormativo->familia_profesional_id != $familiaProfesional->id) {
            abort(404);
        }

        try {
            $cicloFormativo->delete();
            return response()->json(['message' => 'CicloFormativo eliminado correctamente'], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error: ' . $e->getMessage()
            ], 400);
        }
    }
}
