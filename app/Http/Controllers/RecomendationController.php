<?php

namespace App\Http\Controllers;
use App\Models\Recomendation;
use App\Models\AlsoBought;

class RecomendationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function showRecomendations($CustomerID){
        try {
            $recomendation = Recomendation::where('CustomerID', $CustomerID)->with('scoreComponents')->get();

            return response()->json(['CustomerID' => $recomendation], 200, [], JSON_UNESCAPED_SLASHES);

        } catch (\Exception $e) {

            return response()->json(['message' => 'CustomerID não encontrado'], 404);
        }
    }

    public function showProducts($ProductID){

        try {

            $alsoBought = AlsoBought::where('ProductID', $ProductID)->get(['recommendation', 'customersWhoAlsoBuyed']);

            return response()->json([$ProductID => $alsoBought], 200);

        } catch (\Exception $e) {

            return response()->json(['message' => 'ProductID não encontrado: '. $ProductID], 404);
        }

    }
}