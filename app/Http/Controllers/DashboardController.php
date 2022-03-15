<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    
    /**
     * Public company index page.
     * 
     * @return View
     */
    public function index(Request $request)
    {
        return view('dashboard.home', []);
    }
}
