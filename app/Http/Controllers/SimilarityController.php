<?php

namespace App\Http\Controllers;
use App\Models\Similarity;

class SimilarityController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function show($CustomerID){
        try {

            $similarity = Similarity::where('CustomerID', $CustomerID)->get(['productName', 'Score']);

            return response()->json([$CustomerID => $similarity], 200);

        } catch (\Exception $e) {

            return response()->json(['message' => 'CustomerID não encontrado: '. $CustomerID], 404);
        }
    }
}