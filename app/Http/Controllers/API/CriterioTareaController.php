<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CriterioTareaResource;
use App\Models\AsignacionRevision;
use App\Models\CriterioTarea;
use Illuminate\Http\Request;

class CriterioTareaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
         /* mostrando todos */
        /* return CriterioTareaResource::collection(CriterioTarea::all()); */

        /* buscar por id */
        $query = CriterioTarea::query();
        if ($query) {
            $query->orWhere("id", "like", "%" . $request->q . "%");
        }
        return CriterioTareaResource::collection(
            $query->orderBy($request->sort ?? "id", $request->order ?? "asc")->paginate($request->per_page)
        );

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $criteroTarea = json_decode($request->getContent(), true);
        $criteroTarea = CriterioTarea::create($criteroTarea);
        return new CriterioTareaResource($criteroTarea);
    }

    /**
     * Display the specified resource.
     */
    public function show(CriterioTarea $criterioTarea)
    {
        return new CriterioTareaResource($criterioTarea);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CriterioTarea $criterioTarea)
    {
        $criterioTareaData = json_decode($request->getContent(), true);
        $criterioTarea->update($criterioTareaData);
        return new CriterioTareaResource($criterioTarea);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CriterioTarea $criterioTarea)
    {
        try {
           $criterioTarea->delete();
           return response()->json(null,204);
        } catch (\Exception $e) {
            return response()->json(["message"=>"Error: " . $e->getMessage()],400);
        }
    }
}
