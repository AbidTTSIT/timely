<?php

namespace App\Http\Controllers\User\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\UserSurvey;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserSurveyController extends Controller
{
    public function store(Request $request){
         $validate = Validator::make($request->all(), [
            'profession' => 'required|string|max:255',
            'income' => 'required|string|max:255',
            'payment_mode' => 'required|string|max:255',
            'age' => 'required|string|max:255',
            'plan' => 'required|string|max:255',
         ]);

         if($validate->fails())
         {
            return response()->json($validate->errors(), 400);
         }

         $user = JWTAuth::user();

         $survey = UserSurvey::create([
            'user_id' => $user->id,
            'profession' => $request->profession,
            'income' => $request->income,
            'payment_mode' => $request->payment_mode,
            'age' => $request->age,
            'plan' => $request->plan,
         ]);

         return response()->json([
            'status' => true,
            'message' => 'Survey Detail Added Successfully',
            'data' => $survey
         ], 200);
    }
}
