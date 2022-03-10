<?php

namespace App\Http\Controllers;

use App\Models\SessionPermission;
use App\Models\Study;
use App\Models\StudyPermission;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionPermissionController extends Controller
{

    public function removePermission(Request $request, User $user,$studyId)
    {
        $permission = StudyPermission::where('user_id', $user->id)->where('study_id',$studyId)->first();
        if ($permission) {
            $permission->delete();
        }
        return response()->json(['success' => true]);
    }


    public function addPermission(Request $request, User $user, $sessionId){
        $sessionPermission = SessionPermission::where('session_id', $sessionId)->where('user_id', $user->id)->first();
        if ($sessionPermission) {
            return response()->json(['message' => 'You already have permission to this study'], 400);
        }
        else{
            SessionPermission::create([
                'session_id' => $sessionId,
                'user_id' => $user->id,
            ]);
            return response()->json(['message' => 'Permission granted'], 200);
        }
    }
}
