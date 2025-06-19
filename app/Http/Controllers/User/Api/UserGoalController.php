<?php

namespace App\Http\Controllers\User\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserGoal;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Validator;

class UserGoalController extends Controller
{
   public function goalCalculate(Request $request)
   {
     $validate = Validator::make($request->all(), [
       'profession' => 'required|string',
        'income_range' => 'required|array|min:2',
        'payment_mode' => 'required|string',
        'age_range' => 'required|array|min:2',
        'plan_type' => 'required|string',
     ]);

     if($validate->fails())
     {
        return response()->json($validate->errors(), 401);
     }

    $incomeMin = $request->income_range[0];
    $incomeMax = $request->income_range[1];
    $income = ($incomeMin + $incomeMax) / 2 * 100000;

    $ageMin = $request->age_range[0];
    $ageMax = $request->age_range[1];
    $age = ($ageMin + $ageMax) / 2;

    $professionWeight = $this->getProfessionWeight($request->profession);
    $ageWeight = $this->getAgeWeight($request->age);
    $planWeight = $this->getPlanWeight($request->plan_type);
    $paymentWeight = $this->getPaymentWeight($request->payment_mode);

    $baseInvestment = $income * ($professionWeight * $ageWeight * $planWeight * $paymentWeight) * 0.3;
    $growthFactor = 0.1;
    $estimatedInvestment = $baseInvestment * (1 + $growthFactor * 3);

    $monthlySavings = $estimatedInvestment / 36;
    // dd($monthlySavings);
    
    $goal = UserGoal::create([
        'user_id' => JWTAuth::user()->id,
        'profession' => $request->profession->id,
        'income_range' => json_encode($request->income_range->id),
        'payment_mode' => $request->payment_mode->id,
        'age_range' => json_encode($request->age_range->id),
        'plan_type' => $request->plan_type->id,
        'estimated_investment' => $estimatedInvestment,
        'monthly_savings' => $monthlySavings
    ]);

    return response()->json([
        'status' => true,
        'message' => 'Goal Calculated with renge based',
        'data' => $goal
    ], 200);


   }

   private function getProfessionWeight($profession)
   {
      $weights = [
            'Professional' => 1.2,
            'Engineer' => 1.3,
            'Teacher' => 1.0,
            'Business' => 1.4,
      ];
      return $weights[$profession] ?? 1.0;
   }

   private function getAgeWeight($age)
   {
        if ($age <= 30) return 1.5;
        elseif ($age <= 40) return 1.2;
        else return 1.0;
   }

   private function getPlanWeight($planType)
   {
    $weights = [
            'Professional Study' => 1.3,
            'Education' => 1.2,
            'Retirement' => 1.1,
            'Travel' => 1.0,
        ];
        return $weights[$planType] ?? 1.0;
   }

   private function getPaymentWeight($paymentMode)
   {
        $weights = [
            'Monthly' => 1.1,
            'Quarterly' => 1.0,
            'Yearly' => 0.9,
        ];
        return $weights[$paymentMode] ?? 1.0;
   }
}
