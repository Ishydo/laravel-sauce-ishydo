<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Code;
use App\Models\Scan;
use App\Models\State;
use Carbon\Carbon;

use App\Jobs\TweetWin;

/**
 * Decoding controller.
 */
class DecodeController extends Controller
{
    public function __invoke($code, Request $request)
    {
        $code = Code::where('code', $code)->first();
        $gift = $code->choose_gift();
        $isAWin = $gift->is_a_win();

        if ($code->is_active()) {
            if ($code->is_in_period()) {
                if ($gift->is_in_stock()) {
                    if ($gift->is_max_win_per_day_valid()) {      
                        if ($gift->is_frequency_valid($request)) {
                            if ($isAWin) {
                                $coupon = $gift->generate_coupon ? $gift->company->generate_coupon() : null;
                                $scan = $this->save_scan($request, 200, $gift, $code, $coupon);
                                $request->session()->push('scans.wins', $scan);
                                TweetWin::dispatchIf($gift->win_probability >= 2, $gift);
                                return view(
                                    'decode.win', [
                                        "code" => $code,
                                        "gift" => $gift,
                                        "freqValid" => $gift->is_frequency_valid($request),
                                        "scan" => $scan
                                    ]
                                );
                            } else {
                                $scan = $this->save_scan($request, 500, $gift, $code);
                            }
                        } else {
                            $scan = $this->save_scan($request, 403, $gift, $code);
                        }
                    } else {
                        $scan = $this->save_scan($request, 405, $gift, $code);
                    }
                } else {
                    $scan = $this->save_scan($request, 402, $gift, $code);    
                }
            } else {
                $scan = $this->save_scan($request, 401, $gift, $code);
            }
        } else {
            $scan = $this->save_scan($request, 400, $gift, $code);
        }

        $request->session()->push('scans.loses', $scan);

        return view(
            'decode.lose', [
                "code" => $code,
                "gift" => $gift,
                "freqValid" => $gift->is_frequency_valid($request),
                "scan" => $scan
            ]
        );
    }

    public function save_scan($request, $state, $gift, $code, $coupon=null) 
    {
        $idString = implode(
            "//", [
                $request->server('HTTP_USER_AGENT'),
                $request->server('HTTP_ACCEPT_LANGUAGE')
            ]
        );

        $now = Carbon::now();

        return Scan::create(
            [
                "id_string" => $idString,
                "ip" => $request->ip(),
                "code_id" => $code->id,
                "gift_id" => $gift->id,
                "state_id" => State::where('code', $state)->first()->id,
                "coupon_code" => $coupon
            ]
        );
    }

}

