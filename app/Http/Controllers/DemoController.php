<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Code;
use App\Models\Scan;

class DemoController extends Controller
{
    
    /**
     * Dashboard scan index page.
     * 
     * @return View
     */
    public function win(Request $request)
    {
        $code = Code::find(1);
        $gift = $code->choose_gift();
        $scan = Scan::find(1);

        return view(
            'decode.win', [
                "code" => $code,
                "gift" => $gift,
                "freqValid" => true,
                "scan" => $scan
            ]
        );
    }


    public function lose(Request $request)
    {
        $code = Code::find(1);
        $gift = $code->choose_gift();
        $scan = Scan::find(1);

        return view(
            'decode.lose', [
                "code" => $code,
                "gift" => $gift,
                "freqValid" => true,
                "scan" => $scan
            ]
        );
    }

}
