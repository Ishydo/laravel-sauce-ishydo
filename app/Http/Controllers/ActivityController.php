<?php

namespace App\Http\Controllers;

use App\Models\Scan;

class ActivityController extends Controller
{
    public function index()
    {
        $allTimeTotal = Scan::allTimeTotal();
        $allTimeLose = Scan::allTimeLose();
        $allTimeWins = Scan::allTimeWins();

        $todayAll = Scan::today()->orderBy('created_at', 'DESC')->limit(5)->get();
        $todayLose = Scan::todayLose();
        $todayWins = Scan::todayWins();

        return view(
            'activity', [
                'allTimeTotal' => $allTimeTotal,
                'allTimeWins' => $allTimeWins,
                'allTimeLose' => $allTimeLose,
                'todayAll' => $todayAll,
                'todayLose' => $todayLose,
                'todayWins' => $todayWins,
            ]
        );
    }

}
