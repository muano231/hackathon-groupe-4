<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        if (Auth::user()->hasRole('admin')) {
            return response()->json(User::all()->filter(function ($item) {
                return $item->hasRole('testeur') && !$item->verified;
            }), 200);
        }
        // return unauthorized
        return response()->json(['error' => 'Unauthorized'], 401);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return JsonResponse
     */
    public function create()
    {
        return response()->json(['error' => 'Unauthorized'], 401);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        return response()->json(['error' => 'Unauthorized'], 401);

    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return JsonResponse
     */
    public function show(User $user)
    {
        if (Auth::user()->hasRole('admin')) {
            return response()->json($user, 200);
        }
        return response()->json(['error' => 'Unauthorized'], 401);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @param $request
     * @return JsonResponse
     */
    public function edit(Request $request, User $user)
    {
        return response()->json(['error' => 'Unauthorized'], 401);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param User $user
     * @return JsonResponse
     */
    public function update(Request $request, User $user)
    {
        if (Auth::user()->hasRole('admin')) {
            $user->update($request->all());
            return response()->json($user, 200);
        }
        return response()->json(['error' => 'Unauthorized'], 401);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return JsonResponse
     */
    public function destroy(User $user)
    {

        if (Auth::user()->hasRole('admin')) {
            $user->delete();
            return response()->json(null, 204);
        }
        return response()->json(['error' => 'Unauthorized'], 401);

    }
}
