<?php

namespace App\Http\Controllers;

use App\Models\SessionPermission;
use App\Models\StudyPermission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudyPermissionController extends Controller
{
    public function askPermission(Request $request, $studyId)
    {
        $user = Auth::user();
        if  ($user->hasRole('admin')){
            return response()->json(['message' => 'You are admin, you can do it'], 200);
        }
        if (StudyPermission::where('study_id', $studyId)->where('user_id', $user->id)->exists()) {
            return response()->json(['message' => 'You already have asked permission to this study'], 400);
        }
        else{
            StudyPermission::create([
                'study_id' => $studyId,
                'user_id' => $user->id
            ]);
        }
        return response()->json(['message' => 'Permission asked'], 200);
    }

}
