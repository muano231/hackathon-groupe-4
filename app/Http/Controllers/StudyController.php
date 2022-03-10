<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\SessionPermission;
use App\Models\Study;
use App\Models\StudyPermissions;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json(Study::with('sessions', 'product')->get());

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

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        if (Auth::user()->hasRole('admin')) {
            //create product
            $productData = $request->input('product');
            $product = Product::create(['name' => $productData]);
            // create study
            $study = Study::create(['product_id' => $product->id]);
            return response()->json($study, 201);
        }
        return response()->json(['message' => 'Unauthorised'], 401);

    }

    /**
     * Display the specified resource.
     *
     * @param Study $study
     * @return JsonResponse
     */
    public function show(Study $study): JsonResponse
    {
        $study->load('product', 'sessions');
        return response()->json($study);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Study $study
     * @return JsonResponse
     */
    public function edit(Study $study): JsonResponse
    {
        return response()->json(['message' => 'Unauthorised'], 401);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Study $study
     * @return JsonResponse
     */
    public function update(Request $request, Study $study): JsonResponse
    {
        return response()->json(['message' => 'Unauthorised'], 401);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Study $study
     * @return JsonResponse
     */
    public function destroy(Study $study): JsonResponse
    {
        return response()->json(['message' => 'Unauthorised'], 401);

    }
}
