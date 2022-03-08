<?php

namespace App\Http\Controllers;

use App\Models\TestAnswer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TestAnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        return response()->json(TestAnswer::all() , 201);
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
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $test = TestAnswer::create($request->all());

        return response()->json($test, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  TestAnswer  $testAnswer
     * @return JsonResponse
     */
    public function show(TestAnswer $testAnswer)
    {
        return response()->json($testAnswer, 201);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  TestAnswer  $testAnswer
     * @return JsonResponse
     */
    public function edit(Request $request, TestAnswer $testAnswer)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  TestAnswer  $testAnswer
     * @return JsonResponse
     */
    public function update(Request $request, TestAnswer $testAnswer)
    {
        $request->all();
        $testAnswer  = $testAnswer->update($request->all());
        return response()->json($testAnswer, 201);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  TestAnswer  $testAnswer
     * @return JsonResponse
     */
    public function destroy(TestAnswer $testAnswer)
    {
        $testAnswer->delete();
        return response()->json(null, 204);
    }
}
