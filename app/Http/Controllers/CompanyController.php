<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    //
    public function index() {
        $companies = Company::with('tasks')->get();
        
        return response()->json($companies);
    }

    public function show(string $id)
    {
        //
        $company = Company::with('tasks')->find($id);

        if (!$company) {
            return "This company does not exist, please, try another option.";
        }

        return response()->json($company);
    }
}
