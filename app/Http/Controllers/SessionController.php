<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Session;

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
        $data = $request->validate([
           'description' => 'required|string',
            'study_id' => 'required|integer',
            'availability_start' => 'required|date',
            'availability_end' => 'required|date',
        ]);
        $session = Session::create($data);
        if ($request->hasFile('questions')) {
            $file = $request->file('questions');
            $file = file($file);
            //read csv
            $questions = [];

            // read the csv file
            $question = null;
            $i = 1;
            foreach ($file as $idx=>$line) {
                // skip the first line
                if ($idx > 0) {

                    $line = str_getcsv($line);
                    // if the question is not empty create it
                    if ($line[0] !== '') {
                        $i = 1;
                        $question = Question::create([
                            'question' => $line[0],
                            'session_id' => $session->id,
                        ]);
                        Answer::create([
                           "answer" => $line[1],
                           "question_id" => $question->id,
                            "value" => $i
                        ]);
                        $i++;
                    }
                    else{
                        Answer::create([
                            "answer" => $line[1],
                            "question_id" => $question->id,
                            "value" => $i
                        ]);
                        $i++;
                    }
                }
            }
        }
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
