<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\EvidenciasResource;
use App\Models\Evidencia;
use App\Models\Tarea;
use Illuminate\Http\Request;

class EvidenciasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Tarea $tarea, Request $request)
    {
        return EvidenciasResource::collection(
            $tarea->evidencias()
                ->orderBy($request->sort ?? 'id', $request->order ?? 'asc')
                ->paginate($request->per_page)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
       public function store(Request $request, Tarea $tarea)
    {
        $data = $request->all();
        $data['tarea_id'] = $tarea->id;

        $evidencia = Evidencia::create($data);

        return new EvidenciasResource($evidencia);
    }
    /**
     * Display the specified resource.
     */
    public function show(Tarea $tarea, Evidencia $evidencia)
    {
        return new EvidenciasResource($evidencia);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tarea $tarea, Evidencia $evidencia)
    {
        $evidenciaData = json_decode($request->getContent(), true);
        $evidencia->update($evidenciaData);

        return new EvidenciasResource($evidencia);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tarea $tarea, Evidencia $evidencia)
    {
        try {
            $evidencia->delete();
            return response()->json(null, 204);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error: ' . $e->getMessage()
            ], 400);
        }
    }
}
