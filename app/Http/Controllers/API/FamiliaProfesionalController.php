<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\FamiliaProfesionalResource;
use App\Models\FamiliaProfesional;
use Illuminate\Http\Request;

class FamiliaProfesionalController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search', '');

        return FamiliaProfesionalResource::collection(
            FamiliaProfesional::where('nombre', 'like', "%{$search}%")
                ->orWhere('codigo', 'like', "%{$search}%")
                ->orderBy($request->sort ?? 'id', $request->order ?? 'asc')
                ->paginate($request->per_page)
        );
    }

    public function store(Request $request)
    {
        $d = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'codigo' => 'required|string|unique:familias_profesionales,codigo',
        ]);
        $familia = FamiliaProfesional::create($d);

        return new FamiliaProfesionalResource($familia);
    }

    public function show(FamiliaProfesional $familiaProfesional)
    {
        return new FamiliaProfesionalResource($familiaProfesional);
    }

    public function update(Request $request, FamiliaProfesional $familiaProfesional)
    {
        $data = json_decode($request->getContent(), true);

        $familiaProfesional->update($data);

        return new FamiliaProfesionalResource($familiaProfesional);
    }

    public function destroy(FamiliaProfesional $familiaProfesional)
    {
        try {
            $familiaProfesional->delete();
            return response()->json(['message' => 'FamiliaProfesional eliminado correctamente'], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error: ' . $e->getMessage()
            ], 400);
        }
    }
}
