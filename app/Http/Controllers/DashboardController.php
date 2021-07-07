<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Image;
use App\Models\User;

class DashboardController extends Controller
{
    
    /**
     * Public company index page.
     * 
     * @return View
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $company = $user->company;
        $codes = $company->codes;

        // TODO : Victories to list

        return view('dashboard.home', 
            [
                'company' => $company,
                'user' => $user,
                'codes' => $codes
            ]
        );
    }
}
