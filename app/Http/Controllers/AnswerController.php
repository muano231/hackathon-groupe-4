<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json(Answer::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        $answer = Answer::create($request->all());

        return response()->json($answer, 201);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $answer = Answer::create($request->all());
        return response()->json($answer, 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Answer $answer)
    {
        return response()->json($answer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit(Request $request,Answer $answer)
    {
        $answer->update($request->all());
        return response()->json($answer, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Answer $answer)
    {
        $answer->update($request->all());
        return response()->json($answer, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Answer $answer)
    {
        $answer->delete();
        return response()->json(null, 204);
    }
}
