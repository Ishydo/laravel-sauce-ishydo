<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScanController extends Controller
{
    
    /**
     * Dashboard scan index page.
     * 
     * @return View
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $company = $user->company;
        $scans = $company->scans;
        $wins = $company->wins;

        return view('dashboard.scans.index', 
            [
                'company' => $company,
                'user' => $user,
                'scans' => $scans,
                'wins' => $company->wins
            ]
        );
    }


    public function manage(Request $request)
    {
        $user = $request->user();
        $company = $user->company;
        $wins = $company->wins;

        return view('dashboard.scans.manage', 
            [
                'company' => $company,
                'user' => $user,
                'wins' => $company->wins
            ]
        );
    }

}
