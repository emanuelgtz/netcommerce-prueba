<?php

namespace App\Http\Controllers;

use App\Http\Resources\CompanyResource;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    //
    public function index(Request $request, $search = null) {
        if ($search) {
            $result = Company::with('tasks')->find($search);
            
            if (!$result) {
                return response()->json([
                    'message' => 'This company does not exist, please, try another option.'
                ], 404);
            }
            return response()->json( new CompanyResource($result));
            

        } else {
            $result = Company::with('tasks')->get();
            return response()->json(CompanyResource::collection($result));
        }
        
    }
}
