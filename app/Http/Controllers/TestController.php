<?php

namespace App\Http\Controllers;

use App\Models\Study;
use App\Models\Test;
use App\Models\TestAnswer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $user = Auth::user();
        if ($user->hasRole('admin')) {
            $campaigns = Study::with('sessions', 'sessions.tests.testAnswers', 'sessions.tests.testAnswers.question', 'sessions.tests.testAnswers.answer')->get();
            #dd($campaign[0]->sessions[0]->tests);
            $campaigns->map(function ($campaign){
                $campaign->sessions->map(function ($session){
                    $session->tests->map(function ($test){
                        $tmp = [];
                        $test->testAnswers->map(function ($testAnswer)  use ($tmp, $test) {

                            $tmp[] = [
                                "question" => $testAnswer->question->question,
                                "answer" => $testAnswer->answer->answer,
                                ];
                            $test->questions = $tmp;

                        });
                        unset($test->testAnswers);
                    });
                });
            });
            return response()->json($campaigns);
        } else {
            $tests = Test::where('user_id', $user->id)->with('testAnswers', 'user', 'session')->get();
        }
        return response()->json($tests);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return JsonResponse
     */
    public function create(): JsonResponse
    {
        return response()->json(['message' => 'Unauthorised'], 401);
    }


    // get lat and long from address using free api
    public function getLatLong($address): ?array
    {
        $apiKey = "fa399949167fc7b4a3bf08e981e2fcef";
        $url = "http://api.positionstack.com/v1/forward?access_key=$apiKey&query=$address";
        $response = file_get_contents($url);
        $json = json_decode($response, true);
        if (isset($json['data'][0]['latitude']) && isset($json['data'][0]['longitude'])) {
            return [$json['data'][0]['latitude'], $json['data'][0]['longitude']];
        }
        return null;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $user = Auth::user();
        $latLong = $this->getLatLong($request->address);
        $request->validate([
            'session_id' => 'required',
            'answers' => 'required',
            'address' => 'required',

        ]);


        $test = Test::create([
            'session_id' => intval($request->session_id),
            'lat' => $latLong ? $latLong[0] : null,
            'long' => $latLong ? $latLong[1] : null,
            'user_id' => $user->id,
            'device_serial_number'=> "WBSUW000" . strval(random_int(1, 100)),
            'Olevel'=> 151,
            'temperature'=> random_int(20, 50),
            'zone_code'=> 1,
            'UV'=> random_int(1, 10),
            'weather_condition'=> random_int(20, 80)/100,
        ]);
        foreach ($request->answers as $answer) {
            $answer = TestAnswer::create([
                'test_id' => $test->id,
                'answer_id' => $answer['answer_id'],
                'question_id' => $answer['question_id'],
            ]);
        }
        // $test->load('testAnswers');
        //dd($test);
        return response()->json($test, 201);

    }

    /**
     * Display the specified resource.
     *
     * @param Test $test
     * @return JsonResponse
     */
    public function show(Test $test): JsonResponse
    {
        $user = Auth::user();
        if (!$user->hasRole('admin')) {
            if ($test->user_id != $user->id) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }
        }
        $test->load('testAnswers');
        return response()->json($test);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Test $test
     * @return JsonResponse
     */
    public function edit(Test $test): JsonResponse
    {
        // unauthorised
        return response()->json(['error' => 'Unauthorized'], 401);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Test $test
     * @return JsonResponse
     */
    public function update(Request $request, Test $test): JsonResponse
    {
        return response()->json(['error' => 'Unauthorized'], 401);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Test $test
     * @return JsonResponse
     */
    public function destroy(Test $test): JsonResponse
    {
        return response()->json(['error' => 'Unauthorized'], 401);
    }
}
