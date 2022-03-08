<?php

namespace App\Http\Controllers;

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
        return response()->json(TestAnswerController::all() , 201);
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
        $test = TestAnswerController::create($request->all());

        return response()->json($test, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  TestAnswerController  $testAnswer
     * @return JsonResponse
     */
    public function show(TestAnswerController $testAnswer)
    {
        return response()->json($testAnswer, 201);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  TestAnswerController  $testAnswer
     * @return JsonResponse
     */
    public function edit(Request $request, TestAnswerController $testAnswer)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  TestAnswerController  $testAnswer
     * @return JsonResponse
     */
    public function update(Request $request, TestAnswerController $testAnswer)
    {
        $testAnswer  = $testAnswer->update($request->all());
        return response()->json($testAnswer, 201);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  TestAnswerController  $testAnswer
     * @return JsonResponse
     */
    public function destroy(TestAnswerController $testAnswer)
    {
        $testAnswer->delete();
        return response()->json(null, 204);
    }
}
