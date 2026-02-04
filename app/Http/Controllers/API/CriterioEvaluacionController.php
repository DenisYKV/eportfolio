<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CriterioEvaluacionResource;
use App\Models\CriterioEvaluacion;
use Illuminate\Http\Request;

class CriterioEvaluacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = CriterioEvaluacion::query();

        if($request) {
            $query->orWhere('nombre', 'like', '%' .$request->q . '%');
        }

        return CriterioEvaluacionResource::collection(
            $query->orderBy($request->sort ?? 'id', $request->order ?? 'asc')
            ->paginate($request->per_page));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $criterioEvaluacion = json_decode($request->getContent(), true);

        $criterioEvaluacion = CriterioEvaluacion::create($criterioEvaluacion);

        return new CriterioEvaluacionResource($criterioEvaluacion);
    }

    /**
     * Display the specified resource.
     */
    public function show(CriterioEvaluacion $criterioEvaluacion)
    {
        return new CriterioEvaluacionResource($criterioEvaluacion);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CriterioEvaluacion $criterioEvaluacion)
    {
        $criterioEvaluacionData = json_decode($request->getContent(), true);
        $criterioEvaluacion->update($criterioEvaluacionData);

        return new CriterioEvaluacionResource($criterioEvaluacion);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CriterioEvaluacion $criterioEvaluacion)
    {
        try {
            $criterioEvaluacion->delete();
            return response()->json(null, 204);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error: ' . $e->getMessage()
            ], 400);
        }
    }
}
