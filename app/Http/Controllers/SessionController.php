<?php

namespace App\Http\Controllers;

use App\Models\Session;
use http\Env\Response;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $now = now();
        return response()->json(Session::with('questions', 'questions.answers')->whereDate('availability_start', '<=', $now)->whereDate('availability_end', '>=', $now)->get());
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
        $session = Session::create($request->all());
        return response()->json($session, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Session $session)
    {
        $session->load('questions', 'questions.answers');
        return response()->json($session);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function edit(Session $session)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Session $session)
    {
        $session->update($request->all());
        return response()->json($session, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Session $session)
    {
        $session->delete();
        return response()->json(null, 204);
    }
}
