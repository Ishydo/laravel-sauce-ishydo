<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Scan;

class ProfileController extends Controller
{
    public function index(Request $request)
    {

        $wins = null;
        $loses = null;

        // Getting what we can find in session
        if ($request->session()->has('scans.wins')) {
            $wins = $request->session()->get('scans.wins');
        }

        if ($request->session()->has('scans.loses')) {
            $loses = $request->session()->get('scans.loses');
        }

        return view(
            'profile', [
                'wins' => $wins,
                'loses' => $loses
            ]
        );
    }

}
