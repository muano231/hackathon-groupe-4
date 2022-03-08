<?php

namespace App\Http\Controllers;

use App\Models\Study;
use Illuminate\Http\Request;

class StudyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json(Study::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $study = Study::create($request->all());
        return response()->json($study, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Study  $study
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Study $study)
    {
        return response()->json($study);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Study  $study
     * @return \Illuminate\Http\Response
     */
    public function edit(Study $study)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Study  $study
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Study $study)
    {
        $study->update($request->all());
        return response()->json($study, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Study  $study
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Study $study)
    {
        $study->delete();
        return response()->json(null, 204);
    }
}
