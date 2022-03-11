<?php

namespace App\Http\Controllers;

use App\Models\Session;
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
        $study = Study::find($studyId);
        $found = False;

        $permission = StudyPermission::where('user_id', $user->id)->where('study_id',$study->id)->first();
        if ($permission != null){
            $permission->delete();
            $found = true;
        }
        $sessions = Session::where('study_id',$study->id)->get()->pluck('id');
        if (count($sessions) > 0){
            SessionPermission::whereIn('session_id',$sessions)->where('user_id', $user->id)->delete();
            $found = true;
        }


        return response()->json([$found ?'success' : 'no permission' => true]);
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
            $session = Study::find($sessionId);
            StudyPermission::where('study_id', $session->study_id)->where('user_id', $user->id)->delete();
            return response()->json(['message' => 'Permission granted'], 200);
        }
    }
}
